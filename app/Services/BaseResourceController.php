<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use Str;

class BaseResourceController extends BaseAdminController
{
    // FoodProgram
    public $model_name;

    // food-program
    public $model_slug;

    // Food Program
    public $model_translated;

    // '\App\Forms\FoodProgramForm'
    public $model_form;

    // App\Models\FoodProgram
    public $model_namespace;

    // Columns of this model
    public $model_columns;

    // A new instance of this model
    public $model_repository;

    public $request;

    public $form_builder;

    // public $meta = [
    //     'title' => '',
    //     'description' => 'Admin Panel Page For Full Features, Best UI-UX Cms.',
    //     'keywords' => '',
    //     'image' => '',
    //     'alert' => '',
    //     'link_route' => 'admin',
    //     'link_name' => 'Dashboard',
    //     'search' => 0,
    // ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->form_builder = $form_builder;
        $this->request = $request;
        if(!$this->model_slug){
            $this->model_slug = $this->request->segment(2);
        }
        $this->model_name = Str::studly($this->model_slug);
        $this->model_translated = __(Str::snake($this->model_name));
        $this->model_namespace = config('cms.config.models_namespace'). $this->model_name;
        $this->model_repository = new $this->model_namespace;
        $this->model_columns = $this->model_repository->getColumns();
        $this->model_form = 'App\Forms\Form';
        if(file_exists(__DIR__. '\..\Forms\\'. $this->model_name. 'Form.php')){
            $this->model_form = 'App\\Forms\\'. $this->model_name. 'Form';
        }
        // $this->meta['link_route'] = route('admin.'. $this->model_slug. '.list.index');
        // $this->meta['link_name'] = $this->model_translated. __('manager');
        $this->meta['title'] = $this->model_translated. __('manager');
    }

    public function index()
    {
        $this->authorize('index', $this->model_namespace);
        $this->meta['link_route'] = route('admin.'. $this->model_slug. '.list.create');
        $this->meta['link_name'] = __('create_new'). $this->model_translated;
        $this->meta['title'] = $this->model_translated. __('manager');
        $this->meta['search'] = 1;
        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', Str::studly($column['name'])),
            ];
        }

        return view('admin.list.index', ['meta' => $this->meta, 'columns' => $columns]);
    }

    public function create()
    {
        $this->authorize('create', $this->model_namespace);
        $this->meta['title'] = __('create_new'). $this->model_translated;
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'POST',
            'url' => route('admin.'. $this->model_slug. '.list.store'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'enctype' => 'multipart/form-data',
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function store()
    {
        $this->authorize('create', $this->model_namespace);
        $form = $this->form_builder->create($this->model_form);
        if (! $form->isValid()) {
            if(env('APP_ENV') === 'testing'){
                dd($form->getErrors(), $this->model, $form->getFieldValues());
            }
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $model = $this->model_repository->saveWithRelations($form->getFieldValues());

        if(env('APP_ENV') !== 'testing'){
            activity('Created')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model_name. ' Created');
        }
        $this->request->session()->flash('alert-success', $this->model_translated. __('created_successfully'));

        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }

    public function show($id)
    {
        $model = $this->model_repository->findOrFail($id);
        $this->authorize('view', $model);
        $data = $model;
        // show file attributes
        foreach($this->model_columns as $column){
            if($column['form_type'] === 'file' && $column['file_manager'] === false){
                $data[$column['name']] = $data->files_src($column['name']);
            }
        }

        $activities = \App\Models\Activity::where('activitiable_type', $this->model_namespace)
            ->where('activitiable_id', $id)
            ->get();

        $this->meta['title'] = $this->model_translated. __('show');
        $this->meta['link_route'] = route('admin.'. $this->model_slug. '.list.edit', $model);
        $this->meta['link_name'] = $this->model_translated. __('edit form');

        return view('admin.list.show', ['data' => $data, 'meta' => $this->meta, 'activities' => $activities]);
    }

    public function edit($id)
    {
        $model = $this->model_repository->findOrFail($id);
        $this->authorize('update', $model);

        $this->meta['title'] = __('edit'). $this->model_translated. ' - #'. $id;
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.'. $this->model_slug. '.list.update', $model),
            'class' => 'm-form m-form--state',
            'id' => 'admin_form',
            'model' => $model,
            'enctype' => 'multipart/form-data',
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function update($id)
    {
        $model = $this->model_repository->findOrFail($id);
        $this->authorize('update', $model);

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);
        if (! $form->isValid()){
            if(env('APP_ENV') === 'testing'){
                $errors = $form->getErrors();
                if(strpos(json_encode($errors), 'failed to upload') === false){
                    dd($errors);
                }
            }else{
                return redirect()->back()->withErrors($form->getErrors())->withInput();
            }
        }

        $this->model_repository->saveWithRelations($form->getFieldValues(), $model);

        if(env('APP_ENV') !== 'testing'){
            activity('Updated')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model_name. ' Updated');
        }
        $this->request->session()->flash('alert-success', $this->model_translated. __('updated_successfully'));

        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model_repository->findOrFail($id);
        $this->authorize('delete', $model);

        $model->delete();

        if(env('APP_ENV') !== 'testing'){
            activity('Deleted')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model_name. ' Deleted');
        }
        $this->request->session()->flash('alert-success', $this->model_translated. __('deleted_successfully'));

        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }

    public function restore($id)
    {
        $model = $this->model_repository->withTrashed()->findOrFail($id);
        $this->authorize('restore', $model);

        $model->restore();

        if(env('APP_ENV') !== 'testing'){
            activity('Restored')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model_name. ' Restored');
        }
        $this->request->session()->flash('alert-success', $this->model_translated. __('restored_successfully'));

        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }

    public function getPrint()
    {
        $list = $this->model_repository->all();

        return view('admin.common.print', compact('list'));
    }

    public function getPdf()
    {
        $list = $this->model_repository->all();

        return \PDF::loadView('admin.common.print', compact('list'))
            ->setPaper('a4', 'landscape')
            ->download($this->model_name. '.pdf');
    }

    public function getExport()
    {
        $class_name = 'App\Services\BaseExport';
        $base_export = new $class_name();
        $base_export->setModel($this->model_name);

        return Excel::download($base_export, $this->model_name. '.xlsx');
    }

    public function getImport()
    {
        $class_name = 'App\Services\BaseImport';
        $base_import = new $class_name();
        $base_import->setModel($this->model_name);

        Excel::import($base_import, storage_path('app/public/import.xlsx'));

        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }

    public function getToggleActivated($id)
    {
        $model = $this->model_repository->findOrFail($id);
        $model->activated = !$model->activated;
        $model->update();

        return response()->json([
            'data' => ['activated' => $model->activated],
        ]);
    }

    public function redirect()
    {
        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }    

    public function getDatatable()
    {
        $list = $this->model_repository->orderBy('updated_at', 'desc')->get();

        $datatable = datatables()
            ->of($list)
            ->addColumn('show_url', function($model) {
                return route('admin.'. $this->model_slug. '.list.show', $model);
            })
            ->addColumn('edit_url', function($model) {
                return route('admin.'. $this->model_slug. '.list.edit', $model);
            })
            ->addColumn('delete_url', function($model) {
                return route('admin.'. $this->model_slug. '.list.destroy', $model);
            });
        if($this->model_name === 'Notification') {
            // $datatable->addColumn('user', function($model) {
            //     return $model->user->id. ' - '. $model->user->full_name;
            // })->addColumn('type', function($model) {
            //     return str_replace('App\Notifications\\', '', $model->type);
            // })->addColumn('data', function($model) {
            //     return json_decode($model->data)->data;
            // });
        }
        elseif($this->model_name === 'Activity') {
            // $datatable->addColumn('causer', function($model) {
            //     return $model->causer->full_name;
            // });
        }
        elseif($this->model_name === 'Comment') {
            // $datatable->addColumn('blog_id', function($model) {
            //     if($model->blog){
            //         return $model->blog->id;
            //     }
            //     return null;
            // });
            // $datatable->addColumn('author', function($model) {
            //     if($model->user){
            //         return $model->user->full_name;
            //     }
            //     return null;
            // });
        }
        elseif($this->model_name === 'Block') {
            $datatable->addColumn('pages', function($model) {
                $pages = $model->pages()->pluck('title')->toArray();
                $output = 'Just in: ';
                if($model->show_all_pages){
                    $output = 'Not in: ';
                }
                if($pages){
                    $output.= implode(',<br>', $pages);
                }else{
                    $output.= '-';
                }
                return $output;
            });
        }
        elseif($this->model_name === 'Role') {
            $datatable->addColumn('permissions', function($model) {
                return implode(',<br>', $model->permissions()->pluck('name')->toArray());
            })
                ->addColumn('users', function($model) {
                return implode(',<br>', \App\Models\User::role($model->name)->select('email')->pluck('email')->toArray());
            });
        }

        $datatable->addColumn('image', function($model) {
            return '<img style="width:80%" src="'. $model->image. '">';
        });

        return $datatable->rawColumns(['id', 'order', 'image', 'content', 'users', 'permissions'])
            ->toJson();
    }
}