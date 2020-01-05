<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function postComment(Request $request, $blog_id)
    {
        $blog = Blog::where('id', $blog_id)->active()->first();
        abort_if(! $blog, 404);

        $user = Auth::User();
        $user->comment($blog, $request->input('comment'), $request->input('rate'));

        $request->session()->flash('alert-success', __('comment_created'));

        return redirect()->back();
    }

    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->active()->paginate(config('setting-general.pagination_number'));
        $page = Page::where('url', 'blog')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('setting-general.app_name') . ' | Blogs',
            'description' => config('setting-general.default_meta_description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $blocks = Block::active()
            ->orderBy('order', 'asc')
            ->get();

        $output_blocks = [];
        foreach($blocks as $block)
        {
            if($block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) === false){
                $output_blocks[] = $block;
            }

            if(! $block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) !== false){
                $output_blocks[] = $block;
            }
        }

        $blocks = $output_blocks;

        return view('front.page', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs]);
    }

    public function show($blog_id)
    {
        $blog = Blog::where('id', $blog_id)->active()->first();
        abort_if(! $blog, 404);

        $page = Page::where('url', 'blog')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => $blog->title,
            'description' => $blog->meta_description,
            'keywords' => $blog->keywords,
            'image' => $blog->meta_image,
            'google_index' => $blog->google_index,
            'canonical_url' => $blog->canonical_url ?: url()->current(),
        ];

        $blocks = Block::active()
            ->orderBy('order', 'asc')
            ->get();

        $output_blocks = [];
        foreach($blocks as $block)
        {
            if($block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) === false){
                $output_blocks[] = $block;
            }

            if(! $block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) !== false){
                $output_blocks[] = $block;
            }
        }

        $blocks = $output_blocks;

        return view('front.page', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blog' => $blog]);
    }

    public function getCategories()
    {
        $categories = Category::active()->get();
        $blogs = null;

        $page = Page::where('url', 'blog')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('setting-general.app_name') . ' | Category Of Blogs',
            'description' => config('setting-general.default_meta_description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $blocks = Block::active()
            ->orderBy('order', 'asc')
            ->get();

        $output_blocks = [];
        foreach($blocks as $block)
        {
            if($block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) === false){
                $output_blocks[] = $block;
            }

            if(! $block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) !== false){
                $output_blocks[] = $block;
            }
        }

        $blocks = $output_blocks;

        return view('front.page', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'categories' => $categories]);
    }

    public function getCategory($category_url)
    {
        $category = Category::where('url', $category_url)->first();
        abort_if(! $category, 404);

        $categories = Category::get();
        $blogs = Blog::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(config('setting-general.pagination_number'));

        $page = Page::where('url', 'blog')->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('setting-general.app_name') . ' | ' . $category->title,
            'description' => $category->meta_description,
            'keywords' => '',
            'image' => $category->meta_image,
            'google_index' => $category->google_index,
            'canonical_url' => $category->canonical_url ?: url()->current(),
        ];

        $blocks = Block::active()
            ->orderBy('order', 'asc')
            ->get();

        $output_blocks = [];
        foreach($blocks as $block)
        {
            if($block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) === false){
                $output_blocks[] = $block;
            }

            if(! $block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) !== false){
                $output_blocks[] = $block;
            }
        }

        $blocks = $output_blocks;

        return view('front.page', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'category' => $category, 'categories' => $categories]);
    }

    public function getTags()
    {
        $categories = Tag::get();
        $blogs = Blog::orderBy('id', 'desc')->paginate(config('setting-general.pagination_number'));

        $page = Page::where('url', 'blog')->active()->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('setting-general.app_name') . ' | Tag Of Blogs',
            'description' => config('setting-general.default_meta_description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $blocks = Block::active()
            ->orderBy('order', 'asc')
            ->get();

        $output_blocks = [];
        foreach($blocks as $block)
        {
            if($block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) === false){
                $output_blocks[] = $block;
            }

            if(! $block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) !== false){
                $output_blocks[] = $block;
            }
        }

        $blocks = $output_blocks;

        return view('front.page', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'categories' => $categories]);
    }

    public function getTag($tag_url)
    {
        $category = Tag::where('slug', $tag_url)->first();
        abort_if(! $category, 404);

        $blogs = Blog::withAnyTag([$category->name])->orderBy('id', 'desc')->paginate(config('setting-general.pagination_number'));

        $page = Page::where('url', 'blog')->first();
        abort_if(! $page, 404);

        $meta = [
            'title' => config('setting-general.app_name') . ' | ' . $category->title,
            'description' => config('setting-general.default_meta_description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $blocks = Block::active()
            ->orderBy('order', 'asc')
            ->get();

        $output_blocks = [];
        foreach($blocks as $block)
        {
            if($block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) === false){
                $output_blocks[] = $block;
            }

            if(! $block->show_all_pages && array_search($page->id, $block->pages->pluck('id')->toArray(), true) !== false){
                $output_blocks[] = $block;
            }
        }

        $blocks = $output_blocks;

        return view('front.page', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta, 'blogs' => $blogs, 'category' => $category]);
    }
}
