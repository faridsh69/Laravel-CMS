<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Auth;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use View;

class ListController extends Controller
{
    // public $model = 'Blog';
    public $model;

    // public $model_sm = 'blog';
    public $model_sm;

    // public $model_form = '\App\Forms\BlogForm';
    public $model_form;

    public $repository;

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
        $this->model_sm = lcfirst($this->model);
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $class_name = 'App\\Models\\' . $this->model;
        $this->repository = new $class_name();
        $this->request = $request;
        $this->form_builder = $form_builder;
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.index');
        $this->meta['link_name'] = __($this->model . ' Manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->meta['title'] = __($this->model . ' Manager');
        $this->meta['alert'] = 'Advanced table with sort, search, paginate and status changing!';
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.create');
        $this->meta['link_name'] = __('Create New ' . $this->model);
        $this->meta['search'] = 1;

        $table_columns = collect($this->repository->getColumns())
            ->where('table', true);

        $columns = [];
        foreach($table_columns as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s','$1 $2', \Str::studly($column['name']))
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
        $this->meta['title'] = __('Create New ' . $this->model);

        $form = $this->form_builder->create($this->model_form, [
            'method' => 'POST',
            'url' => route('admin.' . $this->model_sm . '.list.store'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
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
        $form = $this->form_builder->create($this->model_form);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

        if(isset($data['tags'])){
            $data_tags = $data['tags'];
            unset($data['tags']);
        }

        $model = $this->repository->create($data);

        if(isset($data_tags)){
            $tag_names = Tag::whereIn('id', $data_tags)->pluck('name')->toArray();
            $model->retag($tag_names);
        }

        activity($this->model)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model . ' Created');

        $this->request->session()->flash('alert-success', $this->model . ' Created Successfully!');

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
        $data = $model->getAttributes();

        $this->meta['title'] = __($this->model . ' Show');
        $this->meta['alert'] = 'Simple view of a model !';
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.edit', $model);
        $this->meta['link_name'] = __($this->model . ' Edit Form');

        return view('admin.list.show', ['data' => $data, 'meta' => $this->meta]);
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

        $this->meta['title'] = __('Edit ' . $this->model . ' ' . $id);
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.' . $this->model_sm . '.list.update', $model),
            'class' => 'm-form m-form--state',
            'id' => 'admin_form',
            'model' => $model,
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

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();

        if(isset($data['tags'])){
            $data_tags = $data['tags'];
        }
        if(isset($data['category'])){
            $data['category_id'] = $data['category'];
        }

        unset($data['category']);
        unset($data['tags']);

        $model->update($data);

        if(isset($data_tags)){
            $tag_names = Tag::whereIn('id', $data_tags)->pluck('name')->toArray();
            $model->retag($tag_names);
        }

        activity($this->model)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model . ' Updated');

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
        $model->delete();
        $this->request->session()->flash('alert-success', $this->model . ' Deleted Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function getPdf()
    {
        $list = $this->repository->all();
        $pdf = PDF::loadView('layout.print', compact('list'));

        return $pdf->download($this->model . '.pdf');
    }

    public function getPrint()
    {
        $list = $this->repository->all();

        return view('layout.print', compact('list'));
    }

    public function getExport()
    {
        $class_name = 'App\Exports\BaseExport';
        $base_export = new $class_name();
        $base_export->setModel($this->model);

        return Excel::download($base_export, $this->model . '.xlsx');
    }

    public function getImport()
    {
        $class_name = 'App\Imports\BaseImport';
        $base_import = new $class_name();
        $base_import->setModel($this->model);

        Excel::import($base_import, storage_path('app/public/import.xlsx'));

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function getDatatable()
    {
        $model = $this->repository->orderBy('id', 'desc')->get();
        
        return datatables()
            ->of($model)
            ->addColumn('editor', function($model) {
                return $model->editor->name;
            })
            ->addColumn('show_url', function($model) {
                return route('admin.' . $this->model_sm . '.list.show', $model);
            })
            ->addColumn('edit_url', function($model) {
                return route('admin.' . $this->model_sm . '.list.edit', $model);
            })
            ->addColumn('delete_url', function($model) {
                return route('admin.' . $this->model_sm . '.list.destroy', $model);
            })
            ->rawColumns(['id', 'content'])
            ->toJson();
    }

    public function getChangeStatus($id)
    {
        $model = $this->repository->findOrFail($id);

        $model->published = ! $model->published;
        $model->update();

        return response()->json([
            'data' => $model->published,
        ]);
    }

    public function getRedirect()
    {
        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }
}
