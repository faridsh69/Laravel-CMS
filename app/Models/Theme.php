<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use SoftDeletes;

    public $guarded = [];

	public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:191',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
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

    public function getColumns()
    {
        return $this->columns;
    }
}
