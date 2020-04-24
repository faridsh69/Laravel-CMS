<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Services\BaseAdminController;
use Artisan;
use Auth;
use Cache;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use Symfony\Component\Console\Output\BufferedOutput;

class SettingController extends BaseAdminController
{
    public function getSettingForm()
    {
        $this->meta['title'] = __(strtolower($this->model . '_manager'));
        $this->authorize('index', $this->model_class);
        $model = $this->repository->first();
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.setting.' . $this->section),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'model' => $model,
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function putSettingForm()
    {
        $this->authorize('index', $this->model_class);
        $model = $this->repository->first();

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $updated_data = $form->getFieldValues();
        foreach(collect($this->model_columns)
            ->where('type', 'boolean')
            ->pluck('name') as $boolean_column) {
            if(! isset($updated_data[$boolean_column]))
            {
                $updated_data[$boolean_column] = 0;
            }
        }
        $model->update($updated_data);

        foreach(['developer', 'general', 'contact'] as $section){
	        Cache::forget('setting.' . $section);
	    }

        activity($this->model)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log('setting.' . $this->section . ' Updated: <br>' . json_encode($model));

        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');
        sleep(1);

        return redirect()->route('admin.setting.' . $this->section);
    }

	public function getLog()
	{
        $this->authorize('index_settinggeneral');
        $this->meta['title'] = __('log_manager');

		return view('admin.page.setting.log', ['meta' => $this->meta]);
	}

	public function getLogView(LogViewerController $LogViewerController)
	{
		return $LogViewerController->index();
	}

	public function getApi()
	{
		$this->authorize('index_settinggeneral');
        $this->meta['title'] = __('api_manager');

		return view('admin.page.setting.api', ['meta' => $this->meta]);
	}

	public function redirect()
	{
		return redirect()->route('admin.setting.general');
	}

	public function getCommand($command)
	{
        echo '<br> php artisan ' . $command . ' is running...';
		$output = new BufferedOutput();
		if(strpos($command, 'api') === false && strpos($command, 'passport') === false){
	        Artisan::call($command, [], $output);
	    }else{
			shell_exec('php ../artisan ' . $command);
			dump('php ../artisan ' . $command);
		}
        dump($output->fetch());
        echo 'php artisan ' . $command . ' completed.';
        echo '<br><br><a href="/admin/setting/advance">Go back</a>';
	}

	public function getAdvance()
	{
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
				'command' => 'migrate',
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

		return view('admin.page.setting.advance', ['meta' => $this->meta, 'commands' => $commands]);
	}
}
