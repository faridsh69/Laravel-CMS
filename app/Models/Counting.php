<?php

namespace App\Models;

use App\Services\BaseModel;

class Counting extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'activated'],
        ['name' => 'icon'],
        [
            'name' => 'number',
            'type' => 'integer',
            'database' => '',
            'rule' => 'numeric',
            'help' => 'Count of times that goal recieved.',
            'form_type' => '',
            'table' => true,
        ],
        ['name' => 'language'],
    ];
}
