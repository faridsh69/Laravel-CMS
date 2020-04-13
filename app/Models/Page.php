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
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];

    public function blocks()
    {
        return $this->hasMany(Block::class, 'page_id', 'id');
    }

    public function related_pages()
    {
        return $this->belongsToMany(Page::class, 'related_pages', 'page_id', 'related_page_id');
    }
}
