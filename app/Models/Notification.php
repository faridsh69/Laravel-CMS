<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $incrementing = false;

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
            'table' => false,
        ],
        [
            'name' => 'users',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\User',
            'property' => 'email',
            'property_key' => 'id',
            'multiple' => true,
            'table' => true,
        ],
    ];

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public function getDataAttribute($data)
    {
        if(isset($data) && $data !== '[]'){
            // dd(json_decode($data)->data);
            return json_decode($data)->data;
        }
        return '-';
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'notifiable_id', 'id');
    }
}
