<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

use App\Models\Blog;
use App\Forms\BlogForm;

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

    public function getDatatable()
    {
        return datatables()->of(Blog::query())->toJson();
        return datatables()->of(DB::table('Blogs'))->toJson();
        return datatables()->of(Blog::all())->toJson();

        return datatables()->eloquent(Blog::query())->toJson();
        return datatables()->query(DB::table('Blogs'))->toJson();
        return datatables()->collection(Blog::all())->toJson();

        return datatables(Blog::query())->toJson();
        return datatables(DB::table('Blogs'))->toJson();
        return datatables(Blog::all())->toJson();
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
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(BlogForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();
        unset($data['languages']);

        Blog::create($data);

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

        dd($blog->getAttributes());
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

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        
        $data = $form->getFieldValues();
        unset($data['languages']);

        $blog->update($data);

        return redirect()->route('admin.blog.list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect()->route('admin.blog.list.index');
    }
}
