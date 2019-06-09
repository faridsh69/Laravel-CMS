<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $columns = [
        [
            'name' => 'read_at',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'data',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'type',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'notifiable_id',
            'type' => 'integer',
            'database' => '',
            'rule' => 'required|numeric',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ], 
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
