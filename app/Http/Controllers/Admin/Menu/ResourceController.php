<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Base\BaseListController;
use App\Models\Menu;

class ResourceController extends BaseListController
{
    public $model = 'Menu';

    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['link_name'] = __(strtolower($this->model . '_create'));
        $this->meta['search'] = 1;

        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', \Str::studly($column['name'])),
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

    public function saveTree($menus, $parent)
    {
        foreach($menus as $menu)
        {
            $node = Menu::updateOrCreate(
                ['id' => $menu->id],
                ['activated' => 1]
            );
            if(isset($parent)){
                $parent->appendNode($node);
            }
            if(isset($menu->children)){
                $this->saveTree($menu->children, $node);
            }
        }
    }

    public function getTree()
    {
    	return $this->repository->orderBy('_rgt', 'asc')->get()->toTree();
    }
}
