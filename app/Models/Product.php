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
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'content'],
        ['name' => 'image'],
        [
            'name' => 'price',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'numeric',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'discount_price',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'inventory',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'order',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'category_id',
            'type' => 'bigInteger',
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
            'name' => 'gallery',
            'type' => 'files_array',
            'database' => 'none',
            'rule' => '',
            'help' => 'select all image files you want to upload',
            'form_type' => 'gallery',
            'table' => false,
        ],
        ['name' => 'activated'],
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
        [
            'name' => 'ready_time',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
    ];

    // protected $appends = ['image_thumbnail', 'image_main'];

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

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

        public function getAssetImageAttribute()
    {
        if(isset($this->image) && $this->image) {
            return asset($this->image);
        }

        return asset(config('setting-general.default_product_image'));
    }

    public function related_products()
    {
        return $this->belongsToMany('App\Models\Product', 'related_products', 'product_id', 'related_product_id');
    }

    // public function getImageThumbnailAttribute()
    // {
    //     $gallery = $this->images;
    //     if(count($gallery) > 0){
    //         return asset($gallery->first()->src_thumbnail);
    //     }
    //     return null;
    // }

    // public function getImageMainAttribute()
    // {
    //     $gallery = $this->images;
    //     if(count($gallery) > 0){
    //         return asset($gallery->first()->src_main);
    //     }
    //     return null;
    // }
}
