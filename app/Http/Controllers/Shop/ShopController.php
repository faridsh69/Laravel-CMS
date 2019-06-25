<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Block;

class ShopController extends Controller
{
    public function index()
    {
        return view('front.shop.index', [
            'folders' => [],
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
    }
}
