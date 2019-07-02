<?php

namespace App\Http\Controllers\Admin\User;

use App\Base\BaseListController;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Auth;

class RoleController extends BaseListController
{
    public $model = 'Role';

    public function index()
    {
        $this->authorize('index', $this->model_class);
        $this->meta['title'] = __('Role Manager');
        $this->meta['alert'] = 'System roles listed here.';
        $this->meta['search'] = 1;
        $this->meta['link_route'] = route('admin.user.role.create');
        $this->meta['link_name'] = __('Create New ' . $this->model);

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

    public function create()
    {
        $this->authorize('create', $this->model_class);
        $this->meta['title'] = __('Create New ' . $this->model);

        $form = $this->form_builder->create($this->model_form, [
            'method' => 'POST',
            'url' => route('admin.user.role.store'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    public function store()
    {
        $this->authorize('create', $this->model_class);
        $form = $this->form_builder->create($this->model_form);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $permissions = Permission::whereIn('id', $data['permissions'])->get();
        $role = Role::create(['name' => $data['name']]);
        $role->syncPermissions($permissions);
        if(isset($data['users'])){
            $users = User::whereIn('id', $data['users'])->get();
            foreach($users as $user){
                $user->assignRole($role->name);
            }
        }

        activity($this->model)
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->log($this->model . ' Created');

        $this->request->session()->flash('alert-success', $this->model . ' Created Successfully!');

        return redirect()->route('admin.user.role.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->repository->findOrFail($id);
        $this->authorize('update', $model);

        $this->meta['title'] = __('Edit ' . $this->model . ' ' . $id);
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'PUT',
            'url' => route('admin.user.role.update', $model),
            'class' => 'm-form m-form--state',
            'id' => 'admin_form',
            'model' => $model,
        ]);

        return view('admin.list.form', ['form' => $form, 'meta' => $this->meta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $model = $this->repository->findOrFail($id);
        $this->authorize('update', $model);

        $form = $this->form_builder->create($this->model_form, [
            'model' => $model,
        ]);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $model->name = $data['name'];
        $model->save();
        $permissions = Permission::whereIn('id', $data['permissions'])->get();
        $model->syncPermissions($permissions);
        if(isset($data['users'])){
            $users = User::whereIn('id', $data['users'])->get();
            foreach($users as $user){
                $user->assignRole($model->name);
            }
        }

        activity($this->model)
            ->performedOn($model)
            ->causedBy(Auth::user())
            ->log($this->model . ' Updated');

        $this->request->session()->flash('alert-success', $this->model . ' Updated Successfully!');

        return redirect()->route('admin.user.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->repository->findOrFail($id);
        $this->authorize('delete', $model);

        $model->delete();
        $this->request->session()->flash('alert-success', $this->model . ' Deleted Successfully!');

        return redirect()->route('admin.' . $this->model_sm . '.list.index');
    }

    public function getDatatable()
    {
        $model = $this->repository->orderBy('id', 'desc')->get();

        return datatables()
            ->of($model)
            ->addColumn('permissions', function($model) {
                return implode(',<br>', $model->permissions()->pluck('name')->toArray());
            })
            ->addColumn('users', function($model) {
                return implode(',<br>', User::role($model->name)->select('email')->pluck('email')->toArray());
            })
            ->addColumn('show_url', function($model) {
                return route('admin.user.role.show', $model);
            })
            ->addColumn('edit_url', function($model) {
                return route('admin.user.role.edit', $model);
            })
            ->addColumn('delete_url', function($model) {
                return route('admin.user.role.destroy', $model);
            })
            ->rawColumns(['id', 'users', 'permissions'])
            ->toJson();
    }
}
