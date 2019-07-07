<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;

    // title, description, icon, activated
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Title of the company feature.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'icon',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Icon of company feature.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'description',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'textarea',
            'table' => true,
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
    ];

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        return $this->columns;
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
