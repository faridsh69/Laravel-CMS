<?php

namespace App\Models;

use Spatie\Permission\Models\Role as RoleSpatie;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
