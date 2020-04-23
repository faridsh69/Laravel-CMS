<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use Route;
use Str;
use View;

class BaseListController extends Controller
{
    // public $model = 'Blog';
    public $model;

    // public $model_sm = 'blog';
    public $model_sm;

    // public $model_trans = 'Blog';
    public $model_trans;

    // public $model_form = '\App\Forms\BlogForm';
    public $model_form;

    // App\Models\Blog
    public $model_class;

    // App\Models\Blog
    public $model_columns;

    public $repository;

    public $request;

    public $form_builder;

    public $meta = [
        'title' => '',
        'description' => 'Admin Panel Page For Full Features, Best UI-UX Cms.',
        'keywords' => '',
        'image' => '/cdn/upload/images/logo.png',
        'alert' => '',
        'link_route' => '/admin',
        'link_name' => 'Dashboard',
        'search' => 0,
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->request = $request;
        $this->model_sm = strtolower($this->model);
        if($this->model === null){
            $url_model = $this->request->segment(2);
            $this->model = Str::studly($url_model);
            $this->model_sm = strtolower($url_model);
        }
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $form_file = __DIR__ . '\..\Forms\\' . $this->model . 'Form.php';
        if(!file_exists($form_file)){
            $this->model_form = $this->model_form = 'App\Forms\Form';
        }
        
        $this->model_trans = __($this->model_sm);
        $this->model_class = 'App\\Models\\' . $this->model;
        $this->repository = new $this->model_class();
        $this->form_builder = $form_builder;
        $this->model_columns = $this->repository->getColumns();
        if(Route::has('admin.' . $this->model_sm . '.list.index')){
            $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.index');
        }
        $this->meta['link_name'] = __($this->model_sm . '_manager');
        $this->meta['title'] = __($this->model_sm . '_manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', $this->model_class);
        if(Route::has('admin.' . $this->model_sm . '.list.index')){
            $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.create');
        }
        $this->meta['link_name'] = __(strtolower($this->model . '_create'));
        $this->meta['title'] = __(strtolower($this->model . '_manager'));
        $this->meta['search'] = 1;

        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', \Str::studly($column['name'])),
            ];
        }

        return view('admin.list.index', ['meta' => $this->meta, 'columns' => $columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $this->model_class);
        $this->meta['title'] = __(strtolower($this->model . '_create'));
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'POST',
            'url' => route('admin.' . $this->model_sm . '.list.store'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
            'enctype' => 'multipart/form-data',
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->authorize('create', $this->model_class);
        $form = $this->form_builder->create($this->model_form);

        if (! $form->isValid()) {
            if(env('APP_ENV') === 'testing'){
                dd($form->getErrors(), $this->model, $form->getFieldValues());
            }
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $main_data = $data;

        $data = $this->_changeDataBeforeCreate($this->model, $data, null);

        $model = $this->repository->create($data);

        $this->_saveRelatedDataAfterCreate($this->model, $main_data, $model);

        if(env('APP_ENV') !== 'testing'){
            activity('Created')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Created');
        }
        $this->request->session()->flash('alert-success', $this->model_trans . __('created successfully'));

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->repository->findOrFail($id);
        $this->authorize('view', $model);
        $data = $model;
        // show file attributes
        foreach($this->model_columns as $column){
            if($column['form_type'] === 'file' && $column['file_manager'] === false){
                $data[$column['name']] = $data->files_src($column['name']);
            }
        }

        $activities = \App\Models\Activity::where('activitiable_type', $this->model_class)
            ->where('activitiable_id', $id)
            ->get();

        $this->meta['title'] = $this->model_trans . __('show');
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.edit', $model);
        $this->meta['link_name'] = $this->model_trans . __('edit form');

        return view('admin.list.show', ['data' => $data, 'meta' => $this->meta, 'activities' => $activities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->repository->findOrFail($id);
        $this->authorize('update', $model);

        $this->meta['title'] = __('edit') . $this->model_trans . ' - #' . $id;
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.' . $this->model_sm . '.list.update', $model),
            'class' => 'm-form m-form--state',
            'id' => 'admin_form',
            'model' => $model,
            'enctype' => 'multipart/form-data',
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $model = $this->repository->findOrFail($id);
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
        $data = $form->getFieldValues();
        $main_data = $data;
        $data = $this->_changeDataBeforeCreate($this->model, $data, $model);

        $model->update($data);

        $this->_saveRelatedDataAfterCreate($this->model, $main_data, $model);

        if(env('APP_ENV') !== 'testing'){
            activity('Updated')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Updated');
        }
        $this->request->session()->flash('alert-success', $this->model_trans . __('updated successfully'));

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->repository->findOrFail($id);
        $this->authorize('delete', $model);

        $model->delete();

        if(env('APP_ENV') !== 'testing'){
            activity('Deleted')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Deleted');
        }
        $this->request->session()->flash('alert-success', $this->model_trans . __('deleted successfully'));

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function restore($id)
    {
        $model = $this->repository->withTrashed()->findOrFail($id);
        $this->authorize('restore', $model);

        $model->restore();

        if(env('APP_ENV') !== 'testing'){
            activity('Restored')->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Restored');
        }
        $this->request->session()->flash('alert-success', $this->model_trans . __('restored successfully'));

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function getPrint()
    {
        $list = $this->repository->all();

        return view('admin.common.print', compact('list'));
    }

    public function getPdf()
    {
        $list = $this->repository->all();

        return \PDF::loadView('admin.common.print', compact('list'))
            ->setPaper('a4', 'landscape')
            ->download($this->model . '.pdf');
    }

    public function getExport()
    {
        $class_name = 'App\Services\BaseExport';
        $base_export = new $class_name();
        $base_export->setModel($this->model);

        return Excel::download($base_export, $this->model . '.xlsx');
    }

    public function getImport()
    {
        $class_name = 'App\Services\BaseImport';
        $base_import = new $class_name();
        $base_import->setModel($this->model);

        Excel::import($base_import, storage_path('app/public/import.xlsx'));

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function getDatatable()
    {
        $list = $this->repository->orderBy('updated_at', 'desc')->get();

        $datatable = datatables()
            ->of($list)
            ->addColumn('show_url', function($model) {
                return route('admin.' . $this->model_sm . '.list.show', $model);
            })
            ->addColumn('edit_url', function($model) {
                return route('admin.' . $this->model_sm . '.list.edit', $model);
            })
            ->addColumn('delete_url', function($model) {
                return route('admin.' . $this->model_sm . '.list.destroy', $model);
            });
        if($this->model === 'Notification') {
            $datatable->addColumn('user', function($model) {
                return $model->user->id . ' - ' . $model->user->full_name;
            })->addColumn('type', function($model) {
                return str_replace('App\Notifications\\', '', $model->type);
            })->addColumn('data', function($model) {
                return json_decode($model->data)->data;
            });
        }
        elseif($this->model === 'Activity') {
            $datatable->addColumn('causer', function($model) {
                return $model->causer->full_name;
            });
        }
        elseif($this->model === 'Comment') {
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
        elseif($this->model === 'Block') {
            $datatable->addColumn('pages', function($model) {
                $pages = $model->pages()->pluck('title')->toArray();
                $output = 'Just in: ';
                if($model->show_all_pages){
                    $output = 'Not in: ';
                }
                if($pages){
                    $output .= implode(',<br>', $pages);
                }else{
                    $output .= '-';
                }
                return $output;
            });
        }
        elseif($this->model === 'Role') {
            $datatable->addColumn('permissions', function($model) {
                return implode(',<br>', $model->permissions()->pluck('name')->toArray());
            })
                ->addColumn('users', function($model) {
                return implode(',<br>', \App\Models\User::role($model->name)->select('email')->pluck('email')->toArray());
            });
        }

        $datatable->addColumn('image', function($model) {
            return '<img style="width:80%" src="' . $model->image . '">';
        });

        return $datatable->rawColumns(['id', 'order', 'image', 'content', 'users', 'permissions'])
            ->toJson();
    }

    public function getChangeStatus($id)
    {
        $model = $this->repository->findOrFail($id);

        // if($this->model === 'Comment'){
        //     $model->approved = ! $model->approved;
        // }else{
        //     $model->activated = ! $model->activated;
        // }

        $model->update();

        return response()->json([
            'data' => $model->activated,
        ]);
    }

    public function redirect()
    {
        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function _changeDataBeforeCreate($model_name, $data, $model)
    {
        // null and false => 0, true => 1
        foreach(collect($this->model_columns)->where('type', 'boolean')->pluck('name') as $boolean_column)
        {
            if(! isset($data[$boolean_column]))
            {
                $data[$boolean_column] = 0;
            }
        }

        // unset file and array attributes before saving
        foreach(collect($this->model_columns)->whereIn('type', ['file', 'array', 'captcha'])->pluck('name') as $file_uploader_column)
        {
            unset($data[$file_uploader_column]);
        }

        if($model_name === 'Role')
        {
            // remove role from old users in update mode
            if($model){
                $role_name = $model->name;
                $old_users = \App\Models\User::whereHas('roles', function($q) use($role_name){
                    $q->where('name', $role_name);
                })->get();
                foreach($old_users as $old_user){
                    $old_user->removeRole($role_name);
                }
            }
        }

        // User
        if($model_name === 'User'){
            unset($data['password_confirmation']);
            if(isset($data['password'])) {
                $data['password'] = \Hash::make($data['password']);
            }
            else{
                if($model){ // update mode
                    $data['password'] = $model->password;
                     if($model->email !== $data['email']){
                        $model->activation_code = null;
                        $model->email_verified_at = null;
                    }

                    if($model->phone !== $data['phone']){
                        $model->activation_code = null;
                        $model->phone_verified_at = null;
                    }
                }
                else{ // create mode
                    $data['password'] = \Hash::make('123456');
                }
            }
        }

        return $data;
    }

    public function _saveRelatedDataAfterCreate($model_name, $data, $model)
    {
        // files column
        foreach(collect($this->model_columns)->where('type', 'file')->pluck('name') as $file_column) {
            $file = $data[$file_column];
            if($file){
                $file_service = new \App\Services\FileService();
                $file_service->save($file, $model, $file_column);
            }
        }

        // array columns
        // tag, related_blogs, related_products, pages, related_pages, rol->users, permissions, form->fields
        foreach(collect($this->model_columns)->where('type', 'array')->pluck('name') as $array_column) {
            if(array_search($array_column, ['users', 'permissions'], true) === false){
                $model->{$array_column}()->sync($data[$array_column], true);
            }
        }

        // Role
        if($model_name === 'Role')
        {
            if(! isset($data['permissions'])){
                $data['permissions'] = [];
            }
            $permissions = \App\Models\Permission::whereIn('id', $data['permissions'])->get();
            $model->syncPermissions($permissions);

            if(! isset($data['users'])){
                $data['users'] = [];
            }

            // add role to new selected users
            $users = \App\Models\User::whereIn('id', $data['users'])->get();
            foreach($users as $user){
                $user->assignRole($model->name);
            }
        }

        // Comment
        // if($model_name === 'Comment'){
        //     $model->commented_id = Auth::id();
        //     $model->commented_type = 'App\Models\User';
        //     $model->commentable_type = 'App\Models\Blog';
        //     $model->update();
        //     $model->approve();
        // }
    }
}
