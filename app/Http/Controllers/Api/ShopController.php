<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShopController extends Controller
{
    public function getCategories()
    {
        return Category::get();
    }
}
