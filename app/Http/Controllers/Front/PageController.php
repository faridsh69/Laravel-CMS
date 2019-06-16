<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
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

    public function show($page_url)
    {
        $meta = [
            'title' => 'APP_NAME',
            'description' => 'META_DESCRIPTION',
            'keywords' => '',
            'image' => '/cdn/upload/images/logo.png',
        ];

        $page = Page::where('url', $page_url)->first();
        abort_if(!$page, 404);

        $blocks = [];
        
        return view('front.page.show' , ['blocks' => $blocks, 'page' => $page, 'meta' => $meta]);
    }
}
