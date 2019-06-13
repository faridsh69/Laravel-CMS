<?php

namespace App\Http\Controllers\Admin\Category;

use App\Base\BaseListController;

class ResourceController extends BaseListController
{
    public $model = 'Category';

    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['title'] = __($this->model . ' Manager');
        $this->meta['alert'] = '';
        $this->meta['link_name'] = __('Create New ' . $this->model);
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

        return view('admin.category.order-table', ['meta' => $this->meta, 'columns' => $columns, 'categories' => $categories]);
    }

}
