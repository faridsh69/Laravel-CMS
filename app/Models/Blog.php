<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
	use SoftDeletes;
    use Taggable;

    public $guarded = [];

    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'rule' => 'unique',
            'validation' => 'required|max:60|min:10|unique:blogs,title,',
            'help' => 'Title should be unique, minimum 10 and maximum 60 characters.',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'rule' => 'unique',
            'validation' => 'required|max:80|regex:/^[a-z0-9-_]+$/|unique:blogs,url,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'table' => true,
        ],
        [
            'name' => 'category_id',
            'relation' => 'categories',
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191',
            'help' => 'Short content will show in lists instead of content.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'validation' => 'required|seo_header',
            'form_type' => 'ckeditor',
            'table' => true,
        ], 
        [
            'name' => 'meta_description',
            'type' => 'string',
            'validation' => 'required|max:191|min:70',
            'help' => 'Meta description should have minimum 70 and maximum 191 characters.',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'keywords',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191',
            'help' => 'Its not important for google anymore',
        ],
        [
            'name' => 'meta_image',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191|url',
            'help' => 'Meta image shows when this page is shared in social networks.',
        ],
        [
            'name' => 'published',
            'type' => 'boolean',
            'rule' => 'default',
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'rule' => 'default',
            'help' => 'Google will index this page.',
            'form_type' => 'checkbox'
        ],
        [
            'name' => 'canonical_url',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191|url',
            'help' => 'Canonical url just used for seo redirect duplicate contents.',
        ],
    ];

    protected $hidden = [
        'deleted_at',
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

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->published = $model->published ? 1 : 0;
            $model->google_index = $model->google_index ? 1 : 0;
        });

        self::updating(function($model){
            $model->published = $model->published ? 1 : 0;
            $model->google_index = $model->google_index ? 1 : 0;
        });
    }
}
