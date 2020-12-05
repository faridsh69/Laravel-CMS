<?php

namespace App\Models;

use App\Services\BaseModel;

class Module extends BaseModel
{
    public $columns = [
        [
            'name' => 'type',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => 'Every Module is used in one block type.',
            'form_type' => 'enum',
            'form_enum_class' => 'BlockType',
            'table' => true,
        ],
        ['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'content'],
        ['name' => 'order'],
        ['name' => 'image'],
        ['name' => 'url'],
        ['name' => 'video'],
        ['name' => 'icon'],
        ['name' => 'full_name'],
        [
            'name' => 'parent_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'relation' => 'modules',
            'rule' => 'nullable',
            'help' => 'Used for menu block.',
            'form_type' => 'entity',
            'class' => 'App\Models\Module',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
        	'name' => 'product_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'Used for products block.',
            'form_type' => 'entity',
            'class' => 'App\Models\Product',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        ['name' => 'activated'],
        ['name' => 'language'],
    ];

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
