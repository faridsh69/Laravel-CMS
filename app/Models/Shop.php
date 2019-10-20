<?php

namespace App\Models;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Conner\Tagging\Taggable;
use App\Base\BaseModel;

class Shop extends BaseModel implements Commentable
{
    // exec("php -q /home/faridsh/domains/mmenew.ir/add_subdomain.php xxqq");

    use Taggable;
    use HasComments;

    // title,
    // title_fa,
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
    // category_background_color,
    // category_icon_color,
    // products_background_color,
    // open_time
    // money_unit
    // 'کافه نان دِنجا', 'Denja Bakery Café'

    public $columns = [
        [
            'name' => 'full_name',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => 'Enter your first name and last name.',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:60|min:3|unique:shops,title,',
            'help' => 'English title for your shop.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'title_fa',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '(Your Url).menew.ir',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'email',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'email',
            'table' => true,
        ],
        [
            'name' => 'mobile',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'logo',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Logo of your shop, maximum 150px, rate 1*1',
            'form_type' => 'image',
            'table' => false,
        ],
        [
            'name' => 'cover_image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Cover photo, Should have rate 3*1',
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
            'form_type' => 'checkbox', // switch-m
            'table' => false,
        ],
        [
            'name' => 'address',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
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
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
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
            'database' => 'nullable',
            'rule' => 'nullable|seo_header',
            'help' => '',
            'form_type' => 'textarea',
            'table' => true,
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
        [
            'name' => 'category_background_color',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'This field will managed by developers',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'category_icon_color',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'This field will managed by developers',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'products_background_color',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'This field will managed by developers',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'open_time',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'For example: 10:00|23:00',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'money_unit',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'تومان یا ریال',
            'form_type' => '',
            'table' => false,
        ],
    ];

    public function canBeRated(): bool
    {
        return true;
    }

    public function mustBeApproved(): bool
    {
        return true; // default false
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category', 'shop_id', 'id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'shop_id', 'id');
    }
}
