<?php

namespace App\Models;

use App\Services\BaseModel;

class Address extends BaseModel
{
    public $columns = [
        [
            'name' => 'country',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'province',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'city',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'address',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'postal_code',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|min:5|max:16',
            //     'rule' => 'phone:AUTO,mobile',
            'help' => 'Mobile Number',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'telephone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|min:5|max:16',
            'help' => 'Home Number',
            'form_type' => '',
            'table' => false,
        ],
        ['name' => 'full_name'],
        ['name' => 'activated'],
        ['name' => 'user_id'],
        [
            'name' => 'latitude',
            'type' => 'decimal',
            'database' => 'none',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'longitude',
            'type' => 'decimal',
            'database' => 'none',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
