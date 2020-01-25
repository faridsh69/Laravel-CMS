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
    public function getIndex($page_url = '')
    {
        $page = Page::where('url', $page_url)->active()->first();
        abort_if(! $page, 404);
        if(config('app.name') === 'map'){
            return view('front.test.map.offline-city');
        }

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

        return redirect()->route('front.page.index', '');
    }
}
