<?php

namespace App\Models;

use App\Base\BaseModel;

class Pricing extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'content'],
        ['name' => 'icon'],
        ['name' => 'activated'],
        [
            'name' => 'price',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
    ];
}
