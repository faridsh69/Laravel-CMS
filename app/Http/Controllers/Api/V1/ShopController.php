<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use App\Services\BaseApiController;

class ShopController extends BaseApiController
{
    public $model = 'Shop';

    public function show($shop_id)
    {
        $shop = $this->repository->where('id', $shop_id)->first();
        if(! $shop){
            $this->response['status'] = 404;
            $this->response['message'] = $this->message_not_found;
            return response()->json($this->response);
        }
        // $this->authorize('view', $shop);

        $categories = Category::where('shop_id', $shop_id)
            ->active()
            ->orderBy('order', 'asc')
            ->get();

        $categories_list = [];
        foreach($categories as $category){
            $products_list = [];
            $products = $category->products()
                ->get();

            foreach($products as $product){
                $products_list[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'content' => $product->content,
                    'price' => $product->price,
                    'thumbnail' => $product->image_thumbnail,
                    'gallery' => $product->gallery,
                    'activated' => $product->activated,
                ];
            }
            $categories_list[] =  [
                'id' => $category->id,
                'title' => $category->title,
                'image' => $category->image,
                'activated' => $category->activated,
                'products' => $products_list,
            ];
        }

        $shop_data = [
            'shop' => [
                'title' => $shop->title,
                'title_fa' => $shop->title_fa,
                'logo' => $shop->logo,
                'activated' => $shop->activated,
                'support_phone' => '09120338850',
            ],
            'categories' => $categories_list,
        ];

        $this->response['message'] = $this->message_show;
        $this->response['data'] = $shop_data;

        return response()->json($this->response);
    }

    public function index(){abort(404); }

    public function store(){abort(404); }

    public function destroy($id){abort(404); }
}
