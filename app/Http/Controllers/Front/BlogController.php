<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate();

        $page = Page::where('url', 'blogs')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('0-general.app_name') . ' | Blogs',
            'description' => config('0-general.default_meta_description'),
            'keywords' => '',
            'image' => config('0-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $static_types = Block::getStaticTypes();
        $blocks = Block::active()
            ->where(function($query) use ($page, $static_types) {
                $query->where('page_id', $page->id)
                    ->orWhereIn('widget_type', $static_types);
            })
            ->orderBy('order', 'asc')
            ->get();

        return view('front.page.index', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs]);
    }

    public function show($blog_url)
    {
        $blog = Blog::where('url', $blog_url)->active()->first();
        abort_if(! $blog, 404);

        $page = Page::where('url', 'blogs')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => $blog->title,
            'description' => $blog->meta_description,
            'keywords' => $blog->keywords,
            'image' => $blog->meta_image,
            'google_index' => $blog->google_index,
            'canonical_url' => $blog->canonical_url ?: url()->current(),
        ];

        $static_types = Block::getStaticTypes();
        $blocks = Block::active()
            ->where(function($query) use ($page, $static_types) {
                $query->where('page_id', $page->id)
                    ->orWhereIn('widget_type', $static_types);
            })
            ->orderBy('order', 'asc')
            ->get();

        return view('front.page.index', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blog' => $blog]);
    }

    public function getCategories()
    {
        $categories = Category::get();
        $blogs = Blog::orderBy('id', 'desc')->paginate();

        $page = Page::where('url', 'blogs')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('0-general.app_name') . ' | Category Of Blogs',
            'description' => config('0-general.default_meta_description'),
            'keywords' => '',
            'image' => config('0-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $static_types = Block::getStaticTypes();
        $blocks = Block::active()
            ->where(function($query) use ($page, $static_types) {
                $query->where('page_id', $page->id)
                    ->orWhereIn('widget_type', $static_types);
            })
            ->orderBy('order', 'asc')
            ->get();

        return view('front.page.index', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'categories' => $categories]);
    }

    public function getCategory($category_url)
    {
        $category = Category::where('url', $category_url)->first();
        abort_if(! $category, 404);

        $categories = Category::get();
        $blogs = Blog::where('category_id', $category->id)->orderBy('id', 'desc')->paginate();

        $page = Page::where('url', 'blogs')->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('0-general.app_name') . ' | ' . $category->title,
            'description' => $category->meta_description,
            'keywords' => '',
            'image' => $category->meta_image,
            'google_index' => $category->google_index,
            'canonical_url' => $category->canonical_url ?: url()->current(),
        ];

        $static_types = Block::getStaticTypes();
        $blocks = Block::active()
            ->where(function($query) use ($page, $static_types) {
                $query->where('page_id', $page->id)
                    ->orWhereIn('widget_type', $static_types);
            })
            ->orderBy('order', 'asc')
            ->get();

        return view('front.page.index', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'category' => $category, 'categories' => $categories]);
    }

    public function getTags()
    {
        $categories = Tag::get();
        $blogs = Blog::orderBy('id', 'desc')->paginate();

        $page = Page::where('url', 'blogs')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('0-general.app_name') . ' | Tag Of Blogs',
            'description' => config('0-general.default_meta_description'),
            'keywords' => '',
            'image' => config('0-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $static_types = Block::getStaticTypes();
        $blocks = Block::active()
            ->where(function($query) use ($page, $static_types) {
                $query->where('page_id', $page->id)
                    ->orWhereIn('widget_type', $static_types);
            })
            ->orderBy('order', 'asc')
            ->get();

        return view('front.page.index', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'categories' => $categories]);
    }

    public function getTag($tag_url)
    {
        $category = Tag::where('slug', $tag_url)->first();
        abort_if(! $category, 404);

        $blogs = Blog::withAnyTag([$category->name])->orderBy('id', 'desc')->paginate();

        $page = Page::where('url', 'blogs')->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('0-general.app_name') . ' | ' . $category->title,
            'description' => config('0-general.default_meta_description'),
            'keywords' => '',
            'image' => config('0-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $static_types = Block::getStaticTypes();
        $blocks = Block::active()
            ->where(function($query) use ($page, $static_types) {
                $query->where('page_id', $page->id)
                    ->orWhereIn('widget_type', $static_types);
            })
            ->orderBy('order', 'asc')
            ->get();

        return view('front.page.index', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'category' => $category]);
    }
}
