<?php

namespace App\Models;

use App\Services\BaseModel;

class Form extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'activated'],
        ['name' => 'language'],
        [
            'name' => 'fields',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => 'Specify the fields of form.',
            'form_type' => 'entity',
            'class' => 'App\Models\Field',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
        [
            'name' => 'block_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'relation' => 'blocks',
            'rule' => 'nullable|exists:blocks,id',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Block',
            'property' => 'type',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'g-recaptcha-response',
            'type' => 'captcha',
            'database' => 'none',
            'rule' => 'required|captcha',
            'help' => '',
            'form_type' => 'captcha',
            'table' => false,
        ],
        // ['name' => 'authentication'], // always need authentication
        // ['name' => 'captcha'], // its a field
    ];

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_form', 'form_id', 'field_id')
            ->orderBy('order', 'asc');
    }
}
