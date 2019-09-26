<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Shop;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Str;

class DashboardController extends Controller
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

        $answers = Answer::where('shop_id', $shop->id)->get();

        return view('shop.dashboard-comment', ['meta' => $meta, 'shop' => $shop, 'answers' => $answers]);
    }

    public function getLogin($shop_subdomain)
    {        
        return view('auth.login');
    }

    public function index($shop_subdomain)
    {
        \App::setLocale('fa');
        $shop = Shop::where('url', $shop_subdomain)->first();
        abort_if(! $shop, 404);

        $categories = Category::where('shop_id', $shop->id)
            ->active()
            ->orderBy('order', 'asc')
            ->get();

        $meta = [
            'title' => 'Dashboard ' . $shop->title_fa,
            'description' => 'Dashboard ' . $shop->meta_description,
            'keywords' => $shop->keywords,
            'image' => $shop->logo,
            'google_index' => 0,
            'canonical_url' => url()->current(),
        ];

        return view('shop.dashboard', [
            'shop' => $shop,
            'meta' => $meta,
            'categories' => $categories,
            'shop_subdomain' => $shop_subdomain,
            'is_restaurant_close' => 0,
            'under_construction' => 0, 
        ]);
    }

    public function showItem($shop_subdomain, $id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        return json_encode($product);
    }

    public function itemStore($shop_subdomain, Request $request, Product $product)
    {
        $shop = Shop::where('url', $shop_subdomain)->first();
        $last_product = Product::where('category_id', $request->input('folder_id'))
            ->where('shop_id', $shop->id)
            ->orderBy('order', 'desc')
            ->first();
        $product->title = $request->input('name');
        $product->category_id = $request->input('folder_id');
        $product->shop_id = $shop->id;
        if($last_product){
            $product->order = $last_product->order;
        } else {
            $product->order = 1;
        }
        $product->url = Str::slug($product->title);
        $product->save();

        $contents = "$('#" . $request->folder_id . "').children('.items').find('.items_list').append(\"<li class='item _' data-url='" . route('shop.dashboard.showItem', $product->id) . "' data-galleryaddr='" . $product->gallery_address . "' id='item$product->id'><img class='li_item_image hidden' src=''><div class='name'><span class='inner_item_name'>" . $product->title . "</span><span class='count'></span></div><div class='over'></div></li>\");";
        $contents .= "$('.add_item_input').val('');";

        $response  = Response::make($contents, 200);
        $response->header('Content-Type', 'application/javascript');

        return $response;
    }

    public function batchStore($shop_subdomain, Request $request, Category $category)
    {
        $shop = Shop::where('url', $shop_subdomain)->first();
        $last_category = Category::where('shop_id', $shop->id)
            ->orderBy('order', 'desc')
            ->first();
        $category->title = $request->input('name');
        if($last_category){
            $category->order = $last_category->order;
        }
        else{
            $category->order = 1;
        }
        $category->url = Str::slug($category->title);
        $category->save();

        $contents  ="$('.add_card_sw').before(\"<div class='swiper-slide'><ul class='card swiper-no-swiping' id='".$category->id."'><div class='cardheader ui-sortable-handle'><div class='leftsec'><div class='card_name'>".$category->title."</div> <div class='batchicon edit_card' data-id='batch_$category->id'></div> <div class='batchicon card_archive' data-id='$category->id'></div></div><div class='rightsec'><div class='card_icon' data-iconname='default'><img height='100%' width='100%' src='".asset('images/icons/restaurant_pack/default-icon.png')."' /></div><label class='card_select'><input class='select_input' type='checkbox' id='batch_$category->id'></label></div></div><div class='items'><ul class='items_list ui-sortable'></ul><form class='add_item_form' method='post' data-action='".route('shop.dashboard.item.store', ['shop_subdomain' => $shop_subdomain])."' name='addItemForm'><input type='hidden' name='_token' value='".csrf_token()."'><input type='hidden' name='_method' value='post'><input type='text' class='add_item add_item_input' name='name' placeholder='Add New Item ...' /><input type='hidden' name='folder_id' id='folder_id' value=".$category->id."><input type='submit' value='Add Item' class='add_item_btn'></form></div></ul></div>\");";
        $contents .="$('.add_card_btn').hide();";
        $contents .="$('.add_card_input').val('');";
        $contents .="ItemsdragDrop();enableCreateBatchButton();";

        $response  = Response::make($contents, 200);
        $response->header('Content-Type', 'application/javascript');
        
        return $response;
    }

    public function deleteMainPic($shop_subdomain, Request $request)
    {
        $image = Image::where('imageable_id', $request->item_id)->first();
        if($image){
            $image->delete();
        }
        return 'success';
    }

    public function removeItemGalleryFile($shop_subdomain, Request $request)
    {
        $image = Image::where('id', $request->image_id)->first();
        if($image){
            $image->delete();
        }

        return 'success';
    }

    public function uploadGallery($shop_subdomain, $product_id, Request $request)
    {
        $product = Product::where('id', $product_id)->first();
        $image_service = new ImageService;
        $uploaded_image = $request->file('gallery');

        $razie_array_gallery_for_front = [];
        foreach($uploaded_image as $gallery_image){
            $image_service->save($gallery_image, $product);

            $gallery = json_decode($product->gallery);
            $razie_array_gallery_for_front[] = json_encode([
                'temporary_id' => $request->temporary_id,
                'file' => $gallery[count($gallery) - 1]->file,
                'pure_filename' => '456678',
                'error' => 'none',
                'type' => 'image',
            ]);
        }

        return json_encode($razie_array_gallery_for_front);
    }

    public function changeCardSortInBatchPage($shop_subdomain, Request $request)
    {
        for($i = 0; $i< count($request->cards); $i++) {
            Category::where('id', $request->cards[$i])->update(['order' => $request->sorts[$i]]);
        }
    }

    public function test()
    {
        return 1;
    }

    public function updateItem($shop_subdomain, Request $request)
    {
        $product = Product::find($request->id);

        $input = $request->only('name', 'short_description', 'description', 'discount', 'tag', 'main_image', 'type');
        isset($request->price) ? $input['price'] = $request->price : $input['price'] = null;

        // $input['main_image'] = $this->checkMainPicExist($request, $item);
        $product->title = $input['name'];
        $product->price = $input['price'];
        $product->content = $input['short_description'];

        // $product->image = $input['main_image'];
        $product->update();
        // $this->checkEmptyGalleryOrNotToSave($request, $item);
        return 1;
    }

    public function hideItem($shop_subdomain, Request $request)
    {
        $product = Product::find($request->id);
        $product->activated = !$product->activated;
        $product->save();

        return json_encode(!$product->activated);
    }


    public function changeItemSort($shop_subdomain, Request $request)
    {
        $product = Product::find($request->main_item_id);
        $product->update(['category_id' => $request->folder_id]);

        for ($i = 0; $i < count($request->items); $i++) {
            Product::where('category_id', $request->folder_id)
                ->where('id', $request->items[$i])
                ->update(['order' => $request->sorts[$i]]);
        }
    }

    public function changeStatus($shop_subdomain, Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $product->activated = false;
        $product->save();
    }

    public function updateCard($shop_subdomain, Request $request, $id)
    {
        $category = Category::find($id);
        $input = $request->only(['name', 'image']);
        $category->title = $input['name'];
        $category->image = 'http://www.mmenew.ir/cdn/images/icons/restaurant_pack/' . $input['image'];
        $category->update();
    }

    public function changeBatchStatus($shop_subdomain, Request $request)
    {
        $category = Category::find($request->id);
        $category->activated = false;
        $category->save();
    }

    public function menumakerIndex()
    {
        return redirect()->back();
    }

    public function settingsIndex($shop_subdomain)
    {
        \App::setLocale('fa');
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

        return view('shop.dashboard-settings', [
            'shop' => $shop,
            'meta' => $meta,
            'shop_subdomain' => $shop_subdomain,
            'is_restaurant_close' => 0,
            'under_construction' => 0, 
        ]);

        return redirect()->back();
    }

    public function changeSetting($shop_subdomain, Request $request)
    {
        $shop = Shop::where('url', $shop_subdomain)->first();
        abort_if(! $shop, 404);
        $shop->title = $request->input('title');
        $shop->title_fa = $request->input('title_fa');
        $shop->category_background_color = $request->input('category_background_color');
        $shop->products_background_color = $request->input('products_background_color');
        $shop->category_icon_color = $request->input('category_icon_color');

        if(null === $request->input('activated')){
            $shop->activated = 1;
        }else{
            $shop->activated = 0;
        }
        $shop->save();

        return redirect()->back();
    }

    public function releaseTable()
    {
        return abort(403);
    }

    public function ordersInfo()
    {
        return abort(403);
    }

    public function ordersHistory()
    {
        return abort(403);
    }
}
