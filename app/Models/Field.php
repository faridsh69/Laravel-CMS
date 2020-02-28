<?php

namespace App\Models;

use App\Services\BaseModel;

class Field extends BaseModel
{
    // title, type, required, activated, options, order
    public $columns = [
        [
            'name' => 'type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Select Type of fields',
            'form_type' => 'enum',
            'form_enum_class' => 'FieldType',
            'table' => true,
        ],
        ['name' => 'name'],
        ['name' => 'activated'],
        ['name' => 'language'],
        ['name' => 'order'],
        [
            'name' => 'help',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Help text under the input',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'rule',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'Forexample: required|numberic|min:4',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'options',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'Seperate the options with | between them',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'required',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'switch-bootstrap-m', // switch-m
            'table' => true,
        ],
    ];

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_form', 'form_id', 'field_id');
    }
}
