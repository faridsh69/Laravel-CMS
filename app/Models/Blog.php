<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;

class Blog extends Model implements Commentable
{
    use SoftDeletes;
    use Taggable;
    use HasComments;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public function canBeRated(): bool
    {
        return true;
    }

    public function mustBeApproved(): bool
    {
        return true; // default false
    }

    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|max:60|min:5|unique:blogs,title,',
            'help' => 'Title should be unique, minimum 5 and maximum 60 characters.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|max:80|regex:/^[a-z0-9-]+$/|unique:blogs,url,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => true,
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
            'database' => '',
            'rule' => 'required|seo_header',
            'help' => '',
            'form_type' => 'ckeditor',
            'table' => true,
        ], 
        [
            'name' => 'meta_description',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:191|min:70',
            'help' => 'Meta description should have minimum 70 and maximum 191 characters.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'keywords',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Its not important for google anymore',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'meta_image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Meta image shows when this page is shared in social networks.',
            'form_type' => 'image',
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
            'name' => 'related_blogs',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Blog',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
    ];
        
    public function getColumns()
    {
        return $this->columns;
    }

    public function editor()
    {
        // @todo in bayad az laravel activity log bekhone
        // return $this->belongsTo('App\Models\User', 'editor_id', 'id');
    }

    public function creator()
    {
        // @todo in bayad az laravel activity log bekhone
        // return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function related_blogs()
    {
        return $this->belongsToMany('App\Models\Blog', 'related_blogs', 'blog_id', 'related_blog_id');
    }
}
