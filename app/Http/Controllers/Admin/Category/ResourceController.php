<?php

namespace App\Http\Controllers\Admin\Category;

use App\Base\BaseListController;

class ResourceController extends BaseListController
{
    public $model = 'Category';

    // public function index()
    // {
    //     $shops = $this->repository->get()->toTree();
        
    //     return view('shop', compact('shops'));
    // }
}
