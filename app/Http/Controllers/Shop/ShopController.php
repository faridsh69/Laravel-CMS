<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;

class ShopController extends Controller
{
    public function getIndex()
    {
        // exec("php -q /home/faridsh/domains/mmenew.ir/add_subdomain.php xxqq");

        // return 1;
        $categories = Category::get();
        $shop = Shop::first();

        return view('front.shop.index', [
            'shop' => $shop,
            'categories' => $categories,
            'just_content' => 'just_content',
            'is_restaurant_close' => false,
            'user_id' => 1,
            'user_order_items' => 1,
            'first_time_open_menu' => true,
            'fully_just_content' => 'fully_just_content',
            'version_type' => 2,
            'license' => 1,
        ]
        );
        // title, url, description, meta_description, meta_image, activated, google_index, canonical_url, parent_id, _rgt, _lft, shop_id,

        // 'name', 'description', 'image', 'status', 'tag', 'sort', 'level', 'parent_id', 'user_id'


        // 'name', 'description', 'main_image', 'status', 'tag', 'sort', 'count', 'default_count', 'vote', 'voter_count', 'price', 'sell_count', 'ready_duration_time', 'discount', 'folder_id', 'short_description', 'available', 'discount_enable', 'check_critical_count', 'type'
    }

    public function getDashboard()
    {
        return view('front.shop.dashboard');
    }
}
