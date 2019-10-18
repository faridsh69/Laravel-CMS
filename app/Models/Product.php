<?php

namespace App\Models;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Commentable
{
	use SoftDeletes;
    use Taggable;
    use HasComments;

    // title,
    // price,
    // discount_price,
    // inventory,
    // order,
    // url,
    // category_id,
    // shop_id,
    // description,
    // content,
    // image,
    // activated,
    // tags,
    // ready_time,

    // comment,
    // rate,
	// gallery

    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:90|min:2',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
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
            'name' => 'url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:80|min:2',
            'help' => 'Url should Contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'category_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
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
            'name' => 'shop_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'shops',
            'rule' => 'exists:shops,id',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Shop',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Description will show in lists instead of content.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'ckeditor',
            'table' => true,
        ],
        [
            'name' => 'image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Should have rate 1*1',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'gallery',
            'type' => 'string',
            'database' => 'none',
            'rule' => '',
            'help' => 'select all image files you want to upload',
            'form_type' => 'gallery',
            'table' => false,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => '', // switch-m
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

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    protected $appends = ['image_thumbnail', 'image_main'];

    public function canBeRated(): bool
    {
        return true;
    }

    public function mustBeApproved(): bool
    {
        return false;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function getImageThumbnailAttribute()
    {
        $gallery = $this->images;
        if(count($gallery) > 0){
            return asset($gallery->first()->src_thumbnail);
        }
        return null;
    }

    public function getImageMainAttribute()
    {
        $gallery = $this->images;
        if(count($gallery) > 0){
            return asset($gallery->first()->src_main);
        }
        return null;
    }

    public function getGalleryAttribute()
    {
        $gallery = [];
        foreach($this->images as $gallery_image)
        {
            $gallery[] = ['file' => asset($gallery_image->src_main)];
        }
        return json_encode($gallery);
    }

    public function related_products()
    {
        return $this->belongsToMany('App\Models\Product', 'related_products', 'product_id', 'related_product_id');
    }
}
