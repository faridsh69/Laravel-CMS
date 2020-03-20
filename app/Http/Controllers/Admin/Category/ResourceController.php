<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Services\BaseListController;

class ResourceController extends BaseListController
{
    public $model = 'Category';

    public function postTree()
    {
    	$tree_json = $this->request->categorytree;
        $tree = json_decode($tree_json);
    	$this->saveTree($tree, null);
    	$this->request->session()->flash('alert-success', $this->model . ' Order Updated Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function saveTree($categories, $parent)
    {
        $order = 0;
        foreach($categories as $category)
        {
            $order ++;
            $node = Category::updateOrCreate(
                ['id' => $category->id],
                [
                    'order' => $order,
                ]
            );
            if(isset($parent)){
                // $parent->appendNode($node);
            }
            if(isset($category->children)){
                // $this->saveTree($category->children, $node);
            }
        }
    }

    public function getTree()
    {
    	return $this->repository->orderBy('order', 'asc')->get();
    }
}
