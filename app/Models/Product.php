<?php

namespace App\Models;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use App\Services\BaseModel;
use Conner\Tagging\Taggable;

class Product extends BaseModel implements Commentable
{
    use Taggable;
    use HasComments;

    // title, price, discount_price, inventory, order, url, category_id, description, content, image, activated, tags, ready_time, comment, rate, gallery

    public $columns = [
        ['name' => 'title'],
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
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'content'],
        ['name' => 'gallery'],
        [
            'name' => 'inventory',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        ['name' => 'activated'],
        ['name' => 'order'],
        [
            'name' => 'category_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'relation' => 'categories',
            'rule' => 'nullable|exists:categories,id',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Category',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'tags',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Tag',
            'property' => 'name',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
        [
            'name' => 'related_products',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Product',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
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
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function related_products()
    {
        return $this->belongsToMany('App\Models\Product', 'related_products', 'product_id', 'related_product_id');
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
