<?php

namespace App\Http\Controllers\Admin\Category;

use App\Base\BaseListController;
use App\Models\Category;

class ResourceController extends BaseListController
{
    public $model = 'Category';

    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['title'] = __($this->model . ' Manager');
        $this->meta['alert'] = '';
        $this->meta['link_name'] = __('Create New ' . $this->model);
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.create');
        $this->meta['search'] = 1;

        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s','$1 $2', \Str::studly($column['name']))
            ];
        }
        $categories = $this->repository->get()->toTree();

        return view('admin.list.tree-table', ['meta' => $this->meta, 'columns' => $columns, 'categories' => $categories]);
    }

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
        foreach($categories as $category)
        {
            $node = Category::updateOrCreate(
                ['id' => $category->id], 
                ['activated' => 1]
            );
            if(isset($parent)){
                $parent->appendNode($node);
            }
            if(isset($category->children)){
                $this->saveTree($category->children, $node);
            }
        }
    }

    public function getTree()
    {
    	$categories = $this->repository->orderBy('_rgt', 'asc')->get()->toTree();

    	return $categories;
    }
}
