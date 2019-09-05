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
use Illuminate\Http\UploadedFile;

class ImageController extends Controller
{
    public function getProduct($shop_url, $id, $width)
    {
        return json_encode(\App\Models\Image::get()->toArray());
        return 1;
        $products = \App\Models\Product::where('id', '>', 3399)->get();

        foreach($products as $product)
        {
            if(!$product->image) {continue;}
            if($product->id < 3399) {continue;}
            $image_service = new \App\Services\ImageService; 
            foreach(explode("|", $product->image) as $gallery_image){
                $gallery_image = str_replace("/","", $gallery_image);
                if( strpos($gallery_image, "mp4") !== false){
                    continue;
                }
                if($product->id > 3000 && $product->id < 4000) {
                    $url = 'cdn/images/itemimages/' . fmod($product->id, 1000) . '/' . $gallery_image;
                }else{
                    $url = 'cdn/images/itemimages/' . fmod($product->id, 1000) . '/large_' . $gallery_image;
                }
                $file =  new UploadedFile($url, $gallery_image);
                $image_service->save($file, $product);
            }
        }
    }
    public function getProduct2($shop_url, $id, $width)
    {
        return 1;
        $products = \App\Models\Product::get();

        foreach($products as $product)
        {
            if(!$product->image) {continue;}
            if($product->id < 3233) {continue;}
            if($product->id === 3385) {continue;}
            if($product->id > 1000 && $product->id < 2000)
            {
                $url = 'cdn/images/itemimages/' . ($product->id - 1000) . '/large_' . $product->image;
            }
            elseif($product->id > 2000 && $product->id < 3000)
            {
                $url = 'cdn/images/itemimages/' . ($product->id - 2000) . '/large_' . $product->image;
            }
            elseif($product->id > 3000 && $product->id < 4000)
            {
                $url = 'cdn/images/itemimages/' . ($product->id - 3000) . '/large_' . $product->image;
            }
            elseif($product->id > 4000 && $product->id < 5000)
            {
                $url = 'cdn/images/itemimages/' . ($product->id - 4000) . '/large_' . $product->image;
            }
            elseif($product->id > 5000 && $product->id < 6000)
            {
                $url = 'cdn/images/itemimages/' . ($product->id - 5000) . '/large_' . $product->image;
            }

            $image = Image::make($url);
            $image->save('cdn/images/product/' . $product->id . '-main.jpg');
            
            $image->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save('cdn/images/product/' . $product->id . '-thumbnail.jpg');
        }
    }
}
