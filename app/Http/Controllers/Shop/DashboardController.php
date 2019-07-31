<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;

class DashboardController extends Controller
{
    public function index($shop_subdomain)
    {
        $shop = Shop::where('url', $shop_subdomain)->first();
        abort_if(! $shop, 404);

        $categories = Category::with('products')
            ->orderBy('order', 'asc')
            ->get();

        $meta = [
            'title' => 'Dashboard ' . $shop->title_fa,
            'description' => 'Dashboard ' . $shop->meta_description,
            'keywords' => $shop->keywords,
            'image' => $shop->logo,
            'google_index' => 0,
            'canonical_url' => url()->current(),
        ];

        return view('shop.dashboard', [
            'shop' => $shop,
            'meta' => $meta,
            'categories' => $categories,
            'is_restaurant_close' => 0,
            'under_construction' => 0, 
        ]);
    }

    public function showItem()
    {

    }
}
