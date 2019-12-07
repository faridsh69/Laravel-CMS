<?php

namespace App\Base;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Auth;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Route;
use Spatie\Activitylog\Models\Activity;
use View;

class BaseListController extends Controller
{
    // public $model = 'Blog';
    public $model;

    // public $model_sm = 'blog';
    public $model_sm;

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
        'title' => 'Admin Panel',
        'description' => 'Admin Panel Page For Full Features, Best UI-UX Cms ever.',
        'keywords' => '',
        'image' => '/cdn/upload/images/logo.png',
        'alert' => 'Advanced form with nice ui, easy to fill, real validation, ckeditor, switch, multiselect, max length limmiter, icon base and responsive features.',
        'link_route' => '/',
        'link_name' => 'Dashboard',
        'search' => 0,
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->model_class = 'App\\Models\\' . $this->model;
        $this->model_sm = lcfirst($this->model);
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $this->repository = new $this->model_class();
        $this->request = $request;
        $this->form_builder = $form_builder;
        $this->model_columns = $this->repository->getColumns();
        if(Route::has('admin.' . $this->model_sm . '.list.index')){
            $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.index');
        }
        $this->meta['link_name'] = __($this->model . ' Manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['title'] = __($this->model . ' Manager');
        $this->meta['alert'] = 'Advanced data table with sort on each column, search, paginate, status changing and full access actions with policies.';
        if(Route::has('admin.' . $this->model_sm . '.list.index')){
            $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.create');
        }
        $this->meta['link_name'] = __('Create New ' . $this->model);
        $this->meta['search'] = 1;

        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', \Str::studly($column['name'])),
            ];
        }

        return view('admin.list.table', ['meta' => $this->meta, 'columns' => $columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $this->model_class);
        $this->meta['title'] = __('Create New ' . $this->model);

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
                dd($form->getErrors(), $this->model);
            }
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $main_data = $data;
        $data = $this->_changeDataBeforeCreate($this->model, $data, null);

        $model = $this->repository->create($data);
        
        $this->_saveRelatedDataAfterCreate($this->model, $main_data, $model);

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Created');
        }
        $this->request->session()->flash('alert-success', $this->model . ' Created Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    private function _changeDataBeforeCreate($model_name, $data, $model)
    {
        foreach(collect($this->model_columns)->where('type', 'boolean')->pluck('name') as $boolean_column) {
            if(!isset($data[$boolean_column]))
            {
                $data[$boolean_column] = 0;
            }
        }
        // Blog
        unset($data['tags']);
        unset($data['related_blogs']);
        // Product
        unset($data['tags']);
        unset($data['gallery']);
        unset($data['related_products']);
        // Form
        unset($data['fields']);
        // Block
        unset($data['pages']);
        // Role
        unset($data['users']);
        unset($data['permissions']);
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
        unset($data['password_confirmation']);
        if($model_name === 'User'){
            if(isset($data['password'])) {
                $data['password'] = \Hash::make($data['password']);
            }
            else{
                if($model){ // update mode
                    $data['password'] = $model->password;
                }
                else{ // create mode
                    $data['password'] = \Hash::make('123456');
                }
            }
        }
        // Comment

        return $data;
        

        // // comment
        // if($this->model === 'Comment'){
        //     $model->commentable_id = $data['commented_id'];
        //     $model->comment = $data['comment'];
        //     $model->update();

        //     if(env('APP_ENV') !== 'testing'){
        //         activity($this->model)
        //             ->performedOn($model)
        //             ->causedBy(Auth::user())
        //             ->log($this->model . ' Updated');
        //     }
        //     $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

        //     return redirect()->route('admin.' . $this->model_sm . '.list.index');
        // }        



        // // comment
        // if($this->model === 'Comment'){
        //     $blog = \App\Models\Blog::where('id', $data['commented_id'])->first();

        //     Auth::user()->comment($blog, $data['comment'], $rate = 0);
        //     $blog->comments[0]->approve();

        //     if(env('APP_ENV') !== 'testing'){
        //         activity($this->model)
        //             ->performedOn($blog)
        //             ->causedBy(Auth::user())
        //             ->log($this->model . ' Created');
        //     }

        //     $this->request->session()->flash('alert-success', $this->model . ' Created Successfully!');

        //     return redirect()->route('admin.' . $this->model_sm . '.list.index');
        // }

    }

    private function _saveRelatedDataAfterCreate($model_name, $data, $model)
    {
        // Blog
        if($model_name === 'Blog')
        {
            $model->related_blogs()->sync($data['related_blogs'], true);
            if(!isset($data['tags'])){
                $data['tags'] = [];
            }
            $tag_names = Tag::whereIn('id', $data['tags'])->pluck('name')->toArray();
            $model->retag($tag_names);
        }

        // Product
        if($model_name === 'Product')
        {
            $model->related_products()->sync($data['related_products'], true);
            if(!isset($data['tags'])){
                $data['tags'] = [];
            }
            $tag_names = Tag::whereIn('id', $data['tags'])->pluck('name')->toArray();
            $model->retag($tag_names);
            if(!isset($data['gallery'])){
                $data['gallery'] = [];
            }
            $image_service = new ImageService; 
            foreach($data['gallery'] as $gallery_image){
                $image_service->save($gallery_image, $model);
            }
        }

        // Form
        if($model_name === 'Form')
        {
            $model->fields()->sync($data['fields'], true);
        }

        // Block
        if($model_name === 'Block')
        {
            $model->pages()->sync($data['pages'], true);
        }

        // Role
        if($model_name === 'Role')
        {
            if(!isset($data['permissions'])){
                $data['permissions'] = [];
            }
            $permissions = \App\Models\Permission::whereIn('id', $data['permissions'])->get();
            $model->syncPermissions($permissions);

            if(!isset($data['users'])){
                $data['users'] = [];
            }

            // add role to new selected users
            $users = \App\Models\User::whereIn('id', $data['users'])->get();
            foreach($users as $user){
                $user->assignRole($model->name);
            }
        }
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
        $data = $model->getAttributes();

        $activities = Activity::where('subject_type', $this->model_class)
            ->where('subject_id', $id)
            ->get();

        $this->meta['title'] = __($this->model . ' Show');
        $this->meta['alert'] = 'Simple view of a model !';
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.edit', $model);
        $this->meta['link_name'] = __($this->model . ' Edit Form');

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

        $this->meta['title'] = __('Edit ' . $this->model . ' - #' . $id);
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
                dd($form->getErrors());
            }
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $main_data = $data;
        $data = $this->_changeDataBeforeCreate($this->model, $data, $model);

        $model->update($data);

        $this->_saveRelatedDataAfterCreate($this->model, $main_data, $model);

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Updated');
        }
        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

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
            activity($this->model)->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Deleted');
        }
        $this->request->session()->flash('alert-success', $this->model . ' Deleted Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function getRestore($id)
    {
        $model = $this->repository->withTrashed()->findOrFail($id);
        $this->authorize('restore', $model);

        $model->restore();

        if(env('APP_ENV') !== 'testing'){
            activity($this->model)->performedOn($model)->causedBy(Auth::user())
                ->log($this->model . ' Restored');
        }
        $this->request->session()->flash('alert-success', $this->model . ' Deleted Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function getPdf()
    {
        $list = $this->repository->all();

        return PDF::loadView('layout.print', compact('list'))
            ->setPaper('a4', 'landscape')
            ->download($this->model . '.pdf');
    }

    public function getPrint()
    {
        $list = $this->repository->all();

        return view('layout.print', compact('list'));
    }

    public function getExport()
    {
        $class_name = 'App\Base\BaseExport';
        $base_export = new $class_name();
        $base_export->setModel($this->model);

        return Excel::download($base_export, $this->model . '.xlsx');
    }

    public function getImport()
    {
        $class_name = 'App\Base\BaseImport';
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
            $datatable->addColumn('users', function($model) {
                return $model->user->email;
            });
        }
        elseif($this->model === 'Comment') {
            $datatable->addColumn('blog_id', function($model) {
                if($model->blog){
                    return $model->blog->id;
                }
                return null;
            });
            $datatable->addColumn('author', function($model) {
                if($model->user){
                    return $model->user->full_name;
                }
                return null;
            });
        }
        elseif($this->model === 'Block') {
            $datatable->addColumn('page', function($model) {
                if($model->page_id){
                    if(array_search($model->type, \App\Models\Block::getStaticTypes(), true) !== false) {
                        return '*';
                    }
                    return $model->page->title;
                }
                return null;
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
            return '<img style="width:80%" src="' . asset($model->image) . '">';
        }); 

        return $datatable->rawColumns(['id', 'image', 'content', 'order', 'users', 'permissions'])
            ->toJson();
    }

    public function getChangeStatus($id)
    {
        $model = $this->repository->findOrFail($id);

        if($this->model === 'Comment'){
            $model->approved = ! $model->approved;
        }else{
            $model->activated = ! $model->activated;
        }

        $model->update();

        return response()->json([
            'data' => $model->activated,
        ]);
    }

    public function getRedirect()
    {
        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }
}
