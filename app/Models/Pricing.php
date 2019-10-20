<?php

namespace App\Models;

use App\Base\BaseModel;

class Pricing extends BaseModel
{
    // title, price, content, icon, activated
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Title of pricing plan.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'price',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => 'What is this pricing props?',
            'form_type' => 'ckeditor',
            'table' => true,
        ],
        [
            'name' => 'icon',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Icon of pricing plan.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => '', // switch-m
            'table' => false,
        ],
    ];
}
