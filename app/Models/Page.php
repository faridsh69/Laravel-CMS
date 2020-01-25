<?php

namespace App\Models;

use App\Services\BaseModel;

class Page extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'content'],
        ['name' => 'keywords'],
        ['name' => 'image'],
        ['name' => 'activated'],
        ['name' => 'google_index'],
        ['name' => 'canonical_url'],
        [
            'name' => 'view_code_url',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'It will used for rendering blade file. for example for products page you can add blade and use it. "front.components.products" ',
            'form_type' => '',
            'table' => false,
        ],
    ];

    public function blocks()
    {
        return $this->hasMany('App\Models\Block', 'page_id', 'id');
    }
}
