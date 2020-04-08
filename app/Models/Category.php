<?php

namespace App\Models;

use App\Services\BaseModel;

class Category extends BaseModel
{
    public $columns = [
        ['name' => 'type'],
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'image'],
        ['name' => 'activated'],
        ['name' => 'google_index'],
        ['name' => 'canonical_url'],
        ['name' => 'order'],
        [
            'name' => 'parent_id',
            'type' => 'unsignedBigInteger',
            'database' => 'none',
            'relation' => 'categories',
            'rule' => 'nullable|exists:categories,id',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        ['name' => 'language'],
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
