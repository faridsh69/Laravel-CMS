<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\SiteNotification;
use App\Notifications\UserRegistered;

class PageController extends Controller
{
    public function getIndex($page_url = '', UserRegistered $not)
    {
        // $notification = \App\Models\Notification::orderBy('id', 'desc')->first();
        // dd( json_decode($notification->data)->data );
        // die();
        $user = User::find(1);
        // $not->setData('123xx');
        $user->notify($not);
        dd($not);

        if(config('app.name') === 'map'){
            return view('front.test.map.offline-city');
        }

        $page = Page::where('url', $page_url)->active()->first();
        abort_if(! $page, 404);

        if(config('app.name') === 'map'){
            return view('front.test.map.offline-city');
            // $ip = $_SERVER['REMOTE_ADDR'];
            // try{
            //     if($ip === '127.0.0.1'){
            //         return view('front.test.map.offline-city');
            //     }else{
            //         $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
            //         if($details->country === 'IR'){

            //         }
            //     }
            // }
            // catch(Exception $e){}
        }

        $meta = [
            'title' => config('0-general.default_meta_title') . ' | ' . $page->title,
            'description' => $page->meta_description ?: config('0-general.default_meta_description'),
            'keywords' => $page->keywords,
            'image' => $page->image ? asset($page->image) : asset(config('0-general.default_meta_image')),
            'google_index' => config('0-general.google_index') ?: $page->google_index,
            'canonical_url' => $page->canonical_url ?: url()->current(),
        ];

        $blocks = Block::getPageBlocks($page->id);

        return view('front.page', ['blocks' => $blocks, 'page' => $page, 'meta' => $meta]);
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
