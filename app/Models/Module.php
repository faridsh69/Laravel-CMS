<?php

namespace App\Models;

use App\Services\BaseModel;

class Module extends BaseModel
{
	// title, description, content, icon, +image, url, +block_type, parent_id, order, full_name, product_id, activated, language

    public $columns = [
        ['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'activated'],
        [
            'name' => 'fields',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Field',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
    ];

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_form', 'form_id', 'field_id');
    }
}
