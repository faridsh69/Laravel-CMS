<?php

namespace App\Models;

use App\Base\BaseModel;

class Answer extends BaseModel
{
    public $columns = [
        ['name' => 'description'],
        [
            'name' => 'user_id',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'table' => false,
        ],
        [
            'name' => 'field_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'fields',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Field',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'form_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'forms',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Form',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
    ];

    public function field()
    {
        return $this->belongsTo('App\Models\Field', 'field_id', 'id');
    }

    public function form()
    {
        return $this->belongsTo('App\Models\Form', 'form_id', 'id');
    }
}
