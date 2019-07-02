<?php

namespace App\Http\Controllers\Admin\User;

use App\Base\BaseListController;

class PermissionController extends BaseListController
{
    public $model = 'Permission';

    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['title'] = __('Permission Manager');
        $this->meta['alert'] = 'System permissions listed here.';
        $this->meta['link_name'] = 'Manage Roles';
        $this->meta['link_route'] = '/user/role';
        $this->meta['search'] = 1;

        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', \Str::studly($column['name'])),
            ];
        }

        return view('admin.list.special-table', ['meta' => $this->meta, 'columns' => $columns, 'model_sm' => $this->model_sm]);
    }

    public function getDatatable()
    {
        $model = $this->repository->orderBy('id', 'desc')->get();

        return datatables()
            ->of($model)
            ->rawColumns(['id', 'content'])
            ->toJson();
    }

    public function create(){abort(404); }

    public function show($id){abort(404); }

    public function edit($id){abort(404); }

    public function update($id){abort(404); }

    public function destroy($id){abort(404); }
}
