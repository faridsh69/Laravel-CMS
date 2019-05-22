<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Exports\BlogsExport;
use App\Forms\BlogForm;
use App\Http\Controllers\Controller;
use App\Imports\BlogsImport;
use App\Models\Blog;
use Auth;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// use App\Models\Category;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meta = [
            'title' => __('Blog Manager'),
            'description' => __('Admin Panel Page For Best Cms In The World'),
            'image' => \Cdn::asset('upload/images/logo.png'),
            'alert' => 'This is a table of blogs with sort and filter and paginate.',
            'link_route' => route('admin.blog.list.create'),
            'link_name' => __('Create New Blog'),
        ];

        return view('admin.blog.list.index', compact('meta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $meta = [
            'title' => __('Create New Blog'),
            'description' => __('Admin Panel Page For Best Cms In The World'),
            'image' => \Cdn::asset('upload/images/logo.png'),
            'alert' => 'This is a full feature form that can create seo based blog in website.',
            'link_route' => route('admin.blog.list.index'),
            'link_name' => __('Blog Manager'),
        ];

        $form = $formBuilder->create(BlogForm::class, [
            'method' => 'POST',
            'url' => route('admin.blog.list.store'),
            'class' => 'm-form m-form--fit m-form--state m-form--label-align-right',
            'id' => 'blog_form',
        ]);

        return view('admin.blog.list.create', compact('form', 'meta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create(BlogForm::class);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();

        $data_tags = $data['tags'];
        unset($data['tags']);
        $blog = Blog::create($data);

        if($data_tags){
            $tag_names = Tag::whereIn('id', $data_tags)->pluck('name')->toArray();
            $blog->retag($tag_names);
        }

        activity('Blog')
            ->performedOn($blog)
            ->causedBy(Auth::user())
            ->log('Blog Created');

        $request->session()->flash('alert-success', 'Blog Created Successfully!');

        return redirect()->route('admin.blog.list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        echo json_encode($blog->getAttributes());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $blog = Blog::findOrFail($id);

        $meta = [
            'title' => __('Edit Blog'),
            'description' => __('Admin Panel Page For Best Cms In The World'),
            'image' => \Cdn::asset('upload/images/logo.png'),
            'alert' => 'This is a full feature form that can create seo based blog in website.',
            'link_route' => route('admin.blog.list.index'),
            'link_name' => __('Blog Manager'),
        ];

        $form = $formBuilder->create(BlogForm::class, [
            'method' => 'PUT',
            'url' => route('admin.blog.list.update', $blog),
            'class' => 'm-form m-form--fit m-form--state m-form--label-align-right',
            'id' => 'blog_form',
            'model' => $blog,
        ]);

        return view('admin.blog.list.create', compact('form', 'meta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, FormBuilder $formBuilder)
    {
        $blog = Blog::findOrFail($id);

        $form = $formBuilder->create(BlogForm::class, [
            'model' => $blog,
        ]);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();

        unset($data['related_blogs']);

        $tag_names = Tag::whereIn('id', $data['tags'])->pluck('name')->toArray();
        $blog->retag($tag_names);
        unset($data['tags']);

        $blog->update($data);

        activity('Blog')
            ->performedOn($blog)
            ->causedBy(Auth::user())
            ->log('Blog Updated');

        $request->session()->flash('alert-success', 'Blog Updated Successfully!');

        return redirect()->route('admin.blog.list.index');
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
        $list = Blog::all();

        // return view('layout.print', compact('list'));
        $pdf = PDF::loadView('layout.print', compact('list'));

        return $pdf->download('blogs.pdf');
    }

    public function getExport(BlogsExport $blog_export)
    {
        return Excel::download($blog_export, 'blogs.xlsx');
    }

    public function getImport(BlogsImport $blog_import)
    {
        Excel::import($blog_import, storage_path('upload/import.xlsx'));

        return redirect()->route('admin.blog.list.index');
    }

    public function getDatatable()
    {
        $blogs = Blog::orderBy('updated_at', 'desc')->get();

        return datatables()
            ->of($blogs)
            ->addColumn('editor', function($blog) {
                return $blog->editor->name;
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
        $blog = Blog::findOrFail($id);

        $blog->published = ! $blog->published;
        $blog->update();

        return response()->json([
            'data' => $blog->published,
        ]);
    }
}
