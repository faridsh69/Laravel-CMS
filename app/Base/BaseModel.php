<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        $default_columns = [
            'title' => [
                'name' => 'title',
                'type' => 'string',
                'database' => '',
                'rule' => 'required|max:60|min:5|unique:blogs,title,',
                'help' => 'Title should be unique, minimum 5 and maximum 60 characters. read https://moz.com/learn/seo/title-tag',
                'form_type' => '',
                'table' => true,
            ],
            'url' => [
                'name' => 'url',
                'type' => 'string',
                'database' => 'nullable',
                'rule' => '',
                'help' => 'Url should be unique, contain lowercase characters and numbers and -',
                'form_type' => '',
                'table' => false,
            ],
            'description' => [
                'name' => 'description',
                'type' => 'string',
                'database' => 'nullable',
                'rule' => 'nullable|max:191',
                'help' => 'Description will show in lists instead of content.',
                'form_type' => 'textarea',
                'table' => false,
            ],
            'meta_description' => [
                'name' => 'meta_description',
                'type' => 'string',
                'database' => 'nullable',
                'rule' => 'nullable|max:191|min:70',
                'help' => 'Meta description should have minimum 70 and maximum 191 characters.',
                'form_type' => 'textarea',
                'table' => false,
            ],
            'content' => [
                'name' => 'content',
                'type' => 'text',
                'database' => '',
                'rule' => 'required', // 'required|seo_header',
                'help' => '',
                'form_type' => 'ckeditor',
                'table' => true,
            ],
            'keywords' => [
                'name' => 'keywords',
                'type' => 'string',
                'database' => 'nullable',
                'rule' => 'nullable|max:191',
                'help' => 'Its not important for google anymore',
                'form_type' => '',
                'table' => false,
            ],
            'image' => [
                'name' => 'image',
                'type' => 'string',
                'database' => 'nullable',
                'rule' => 'nullable|max:191',
                'help' => 'Meta image shows when this page is shared in social networks.',
                'form_type' => 'image',
                'table' => false,
            ],
            'activated' => [
                'name' => 'activated',
                'type' => 'boolean',
                'database' => 'default',
                'rule' => 'boolean',
                'help' => '',
                'form_type' => '', // switch-m
                'table' => false,
            ],
            'google_index' => [
                'name' => 'google_index',
                'type' => 'boolean',
                'database' => 'default',
                'rule' => 'boolean',
                'help' => 'Google will index this page.',
                'form_type' => 'checkbox',
                'table' => false,
            ],
            'canonical_url' => [
                'name' => 'canonical_url',
                'type' => 'string',
                'database' => 'nullable',
                'rule' => 'nullable|max:191|url',
                'help' => 'Canonical url just used for seo redirect duplicate contents.',
                'form_type' => '',
                'table' => false,
            ],
        ];

        // title, 'https://moz.com/learn/seo/title-tag'
        // url, 'https://moz.com/learn/seo/url'
        // description 50–155 -> use in summary;
        // content, h1 h2 
        // keywords
        // image
        // activated
        // google_index
        // canonical_url
        // category_id
        // tags
        // related_blogs

        // title, 60 'https://moz.com/learn/seo/title-tag'
        // url, 'https://moz.com/learn/seo/url'
        // description 50–155 -> use in summary;
        // content, h1 h2 
        // keywords
        // image
        // activated
        // google_index
        // canonical_url
        // category_id
        // tags
        // related_blogs

        $columns = $this->columns;
        foreach($columns as $key => $column)
        {
            if(array_key_exists($column['name'], $default_columns)){
                $columns[$key] = $default_columns[$column['name']];
            }
        }

        return $columns;
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }

    public function getMetaImageAttribute($value)
    {
        if($value){
            return $value;
        }
        return config('0-general.default_meta_image');
    }

    public function getImageAttribute($image)
    {
        if(isset($image)) {
            return $image; 
        }

        return config('0-general.default_product_image');
    }

}