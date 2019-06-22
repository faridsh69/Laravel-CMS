<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Block;

class PageController extends Controller
{
    public function index($page_url = '/')
    {
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
            ->orderBy('_lft', 'asc')
            ->get();

        return view('front.page.index' , ['blocks' => $blocks, 'page' => $page, 'meta' => $meta]);
    }
}
