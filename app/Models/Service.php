<?php

namespace App\Models;

use App\Base\BaseModel;

class Service extends BaseModel
{
    // title, description, image, activated
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Title of service.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'description',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => 'Service description.',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Service image.',
            'form_type' => 'image',
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
