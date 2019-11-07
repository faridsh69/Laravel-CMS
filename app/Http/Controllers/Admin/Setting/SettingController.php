<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Base\BaseAdminController;
use Artisan;
use Auth;
use Cache;
use Config;
use File;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

class SettingController extends BaseAdminController
{
    public function getSettingForm()
    {
        $this->meta['title'] = __(ucfirst($this->section) . ' Setting Manager');
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
        
        Cache::forget('settings.' . $this->section);
        // $base_data = config('0-' . $this->section);
        // $new_settings = array_merge($base_data, $updated_data);
        // $newSettings = var_export($new_settings, 1);
        // $new_config = "<?php\n return ${newSettings} ;";
        // File::put(config_path() . '/0-' . $this->section . '.php', $new_config);

        activity($this->model)
            ->causedBy(Auth::user())
            ->log(json_encode($model));
            
        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');
        sleep(1);

        return redirect()->route('admin.setting.' . $this->section);
    }

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
