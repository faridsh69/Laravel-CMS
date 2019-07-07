<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;
    use SoftDeletes;

    // title, url, description, meta_description, meta_image, activated, google_index, canonical_url, parent_id, _rgt, _lft, shop_id,

    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:60|min:2',
            'help' => 'Title should be minimum 2 and maximum 60 characters.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:80|regex:/^[a-z0-9-]+$/',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Brief description about this category.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'meta_description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191|min:70',
            'help' => 'Meta description should have minimum 70 and maximum 191 characters.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'meta_image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191|url',
            'help' => 'Meta image shows when this page is shared in social networks.',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => 'Google will index this page.',
            'form_type' => 'checkbox',
            'table' => false,
        ],
        [
            'name' => 'canonical_url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191|url',
            'help' => 'Canonical url just used for seo redirect duplicate contents.',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => '_rgt',
            'type' => 'integer',
            'database' => 'none',
            'form_type' => 'none',
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
        [
            'name' => 'shop_id',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none', // 'entity',
            'class' => 'App\Models\Shop',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
    ];

    protected $fillable = [
        'title', 'url', 'description', 'meta_description', 'meta_image', 'activated', 'google_index', 'canonical_url', 'parent_id', '_rgt', '_lft', 'shop_id',
    ];

    protected $appends = ['text'];

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public function getTextAttribute()
    {
        return $this->title;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
