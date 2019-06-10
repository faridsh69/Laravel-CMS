<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome()
    {
        return redirect()->route('admin.dashboard.index');
    }

    public function index()
    {
        $meta = [
            'title' => 'APP_NAME',
            'description' => 'META_DESCRIPTION',
            'keywords' => '',
            'image' => '/cdn/upload/images/logo.png',
        ];

        $blocks = [];
        $blocks[] = ['widget_type' => 'menu', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'header', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'slider', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'breadcrumb', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'features', 'widget_id' => 1];
        $blocks[] = ['widget_type' => 'counting', 'widget_id' => 1];
        $blocks[] = [
            'blocks' => [
                ['column' => 6, 'widget_type' => 'countdown', 'widget_id' => 1],
                ['column' => 6, 'widget_type' => 'customer_review', 'widget_id' => 1],
            ],
        ];
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

        return view('front.home', ['blocks' => $blocks, 'meta' => $meta]);
    }
}
