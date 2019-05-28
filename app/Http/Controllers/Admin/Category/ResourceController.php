<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Base\ListController;

class ResourceController extends ListController
{
    public $model = 'Category';

    // public function index()
    // {
    //     $shops = $this->repository->get()->toTree();
        
    //     return view('shop', compact('shops'));
    // }
}
