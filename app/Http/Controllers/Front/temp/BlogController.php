<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public $blog_page;

    public $meta;

    public function index()
    {
        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . 'Blogs',
            'description' => config('setting-general.default_meta_description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => config('setting-general.google_index'),
            'canonical_url' => url()->current(),
        ];

        $blogs = Blog::orderBy('id', 'desc')
            ->active()
            ->paginate(config('setting-general.pagination_number'));

        return view('front.list.index', ['blogs' => $blogs, 'meta' => $this->meta]);
    }

    public function show($blog_id)
    {
        $blog = Blog::where('id', $blog_id)->active()->first();
        abort_if(! $blog, 404);

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $blog->title,
            'description' => $blog->description,
            'keywords' => $blog->keywords,
            'image' => $blog->asset_image,
            'google_index' => config('setting-general.google_index') ?: $x,
            'canonical_url' => $blog->canonical_url ?: url()->current(),
        ];

        return view('front.components.blog.show', ['blog' => $blog, 'meta' => $this->meta]);
    }

    public function postComment(Request $request, $blog_id)
    {
        $blog = Blog::where('id', $blog_id)->active()->first();
        abort_if(! $blog, 404);

        $user = Auth::User();
        $user->comment($blog, $request->input('comment'), $request->input('rate'));

        $request->session()->flash('alert-success', __('comment_created'));

        return redirect()->back();
    }

    public function getCategories()
    {
        $categories = Category::active()->get();

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . __('blog categories'),
            'description' => __('blog categories description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => config('setting-general.google_index'),
            'canonical_url' => url()->current(),
        ];

        return view('front.components.blog.categories', ['categories' => $categories, 'meta' => $this->meta]);
    }

    public function getCategory($category_url)
    {
        $category = Category::where('url', $category_url)->active()->first();
        abort_if(! $category, 404);

        $blogs = Blog::where('category_id', $category->id)
            ->active()
            ->orderBy('id', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $category->title,
            'description' => $category->description,
            'keywords' => '',
            'image' => $category->asset_image,
            'google_index' => $category->google_index,
            'canonical_url' => $category->canonical_url ?: url()->current(),
        ];

        return view('front.components.blog.category', ['category' => $category, 'blogs' => $blogs, 'meta' => $this->meta]);
    }

    public function getTags()
    {
        $tags = Tag::get();

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . __('blog tags'),
            'description' => __('blog tags description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => config('setting-general.google_index'),
            'canonical_url' => url()->current(),
        ];

        return view('front.components.blog.tags', ['tags' => $tags, 'meta' => $this->meta]);
    }

    public function getTag($tag_url)
    {
        $tag = Tag::where('slug', $tag_url)->first();
        abort_if(! $tag, 404);

        $blogs = Blog::withAnyTag([$tag->name])
            ->orderBy('id', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $tag->title,
            'description' => $tag->description,
            'keywords' => '',
            'image' => $tag->asset_image,
            'google_index' => $tag->google_index,
            'canonical_url' => $tag->canonical_url ?: url()->current(),
        ];

        return view('front.components.blog.tag', ['tag' => $tag, 'blogs' => $blogs, 'meta' => $this->meta]);
    }
}
