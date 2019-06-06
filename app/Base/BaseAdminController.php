<?php

namespace App\Base;

use App\Http\Controllers\Controller;
use Auth;
use Config;
use Conner\Tagging\Model\Tag;
use File;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use View;

class BaseAdminController extends Controller
{
    // public $model = 'Blog';
    public $model;

    // public $model_sm = 'blog';
    public $model_sm;

    // public $model_form = '\App\Forms\BlogForm';
    public $model_form;

    // App\Models\Blog
    public $model_class;

    public $request;

    public $form_builder;

    public $meta = [
        'title' => 'Admin Panel',
        'description' => 'Admin Panel Page For Best Cms In The World',
        'keywords' => '',
        'image' => '',
        'alert' => 'Advanced form with validation, ckeditor, multiselect, swith... !',
        'link_route' => '/',
        'link_name' => 'Dashboard',
        'search' => 0,
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->model_class = 'App\\Models\\' . $this->model;
        $this->repository = new $this->model_class();
        $this->model_columns = $this->repository->getColumns();
        $this->model_sm = lcfirst($this->model);
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $this->repository = new $this->model_class();
        $this->request = $request;
        $this->form_builder = $form_builder;
    }

    public function getSettingForm($section)
    {
        // $this->authorize('index', $this->model_class);
        $model = Config::get('base-' . $section);
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.setting.' . $section),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'model' => $model,
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function putSettingForm($section)
    {
        // $this->authorize('index', $this->model_class);
        $model = Config::get('base-' . $section);

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $updated_data = $form->getFieldValues();
        foreach(collect($this->model_columns)
            ->where('type', 'boolean')
            ->pluck('name') as $boolean_column) {
            if(!isset($updated_data[$boolean_column]))
            {
                $updated_data[$boolean_column] = 0;
            }
        }

        $base_data = config('base-' . $section);
        $new_settings = array_merge($base_data, $updated_data);
        $newSettings = var_export($new_settings, 1);
        $new_config = "<?php\n return $newSettings ;"; 
        File::put(config_path() . '/base-' . $section . '.php', $new_config);

        activity($this->model)
            ->causedBy(Auth::user())
            ->log(json_encode($model));

        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

        return redirect()->route('admin.setting.' . $section);
    }
}
