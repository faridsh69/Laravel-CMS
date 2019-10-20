<?php

namespace App\Models;

use App\Base\BaseModel;

class Page extends BaseModel
{
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:60|min:4|unique:pages,title,',
            'help' => 'Title should be unique, minimum 4 and maximum 60 characters.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:80|unique:blogs,url,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => 'nullable|seo_header',
            'help' => '',
            'form_type' => 'ckeditor',
            'table' => true,
        ],
        [
            'name' => 'view_code_url',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'Let this field empty if you are not developer, It will used for creating code content.',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'meta_description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191|min:30',
            'help' => 'Meta description should have minimum 30 and maximum 191 characters.',
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

    public function blocks()
    {
        return $this->hasMany('App\Models\Block', 'page_id', 'id');
    }
}
