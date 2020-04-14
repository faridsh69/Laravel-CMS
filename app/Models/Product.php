<?php

namespace App\Models;

use App\Services\BaseModel;

class Product extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'category_id'],
        ['name' => 'content'],
        ['name' => 'image'],
        ['name' => 'video'],
        ['name' => 'activated'],
        ['name' => 'price',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'help' => '',
            'form_type' => 'number',
            'table' => true,
        ],
        ['name' => 'discount_price',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'inventory',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        ['name' => 'order'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];
}
