<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function getProduct($shop_url, $id, $width)
    {
        $product = Product::where('id', $id)->first();
        $image = Image::make($product->image);

        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        return $image->response('jpg');
    }
}
