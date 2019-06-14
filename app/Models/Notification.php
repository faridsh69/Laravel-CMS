<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $incrementing = false;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];
    
    public $columns = [
        [
            'name' => 'read_at',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'data',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'type',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'notifiable_id',
            'type' => 'integer',
            'database' => '',
            'rule' => 'required|numeric',
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
