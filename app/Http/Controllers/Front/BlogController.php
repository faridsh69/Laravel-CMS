<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $meta = [
            'title' => 'APP_NAME',
            'description' => 'META_DESCRIPTION',
            'keywords' => '',
            'image' => '/cdn/upload/images/logo.png',
        ];

        $blogs = Blog::orderBy('id', 'desc')->paginate();

        return view('front.blog.index', ['meta' => $meta, 'blogs' => $blogs]);
    }

    public function show($blog_url)
    {
        $blog = Blog::where('url', $blog_url)->first();
        abort_if(!$blog, 404);
        
        return view('front.blog.show' , ['blog' => $blog]);
    }
}
