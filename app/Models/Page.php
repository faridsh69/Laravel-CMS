<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    use Taggable;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|max:60|min:5|unique:pages,title,',
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
            'rule' => 'nullable|max:191|url',
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
    ];

    public function getColumns()
    {
        return $this->columns;
    }

    public function blocks()
    {
        return $this->hasMany('App\Models\Block', 'page_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
