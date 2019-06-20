<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function index2()
    {
        dd(1);
        $meta = [
            'title' => config('0-general.default_meta_title'),
            'description' => config('0-general.default_meta_description'),
            'keywords' => '',
            'image' => config('0-general.default_meta_image'),
        ];

        $blocks = [];
        $blocks[] = ['widget_type' => 'menu', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'header', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'slider', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'breadcrumb', 'widget_id' => 1];
        $blocks[] = [
            'blocks' => [
                ['column' => 6, 'widget_type' => 'countdown', 'widget_id' => 1],
                ['column' => 6, 'widget_type' => 'customer_review', 'widget_id' => 1],
            ],
        ];
        $blocks[] = ['widget_type' => 'features', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'counting', 'widget_id' => 1];
        $blocks[] = [
            'blocks' => [
                ['column' => 3, 'widget_type' => 'news', 'widget_id' => 1],
                ['column' => 9, 'widget_type' => 'form', 'widget_id' => 1],
            ],
        ];
        $blocks[] = [
            'blocks' => [
                ['column' => 3, 'widget_type' => 'partner', 'widget_id' => 1],
                ['column' => 6, 'widget_type' => 'googlemap', 'widget_id' => 1],
                ['column' => 3, 'widget_type' => 'statics', 'widget_id' => 1],
            ],
        ];
        $blocks[] = [ 'widget_type' => 'footer', 'widget_id' => 3];

        return view('front.page.index', ['blocks' => $blocks, 'meta' => $meta]);
    }

    public function index($page_url = '/')
    {
        $page = Page::where('url', $page_url)->active()->first();
        abort_if(!$page, 404);

        $meta = [
            'title' => $page->title,
            'description' => $page->meta_description,
            'keywords' => $page->keywords,
            'image' => $page->meta_image,
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ? $page->canonical_url : url()->current(),
        ];
        $blocks = $page->blocks()->active()->get();

        return view('front.page.index' , ['blocks' => $blocks, 'page' => $page, 'meta' => $meta]);
    }
}
