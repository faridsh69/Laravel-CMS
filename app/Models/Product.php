<?php

namespace App\Models;

use App\Services\BaseModel;

class Product extends BaseModel
{
    // title, price, discount_price, inventory, order, url, category_id, description, content, image, activated, tags, ready_time, comment, rate, gallery

    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'category_id'],
        ['name' => 'content'],
        ['name' => 'image'],
        ['name' => 'video'],
        ['name' => 'activated'],
        [
            'name' => 'price',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'help' => '',
            'form_type' => 'number',
            'table' => true,
        ],
        [
            'name' => 'discount_price',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'inventory',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        ['name' => 'order'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];

    public function canBeRated(): bool
    {
        return true;
    }

    public function mustBeApproved(): bool
    {
        return false;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function related_products()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_product_id');
    }

    public function file_src($title)
    {
        if($this->files($title)->first()){
            return $this->files($title)->first()->src;
        }

        return config('setting-general.default_product_image');
    }

    public function file_src_thumbnail($title)
    {
        if($this->files($title)->first()){
            return $this->files($title)->first()->file_src_thumbnail;
        }

        return config('setting-general.default_product_image');
    }
}
