<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Cache;
use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function getProduct($shop_url, $id, $width)
    {
    	sleep(0.3);
    	$product = Product::findOrFail($id);
        abort_if(!$product->image, 404);

    	$seconds = 3;
        $value = Cache::remember('shop.image.x' . $id . '.' . $width, $seconds, function () use($product, $width) {
	        $image = Image::make($product->image);
	        $image->resize($width, null, function ($constraint) {
	            $constraint->aspectRatio();
	        });

	        return $image->response('jpg');
	    });

        return $value;
    }
}
