<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Base\BaseAdminController;
use Auth;
use Config;
use File;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

class SettingController extends BaseAdminController
{
	public $model = 'Setting';

	public function getGeneral()
	{
		$this->authorize('index', $this->model_class);
		$model = Config::get('base');

        $form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.setting.general'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'model' => $model,
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
	}

	public function putGeneral()
	{
        $this->authorize('index', $this->model_class);
		$model = Config::get('base');

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $updated_data = $form->getFieldValues();
        foreach(collect($this->model_columns)
        	->where('type', 'boolean')
        	->pluck('name') as $boolean_column)
        {
            if(!isset($updated_data[$boolean_column]))
            {
                $updated_data[$boolean_column] = 0;
            }
        }

        $base_data = config('base');
		$new_settings = array_merge($base_data, $updated_data);
		$newSettings = var_export($new_settings, 1);
		File::put(config_path() . '/base.php', "<?php\n return $newSettings ;");

        activity($this->model)
            ->causedBy(Auth::user())
            ->log(json_encode($model));
            
        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

        return redirect()->route('admin.setting.general');

	}

	public function getContact()
	{
		return view('admin.blog');
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

	

	public function getDeveloperOptionsBasic()
	{
		return view('admin.blog');
	}

	public function getDeveloperOptionsAdvance()
	{
		return view('admin.blog');
	}

	public function getDeveloperOptionsApi()
	{
        $this->meta['title'] = __('API Manager');

		return view('admin.setting.developer-options.api', ['meta' => $this->meta]);
	}
}
