<?php

namespace App\Models;

use App\Services\BaseModel;

class Field extends BaseModel
{
    // title, type, required, activated, options, order
    public $columns = [
        [
            'name' => 'name',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:191',
            'help' => 'Name of field.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'form_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Select Type of fields',
            'form_type' => 'enum',
            'form_enum_class' => 'FieldType',
            'table' => true,
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
            'name' => 'options',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'Seperate the options with | between them',
            'form_type' => '',
            'table' => false,
        ],
        ['name' => 'language'],
        ['name' => 'activated'],
    ];

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_form', 'form_id', 'field_id');
    }
}
