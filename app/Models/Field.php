<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;

    // title, type, required
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|unique:forms,title,',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'required',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'switch-bootstrap-m', // switch-m
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

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_form', 'form_id', 'field_id');
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
