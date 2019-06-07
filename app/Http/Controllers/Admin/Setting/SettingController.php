<?php

namespace App\Http\Controllers\Admin\Setting;

use Artisan;
use App\Base\BaseAdminController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

class SettingController extends BaseAdminController
{
	public $model = 'SettingGeneral';
	
	public function getLog()
	{
        $this->meta['title'] = __('Log Manager');
        $this->meta['alert'] = 'Log of system with all traces!';

		return view('admin.setting.log', ['meta' => $this->meta]);
	}

	public function getLogView(LogViewerController $LogViewerController)
	{
		return $LogViewerController->index();
	}

	public function getApi()
	{
        $this->meta['title'] = __('API Manager');

		return view('admin.setting.api', ['meta' => $this->meta]);
	}

	public function redirect()
	{
		return redirect()->route('admin.setting.general');
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
				'description' => 'recompile cache',
				'command' => 'config:cache',
			],
			[
				'id' => 9,
				'description' => 'clear cache',
				'command' => 'cache:clear',
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
			
		];

		return view('admin.setting.advance', ['meta' => $this->meta, 'commands' => $commands]);
	}

	public function getCommand($command)
	{
        try {
            echo '<br> ' . $command . ' ...';
            Artisan::call($command);
            echo '<br>' . $command . ' completed';
            echo '<br><a href="/setting/advance">Go back</a>';
        } catch (Exception $e) {
            Response::make($e->getMessage(), 500);
        }

		// dd($command);
	}
}
