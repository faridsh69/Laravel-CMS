<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Block;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class PageController extends Controller
{
    public function getIndex($page_url = '/')
    {
        // if($page_url === 'domain'){
        //     exec("php -q /home/faridsh/domains/subdomain/add_subdomain.php uxu");

        //     return 1;
        // }

        $page = Page::where('url', $page_url)->active()->first();
        abort_if(!$page, 404);

        $meta = [
            'title' => $page->title,
            'description' => $page->meta_description,
            'keywords' => $page->keywords,
            'image' => $page->meta_image,
            'google_index' => $page->google_index,
            'canonical_url' => $page->canonical_url ? $page->canonical_url : url()->current(),
        ];

        $static_types = Block::getStaticTypes();
        $blocks = Block::active()
            ->where(function($query) use ($page, $static_types) {
                $query->where('page_id', $page->id)
                    ->orWhereIn('widget_type', $static_types);
            })
            ->orderBy('order', 'asc')
            ->get();

        return view('front.page.index' , ['blocks' => $blocks, 'page' => $page, 'meta' => $meta]);
    }

    public function getVideo()
    {
        $meta = [
            'title' => 'Video',
            'description' => '',
            'keywords' => '',
            'image' => '',
            'google_index' => 1,
            'canonical_url' => url()->current(),
        ];
        return view('front.page.video', ['meta' => $meta]);
    }
    
    public function postSubscribe(Request $request)
    {
        $date = Carbon::now()->format('Y/d/m');
        $time = Carbon::now()->format('H:i');
        $email = $request->input('email');

        if( !User::where('email', $email)->first() ){
            User::create([
                'first_name' => $date,
                'last_name' => $time,
                'email' => $email,
                'status' => 2,
                'password' => 'farid123SS!@#%#@$FDSAddd' . rand(200,1000),
            ]);
        }

        $request->session()->flash('alert-success', 'Congratulation, you will go solar soon!');

        return redirect()->route('front.page.index', '/');
    }
}
