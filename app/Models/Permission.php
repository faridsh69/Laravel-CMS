<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as PermissionSpatie;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends PermissionSpatie
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
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
