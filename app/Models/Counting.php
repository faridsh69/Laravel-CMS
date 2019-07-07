<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Counting extends Model
{
    use SoftDeletes;

    // title, number, icon, activated
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => 'Title of Goal.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'icon',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Icon of Goal.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'number',
            'type' => 'integer',
            'database' => '',
            'rule' => 'numeric',
            'help' => 'Count of times that goal recieved.',
            'form_type' => '',
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
