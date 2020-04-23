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
            'property' => 'phone',
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


        // if($model_name === 'Role')
        // {
        //     // remove role from old users in update mode
        //     if($model){
        //         $role_name = $model->name;
        //         $old_users = \App\Models\User::whereHas('roles', function($q) use($role_name){
        //             $q->where('name', $role_name);
        //         })->get();
        //         foreach($old_users as $old_user){
        //             $old_user->removeRole($role_name);
        //         }
        //     }
        // }

        // // User
        // if($model_name === 'User'){
        //     unset($data['password_confirmation']);
        //     if(isset($data['password'])) {
        //         $data['password'] = \Hash::make($data['password']);
        //     }
        //     else{
        //         if($model){ // update mode
        //             $data['password'] = $model->password;
        //              if($model->email !== $data['email']){
        //                 $model->activation_code = null;
        //                 $model->email_verified_at = null;
        //             }

        //             if($model->phone !== $data['phone']){
        //                 $model->activation_code = null;
        //                 $model->phone_verified_at = null;
        //             }
        //         }
        //         else{ // create mode
        //             $data['password'] = \Hash::make('123456');
        //         }
        //     }
        // }








     // Role
        // if($model_name === 'Role')
        // {
        //     if(! isset($data['permissions'])){
        //         $data['permissions'] = [];
        //     }
        //     $permissions = \App\Models\Permission::whereIn('id', $data['permissions'])->get();
        //     $model->syncPermissions($permissions);

        //     if(! isset($data['users'])){
        //         $data['users'] = [];
        //     }

        //     // add role to new selected users
        //     $users = \App\Models\User::whereIn('id', $data['users'])->get();
        //     foreach($users as $user){
        //         $user->assignRole($model->name);
        //     }
        // }

        // Comment
        // if($model_name === 'Comment'){
        //     $model->commented_id = Auth::id();
        //     $model->commented_type = 'App\Models\User';
        //     $model->commentable_type = 'App\Models\Blog';
        //     $model->update();
        //     $model->approve();
        // }

    // public function _saveRelatedDataAfterCreate($model_name, $data, $model)
    // {
    //     // files column
    //     foreach(collect($this->model_columns)->where('type', 'file')->pluck('name') as $file_column) {
    //         $file = $data[$file_column];
    //         if($file){
    //             $file_service = new \App\Services\FileService();
    //             $file_service->save($file, $model, $file_column);
    //         }
    //     }

    //     // array columns
    //     // tag, related_blogs, related_products, pages, related_pages, rol->users, permissions, form->fields
    //     foreach(collect($this->model_columns)->where('type', 'array')->pluck('name') as $array_column) {
    //         if(array_search($array_column, ['users', 'permissions'], true) === false){
    //             $model->{$array_column}()->sync($data[$array_column], true);
    //         }
    //     }

    //     // Role
    //     if($model_name === 'Role')
    //     {
    //         if(! isset($data['permissions'])){
    //             $data['permissions'] = [];
    //         }
    //         $permissions = \App\Models\Permission::whereIn('id', $data['permissions'])->get();
    //         $model->syncPermissions($permissions);

    //         if(! isset($data['users'])){
    //             $data['users'] = [];
    //         }

    //         // add role to new selected users
    //         $users = \App\Models\User::whereIn('id', $data['users'])->get();
    //         foreach($users as $user){
    //             $user->assignRole($model->name);
    //         }
    //     }

    //     // Comment
    //     // if($model_name === 'Comment'){
    //     //     $model->commented_id = Auth::id();
    //     //     $model->commented_type = 'App\Models\User';
    //     //     $model->commentable_type = 'App\Models\Blog';
    //     //     $model->update();
    //     //     $model->approve();
    //     // }
    // }
    
}
