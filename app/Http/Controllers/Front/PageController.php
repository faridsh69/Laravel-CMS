<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex($page_url = '', \Kris\LaravelFormBuilder\FormBuilder $form_builder)
    {
        if(config('app.name') === 'map'){
            return view('front.test.map.offline-city');
        }

        $page = Page::where('url', $page_url)->active()->first();
        abort_if(! $page, 404);

        // $meta = [
        //     'title' => config('setting-general.default_meta_title') . ' | ' . $page->title,
        //     'description' => $page->meta_description ?: config('setting-general.default_meta_description'),
        //     'keywords' => $page->keywords,
        //     'image' => $page->image ? asset($page->image) : asset(config('setting-general.default_meta_image')),
        //     'google_index' => config('setting-general.google_index') ?: $page->google_index,
        //     'canonical_url' => $page->canonical_url ?: url()->current(),
        // ];

        // $blocks = Block::getPageBlocks($page->id);

        return view('front.page', ['page' => $page]);
    }

    public function postSubscribe(Request $request)
    {
        $date = Carbon::now()->format('Y/d/m');
        $time = Carbon::now()->format('H:i');
        $phone = $request->input('phone');
        $message = $request->input('message');

        if(! User::where('phone', $phone)->first()){
            User::create([
                'first_name' => $date,
                'last_name' => $time,
                'phone' => $phone,
                'bio' => $message,
                'status' => 0,
                'password' => 'Password-' . rand(100, 999),
            ]);
        }

        $request->session()->flash('alert-success', 'Congratulation, We Will Contact You Soon!');

        return redirect()->route('front.page.index', '/');
    }
}
