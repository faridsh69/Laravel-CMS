<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'help',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'description',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'ckeditor',
            'table' => true,
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
