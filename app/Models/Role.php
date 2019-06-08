<?php

namespace App\Models;

use Spatie\Permission\Models\Role as RoleSpatie;

class Role extends RoleSpatie
{
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

