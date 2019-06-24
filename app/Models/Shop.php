<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;

class Shop extends Model implements Commentable
{
    use SoftDeletes;
    use Taggable;
    use HasComments;

    public $guarded = [];

    // title, 
    // url,
    // email,
    // logo,
    // cover_image,
    // favicon,
    // activated,
    // address,
    // country,
    // city,
    // postal_code,
    // mobile,
    // phone,
    // fax,
    // twitter,
    // telegram,
    // instagram,
    // skype,
    // description,
    // content,
    // meta_description,
    // keywords,
    // tags,
    // gallery,
    
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:60|min:5|unique:shops,title,',
            'help' => 'Title should be unique, minimum 5 and maximum 60 characters.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|max:80|unique:shops,url,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'email',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|unique:shops,email,',
            'help' => '',
            'form_type' => 'email',
            'table' => true,
        ],
        [
            'name' => 'logo',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Should have rate 1*1',
            'form_type' => 'image',
            'table' => false,
        ],
        [
            'name' => 'cover_image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Should have rate 3*1',
            'form_type' => 'image',
            'table' => false,
        ],
        [
            'name' => 'favicon',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'maximum 60*60 pixels',
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
            'name' => 'address',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => 'Specify street and building number',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'country',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'city',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'postal_code',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'mobile',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'phone:AUTO,mobile',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'phone:AUTO',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'fax',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'twitter',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'facebook',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'skype',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'instagram',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'telegram',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
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
            'rule' => 'required|max:191|min:30',
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
    ];

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
            
    public function getColumns()
    {
        return $this->columns;
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
