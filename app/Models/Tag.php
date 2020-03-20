<?php

namespace App\Models;

use Conner\Tagging\Model\Tag as ConnerTag;

class Tag extends ConnerTag
{
    public $columns = [
        [
            'name' => 'name',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:125',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'slug',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|max:125',
            'help' => 'slug used for url and routings',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'suggest',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'count',
            'type' => 'integer',
            'database' => 'unsigned',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
    ];

    protected $appends = ['url', 'title'];

    public function getUrlAttribute()
    {
        return $this->slug;
    }

    public function getTitleAttribute()
    {
        return $this->name;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getAssetImageAttribute()
    {
        if(isset($this->image) && $this->image) {
            return asset($this->image);
        }

        return asset(config('setting-general.default_meta_image'));
    }
}
