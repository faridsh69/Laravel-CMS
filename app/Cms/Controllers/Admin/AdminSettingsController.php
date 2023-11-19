<?php

declare(strict_types=1);

namespace App\Cms\Controllers\Admin;

use Artisan;
use Cache;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use Symfony\Component\Console\Output\BufferedOutput;

abstract class AdminSettingsController extends AdminResourceController
{
	public string $modelNameSlug = 'setting-general';

	final public function index(): View
	{
		$section = explode('-', $this->modelNameSlug)[1];
		$this->meta['title'] = __($section . '_manager');
		$this->authorize('manage', 'setting_' . $section);
		$model = $this->modelRepository->first();

		$form = $this->laravelFormBuilder->create($this->modelForm, [
			'method' => 'PUT',
			'url' => route('admin.setting.' . $section),
			'class' => 'm-form m-form--state',
			'id' => 'admin_form',
			'model' => $model,
		]);

		return view('admin.list.form', [
			'form' => $form,
			'meta' => $this->meta,
		]);
	}

	final public function putUpdate()
	{
		$section = explode('-', $this->modelNameSlug)[1];
		$this->authorize('manage', 'setting_' . $section);
		$model = $this->modelRepository->first();
		$form = $this->laravelFormBuilder->create($this->modelForm, [
			'model' => $model,
		]);
		if (!$form->isValid()) {
			return redirect()->back()->withErrors($form->getErrors())->withInput();
		}

		$model->saveWithRelations($form->getFieldValues());

		foreach (['developer', 'general', 'contact'] as $cache_section) {
			Cache::forget('setting.' . $cache_section);
		}

		$this->httpRequest->session()->flash('alert-success', $this->modelNameTranslate . ' Updated Successfully!');
		sleep(1);

		return redirect()->route('admin.setting.' . $section);
	}

	final public function redirect(): RedirectResponse
	{
		return redirect()->route('admin.setting.general');
	}

	final public function log(): View
	{
		$this->authorize('manage', 'log');
		$this->meta['title'] = __('log_manager');

		return view('admin.page.setting.log', [
			'meta' => $this->meta,
		]);
	}

	final public function logView(LogViewerController $LogViewerController)
	{
		$this->authorize('manage', 'log');

		return $LogViewerController->index();
	}

	final public function api(): View
	{
		$this->authorize('manage', 'api');
		$this->meta['title'] = __('api_manager');

		return view('admin.page.setting.api', [
			'meta' => $this->meta,
		]);
	}

	final public function command($command): void
	{
		$this->authorize('manage', 'setting_advance');
		echo '<br> php artisan ' . $command . ' is running...';
		$output = new BufferedOutput();
		if (mb_strpos($command, 'api') === false && mb_strpos($command, 'passport') === false) {
			Artisan::call($command, [], $output);
		} else {
			shell_exec('php ../artisan ' . $command);
			dump('php ../artisan ' . $command);
		}
		dump($output->fetch());
		echo 'php artisan ' . $command . ' completed.';
		echo '<br><br><a href="/admin/setting/advance">Go back</a>';
	}

	final public function advance(): View
	{
		$this->authorize('manage', 'setting_advance');
		$commands = [
			[
				'id' => 1,
				'description' => 'recompile classes',
				'command' => 'clear-compiled',
			],
			[
				'id' => 2,
				'description' => 'recompile packages',
				'command' => 'package:discover',
			],
			[
				'id' => 3,
				'description' => 'run backup',
				'command' => 'backup:run',
			],
			[
				'id' => 4,
				'description' => 'create password for passport',
				'command' => 'passport:client --password',
			],
			[
				'id' => 5,
				'description' => 'install passport',
				'command' => 'passport:install',
			],
			[
				'id' => 6,
				'description' => 'create a document for api',
				'command' => 'apidoc:generate',
			],
			[
				'id' => 7,
				'description' => 'show list of routes',
				'command' => 'route:list',
			],
			[
				'id' => 8,
				'description' => 'recompile config cache',
				'command' => 'config:cache',
			],
			[
				'id' => 9,
				'description' => 'clear config cache',
				'command' => 'config:clear',
			],
			[
				'id' => 10,
				'description' => 'run lastest migrations',
				'command' => 'cms:migration',
			],
			[
				'id' => 11,
				'description' => 'run seeders',
				'command' => 'db:seed',
			],
			[
				'id' => 12,
				'description' => 'recompile route cache',
				'command' => 'route:cache',
			],
			[
				'id' => 13,
				'description' => 'clear route cache',
				'command' => 'route:clear',
			],
			[
				'id' => 14,
				'description' => 'recompile view cache',
				'command' => 'view:cache',
			],
			[
				'id' => 15,
				'description' => 'clear view cache',
				'command' => 'view:clear',
			],
			[
				'id' => 16,
				'description' => 'optimize all configurations',
				'command' => 'optimize',
			],
		];

		$this->meta['title'] = __('advance_setting');

		return view('admin.page.setting.advance', [
			'meta' => $this->meta, 'commands' => $commands,
		]);
	}
}
