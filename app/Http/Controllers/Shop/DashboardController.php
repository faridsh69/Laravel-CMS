<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;

class DashboardController extends Controller
{
    public function index($shop_subdomain)
    {
        $categories = Category::with('products')
            ->orderBy('order', 'asc')
            ->get();

        $shop = Shop::where('url', $shop_subdomain)->first();
        abort_if(! $shop, 404);

        $meta = [
            'title' => 'Dashboard ' . $shop->title_fa,
            'description' => 'Dashboard ' . $shop->meta_description,
            'keywords' => $shop->keywords,
            'image' => $shop->logo,
            'google_index' => 0,
            'canonical_url' => url()->current(),
        ];

        return view('shop.dashboard', array(
                        'shop' => $shop,
                        'meta' => $meta,
                        'categories' => $categories,
                        'is_restaurant_close' => 0,
                        'under_construction' => 0, 
                    ));

        // if (isset($folder[0])) {
        //     switch ($folder[0]->level) {
        //         case null:
        //         case "batch":
        //             return view('admin.menumaker.batches.index', array(
        //                 'folders' => $folder,
        //                 'fully_just_content' => $fully_just_content,
        //             ));
        //             break;
        //         case "set":
        //             return view('admin.menumaker.sets.index', array(
        //                 'folders' => $folder,
        //                 'fully_just_content' => $fully_just_content,));

        //         case "collection":
        //             return view('admin.menumaker.collections.index', array(
        //                 'folders' => $folder,
        //                 'fully_just_content' => $fully_just_content,));
        //     }
        // } else {
        //     return view('admin.menumaker.batches.index', array(
        //         'set' => 0,
        //         'batches' => null,
        //     ));
        // }

        // return view('front.shop.dashboard');
    }

    public function showItem()
    {

    }
}
