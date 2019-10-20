<?php

namespace App\Models;

use App\Base\BaseModel;

class Feature extends BaseModel
{
    // title, description, icon, activated
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => 'Title of the company feature.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'icon',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Icon of company feature.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'description',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'textarea',
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
