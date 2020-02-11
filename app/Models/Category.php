<?php

namespace App\Models;

use App\Services\BaseModel;
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
        ['name' => 'order'],
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
        ['name' => 'language'],
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->title;
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog', 'category_id', 'id');
    }
}
