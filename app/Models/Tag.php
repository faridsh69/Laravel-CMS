<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Model\Tag as TagSpatie;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends TagSpatie
{
    use SoftDeletes;

    protected $appends = ['url', 'title'];

    public function getUrlAttribute()
    {
        return $this->slug;
    }

    public function getTitleAttribute()
    {
        // return $this->attributes['name'];
        return "{$this->name}";
    }

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

    public function getColumns()
    {
        return $this->columns;
    }
}

