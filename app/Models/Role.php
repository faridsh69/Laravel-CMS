<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as RoleSpatie;

class Role extends RoleSpatie
{
    use SoftDeletes;

    public $columns = [
        [
            'name' => 'name',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:125',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'users',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\User',
            'property' => 'email',
            'property_key' => 'id',
            'multiple' => true,
            'table' => true,
        ],
        [
            'name' => 'permissions',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Permission',
            'property' => 'name',
            'property_key' => 'id',
            'multiple' => true,
            'table' => true,
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }

    public function saveWithRelations($data, $model = null)
    {
        $data_without_file_and_array = $this->_clearFilesAndArrays($data);
        if($model){
            $this->update($data_without_file_and_array);
        }else{
            $model = $this->create($data_without_file_and_array);
        }
        $this->_saveRelatedDataAfterCreate($data, $model);

        return $model;
    }

    private function _clearFilesAndArrays($data)
    {
        // unset file and array attributes before saving
        foreach(collect($this->getColumns())->whereIn('type', ['file', 'array', 'captcha'])->pluck('name') as $file_or_array_column)
        {
            unset($data[$file_or_array_column]);
        }

        return $data;
    }

    private function _saveRelatedDataAfterCreate($data, $model)
    {
        if(! isset($data['permissions'])){
            $data['permissions'] = [];
        }
        $permissions = \App\Models\Permission::whereIn('id', $data['permissions'])->get();
        $model->syncPermissions($permissions);

        $role_name = $model->name;
        $old_users = \App\Models\User::whereHas('roles', function($q) use($role_name){
            $q->where('name', $role_name);
        })->get();
        // remove role from old users
        foreach($old_users as $old_user){
            $old_user->removeRole($role_name);
        }

        // add role to new selected users
        if(! isset($data['users'])){
            $data['users'] = [];
        }
        $users = \App\Models\User::whereIn('id', $data['users'])->get();
        foreach($users as $user){
            $user->assignRole($model->name);
        }
    }
}
