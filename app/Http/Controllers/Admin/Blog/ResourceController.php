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
        return view('admin.blog.list.index');
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
        $form = $formBuilder->create(BlogForm::class, [
            'method' => 'POST',
            'url' => route('admin.blog.list.store')
        ]);

        return view('admin.blog.list.create', compact('form'));
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

        // Do saving and other things...
        $data = $form->getFieldValues();
        $data['creator_id'] = \Auth::id();
        $data['editor_id'] = \Auth::id();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
