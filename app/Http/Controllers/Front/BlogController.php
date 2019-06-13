<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;

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

    public function getCategories()
    {
        $categories = Category::get();
        abort_if(!$categories, 404);
        
        return view('front.blog.categories' , ['categories' => $categories]);
    }

    public function getCategory($category_url)
    {
        $category = Category::where('title', $category_url)->first();
        abort_if(!$category, 404);
        
        return view('front.blog.category' , ['category' => $category]);
    }
}
