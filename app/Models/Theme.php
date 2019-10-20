<?php

namespace App\Models;

use App\Base\BaseModel;

class Theme extends BaseModel
{
	public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:191',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
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
