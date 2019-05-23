<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Auth;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use View;
// use App\Models\Category;

class ResourceController extends Controller
{
    public $model = 'Blog';
    public $model_sm = 'blog';
    public $model_form = '\App\Forms\BlogForm';
    public $repository;
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

    public function __construct()
    {
        $class_name = 'App\\Models\\' . $this->model;
        $this->repository = new $class_name;
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

        return view('admin.list.table', ['meta' => $this->meta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $this->meta['title'] = __('Create New ' . $this->model);

        $form = $formBuilder->create($this->model_form, [
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
    public function store(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create($this->model_form);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

        $data_tags = $data['tags'];
        unset($data['tags']);
        $model = $this->repository->create($data);

        if($data_tags){
            $tag_names = Tag::whereIn('id', $data_tags)->pluck('name')->toArray();
            $model->retag($tag_names);
        }

        activity($this->model)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model . ' Created');

        $request->session()->flash('alert-success', $this->model . ' Created Successfully!');

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
    public function edit($id, FormBuilder $formBuilder)
    {
        $model = $this->repository->findOrFail($id);

        $this->meta['title'] = __('Edit ' . $this->model . ' ' . $id);

        $form = $formBuilder->create($this->model_form, [
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
    public function update($id, FormBuilder $formBuilder, Request $request)
    {
        $model = $this->repository->findOrFail($id);

        $form = $formBuilder->create($this->model_form, [
            'model' => $model,
        ]);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();
        $data_tags = $data['tags'];
        unset($data['tags']);
        $model->update($data);

        if($data_tags){
            $tag_names = Tag::whereIn('id', $data_tags)->pluck('name')->toArray();
            $model->retag($tag_names);
        }

        activity($this->model)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model . ' Updated');

        $request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        $request->session()->flash('alert-danger', 'Blog Deleted Successfully!');

        return redirect()->route('admin.blog.list.index');
    }

    public function getPdf()
    {
        $list = $this->repository->all();

        // return view('layout.print', compact('list'));
        $pdf = PDF::loadView('layout.print', compact('list'));

        return $pdf->download($this->model . '.pdf');
    }

    public function getExport(BlogsExport $blog_export)
    {
        // $class_name = 'App\\Models\\' . $this->model;
        // $this->repository = new $class_name;
        return Excel::download($blog_export, 'blogs.xlsx');
    }

    public function getImport(BlogsImport $blog_import)
    {
        Excel::import($blog_import, storage_path('upload/import.xlsx'));

        return redirect()->route('admin.blog.list.index');
    }

    public function getDatatable()
    {
        $blogs = $this->repository->orderBy('updated_at', 'desc')->get();

        return datatables()
            ->of($blogs)
            ->addColumn('editor', function($blog) {
                return $blog->editor->name;
            })
            ->addColumn('show_url', function($blog) {
                return route('admin.blog.list.show', $blog);
            })
            ->addColumn('edit_url', function($blog) {
                return route('admin.blog.list.edit', $blog);
            })
            ->addColumn('delete_url', function($blog) {
                return route('admin.blog.list.destroy', $blog);
            })
            ->rawColumns(['id'])
            ->toJson();
    }

    public function getChangeStatus($id)
    {
        $blog = $this->repository->findOrFail($id);

        $blog->published = ! $blog->published;
        $blog->update();

        return response()->json([
            'data' => $blog->published,
        ]);
    }
}
