<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product_page;

    public $meta;

    public function __construct()
    {
        $this->product_page = Page::where('url', 'product')->active()->first();
        abort_if(! $this->product_page, 404);

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $this->product_page->title,
            'description' => $this->product_page->description ?: config('setting-general.default_meta_description'),
            'keywords' => $this->product_page->keywords,
            'image' => $this->product_page->asset_image ?: asset(config('setting-general.default_meta_image')),
            'google_index' => config('setting-general.google_index') ?: $this->product_page->google_index,
            'canonical_url' => $this->product_page->canonical_url ?: url()->current(),
        ];
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')
            ->active()
            ->paginate(config('setting-general.pagination_number'));

        return view('front.page', ['page' => $this->product_page, 'products' => $products]);
    }

    public function show($product_id)
    {
        $product = Product::where('id', $product_id)->active()->first();
        abort_if(! $product, 404);

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . $product->title,
            'description' => $product->description,
            'keywords' => $product->keywords,
            'image' => $product->asset_image,
            'google_index' => config('setting-general.google_index') ?: $x,
            'canonical_url' => $product->canonical_url ?: url()->current(),
        ];

        return view('front.components.product.show', ['product' => $product, 'meta' => $this->meta]);
    }

    public function postComment(Request $request, $product_id)
    {
        $product = Product::where('id', $product_id)->active()->first();
        abort_if(! $product, 404);

        $user = Auth::User();
        $user->comment($product, $request->input('comment'), $request->input('rate'));

        $request->session()->flash('alert-success', __('comment_created'));

        return redirect()->back();
    }

    public function getCategories()
    {
        $categories = Category::active()->get();

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . __('product categories'),
            'description' => __('product categories description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => config('setting-general.google_index'),
            'canonical_url' => url()->current(),
        ];

        return view('front.components.product.categories', ['categories' => $categories, 'meta' => $this->meta]);
    }

    public function getCategory($category_url)
    {
        $category = Category::where('url', $category_url)->active()->first();
        abort_if(! $category, 404);

        $products = Product::where('category_id', $category->id)
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

        return view('front.components.product.category', ['category' => $category, 'products' => $products, 'meta' => $this->meta]);
    }

    public function getTags()
    {
        $tags = Tag::get();

        $this->meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . __('product tags'),
            'description' => __('product tags description'),
            'keywords' => '',
            'image' => config('setting-general.default_meta_image'),
            'google_index' => config('setting-general.google_index'),
            'canonical_url' => url()->current(),
        ];

        return view('front.components.product.tags', ['tags' => $tags, 'meta' => $this->meta]);
    }

    public function getTag($tag_url)
    {
        $tag = Tag::where('slug', $tag_url)->first();
        abort_if(! $tag, 404);

        $products = Product::withAnyTag([$tag->name])
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

        return view('front.components.product.tag', ['tag' => $tag, 'products' => $products, 'meta' => $this->meta]);
    }
}
