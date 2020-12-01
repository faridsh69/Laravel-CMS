<?php

namespace App\Http\Controllers\Front\User;

use App\Models\Block;
use App\Services\BaseFrontController;
use Str;

class FrontController extends BaseFrontController
{
    public $modelNameSlug = 'user';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->modelRepository->active()
            ->orderBy('updated_at', 'desc')
            ->paginate(config('setting-general.pagination_number'));

        $CategoryAndTags = [
        	'categories' => [],
        	'tags' => [],
        ];
        return view('front.list.index', [
            'meta' => $this->meta, 
            'list' => $list, 
            'categories' => $CategoryAndTags['categories'], 
            'tags' => $CategoryAndTags['tags']
        ]);
    }

}
