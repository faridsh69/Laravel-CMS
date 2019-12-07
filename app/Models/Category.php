<?php

namespace App\Models;

use App\Base\BaseModel;
use Kalnoy\Nestedset\NodeTrait;

class Category extends BaseModel
{
    use NodeTrait;

    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'image'],
        ['name' => 'activated'],
        ['name' => 'google_index'],
        ['name' => 'canonical_url'],
        [
            'name' => 'order',
            'type' => 'integer',
            'database' => '',
            'rule' => 'nullable',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'parent_id',
            'type' => 'bigInteger',
            'database' => 'none',
            'relation' => 'categories',
            'rule' => 'nullable|exists:categories,id',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->title;
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id')
            ->orderBy('order', 'asc');
    }
}
