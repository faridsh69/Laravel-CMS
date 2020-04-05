<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Services\BaseListController;

class ResourceController extends BaseListController
{
    public $model = 'Activity';

    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['title'] = __('activity_manager');
        $this->meta['link_name'] = __('dashboard');
        $this->meta['link_route'] = route('admin.dashboard.list.index');
        $this->meta['search'] = 1;

        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', \Str::studly($column['name'])),
            ];
        }

        return view('admin.list.index', ['meta' => $this->meta, 'columns' => $columns, 'model_sm' => $this->model_sm]);
    }

    public function create(){return $this->getRedirect(); }

    public function edit($id){return $this->getRedirect(); }

    public function update($id){return $this->getRedirect(); }

    // public function getRedirect()
    // {
    //     return redirect()->route('admin.activity.list.index');
    // }
}
