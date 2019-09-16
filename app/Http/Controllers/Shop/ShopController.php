<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getComment($shop_subdomain)
    {
        $shop = Shop::where('url', $shop_subdomain)->first();
        abort_if(! $shop, 404);

        $meta = [
            'title' => $shop->title,
            'description' => $shop->meta_description,
            'keywords' => $shop->keywords,
            'image' => $shop->logo,
            'google_index' => 0,
            'canonical_url' => url()->current(),
        ];

        $form = \App\Models\Form::active()->first();

        return view('shop.comment', ['meta' => $meta, 'shop' => $shop, 'form' => $form]);
    }

    public function postComment($shop_subdomain, Request $request)
    {
        dd($request->all());
    }

    public function getVue()
    {
        return 1;
    }

    public function getIndex($shop_subdomain)
    {
        $shop = Shop::where('url', $shop_subdomain)->first();
        abort_if(! $shop, 404);

        $meta = [
            'title' => $shop->title,
            'description' => $shop->meta_description,
            'keywords' => $shop->keywords,
            'image' => $shop->logo,
            'google_index' => 0,
            'canonical_url' => url()->current(),
        ];

        $categories = Category::where('shop_id', $shop->id)
            ->active()
            ->orderBy('order', 'asc')
            ->get();

        return view('shop.index', [
            'meta' => $meta,
            'shop' => $shop,
            'categories' => $categories,
            // 'just_content' => 'just_content',
            // 'is_restaurant_close' => false,
            // 'user_id' => 1,
            // 'user_order_items' => 1,
            // 'first_time_open_menu' => true,
            // 'fully_just_content' => 'fully_just_content',
            // 'version_type' => 2,
            // 'license' => 1,
        ]);
        // title, url, description, meta_description, meta_image, activated, google_index, canonical_url, parent_id, _rgt, _lft, shop_id,

        // 'name', 'description', 'image', 'status', 'tag', 'sort', 'level', 'parent_id', 'user_id'

        // 'name', 'description', 'main_image', 'status', 'tag', 'sort', 'count', 'default_count', 'vote', 'voter_count', 'price', 'sell_count', 'ready_duration_time', 'discount', 'folder_id', 'short_description', 'available', 'discount_enable', 'check_critical_count', 'type'
    }
}
