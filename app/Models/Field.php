<?php

namespace App\Models;

use App\Base\BaseModel;

class Field extends BaseModel
{    
    // title, type, required, activated, options, order
    public $columns = [
        ['name' => 'title'],
        ['name' => 'activated'],
        [
            'name' => 'type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => '',
            'form_type' => 'enum',
            'form_enum_class' => 'FieldType',
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
        [
            'name' => 'order',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'nullable',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'options',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'devide all options with | character',
            'form_type' => '',
        ],
    ];

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_form', 'form_id', 'field_id');
    }
}
