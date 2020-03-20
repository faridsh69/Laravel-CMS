<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Factor;
use App\Models\Product;
use Auth;

class FactorService extends BaseService
{
    public function _sendNotifications()
    {
        // todo
        // send sms to maghaze dar o moshtari
    }

    public static function _decreaseInventory()
    {
        try {
            $factor = Factor::currentFactor()->first();

            foreach($factor->products as $product)
            {
                $product->inventory -= $product->pivot->count;
            }
        }
        catch(Exception $e) {
          echo 'Message: ' . $e->getMessage();
        }
    }

	public static function _getProductsVue($filters = false)
    {
        $products = Product::active()
            ->select('id', 'title', 'price', 'discount_price')
            ->orderBy('id', 'desc')
            ->with('images')
            ->get();

        if($filters)
        {
            if($filters['category'])
            {
                $category = Category::where('title', $filters['category'])->first();
                if($category)
                {
                    $category_id = $category->id;
                    $products = $products->where('category_id', $category_id);
                }
            }
            // if($filters['title'])
            // {
            //     $products = $products->where('title', 'like','%'. $filters['title'] .'%');
            // }
        }
        $vue_products = [];
        foreach($products as $product)
        {
            $vue_products[] = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'discount_price' => $product->discount_price,
                'image_url' => $product->asset_image,
            ];
        }
        return $vue_products;
    }

    public static function _getUserBasketVueProducts()
    {
        $basket = self::_getUserBasket();
        $vue_basket = [];
        foreach($basket->products as $basket_product)
        {
            $vue_basket[] = [
                'id' => $basket_product->id,
                'title' => $basket_product->title,
                'features' => [],
                'price' =>  $basket_product->price,
                'discount_price' =>  $basket_product->discount_price,
                'count' =>  $basket_product->pivot->count,
                'image_url' => $basket_product->asset_image,
            ];
        }
        return $vue_basket;
    }

    public static function _getUserBasketCountProducts()
    {
        $basket = self::_getUserBasket();
        return $basket->products->count();
    }

    public static function _getTotalPrice()
    {
        $basket = self::_getUserBasket();
        $basket_product = $basket->products()->get();
        $total_price = 0;
        foreach($basket_product as $item)
        {
            if($item->discount_price){
                $total_price += $item->pivot->count * $item->discount_price;
            }else{
                $total_price += $item->pivot->count * $item->price;
            }
        }
        return $total_price;
    }

    public static function _addToBasket($product_id, $add)
    {
        $basket = self::_getUserBasket();
        $basket_product = $basket->products()->where('product_id', $product_id);
            // ->where('inventory', '>', 0);
        if($basket_product->count() >= 1){
            $count = $basket_product->first()->pivot->count + $add;
            if($count === 0 && $add === -1){
                $basket->products()->detach([$product_id]);
            }else{
                $basket->products()->syncWithoutDetaching([$product_id => ['count' => $count]], false);
            }
        }
        else{
            $basket->products()->sync([$product_id => ['count' => 1]], false);
        }
    }

    public static function _changeCountBasket($product_id, $count)
    {
        $basket = self::_getUserBasket();
        if($count === 0){
            $basket->products()->detach([$product_id]);
        }else{
            $basket->products()->syncWithoutDetaching([$product_id => ['count' => $count]]);
        }
    }

    public static function _createBasket()
    {
        $basket = new Basket();
        $basket->activated = true;
        $basket->user_id = Auth::id();
        $basket->save();

        setcookie('basket_id', $basket->id, time() + (86400 * 3), '/'); // 86400 = 1 day
        session(['basket_id' => $basket->id]);

        return $basket;
    }

    public static function _getUserBasket()
    {
        $basket_id = session('basket_id', null);
        session(['basket_id' => null]);
        if($basket_id)
        {
            $basket = Basket::where('id', $basket_id)
                ->orderBy('id', 'desc')
                ->first();
            if($basket){
                return $basket;
            }
        }

        if(\Auth::id())
        {
            if(isset($_COOKIE['basket_id']))
            {
                $basket_id = $_COOKIE['basket_id'];
                $basket = Basket::where('id', $basket_id)
                    ->whereNull('user_id')
                    ->orderBy('id', 'desc')
                    ->first();
                if($basket){
                    $basket->user_id = \Auth::id();
                    $basket->save();
                    setcookie('basket_id', '', time() - 3600);

                    return $basket;
                }
            }
            $basket = Basket::where('user_id', \Auth::id())
                ->orderBy('id', 'desc')
                ->first();
            if($basket){
                return $basket;
            }
        }
        else
        {
            if(isset($_COOKIE['basket_id']))
            {
                $basket_id = $_COOKIE['basket_id'];
                $basket = Basket::where('id', $basket_id)
                    ->whereNull('user_id')
                    ->orderBy('id', 'desc')
                    ->first();
                if($basket){
                    return $basket;
                }
            }
        }

        $basket = self::_createBasket();
        if($basket)
            return $basket;

        return 'مشکلی در سیستم وجود دارد';
    }
}
