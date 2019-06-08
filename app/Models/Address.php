<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public $columns = [
        [
            'name' => 'label',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Determin home or company or ...',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => 'Specify street and building number',
            'form_type' => '',
            'table' => true,
        ],
        // [
        //     'name' => 'country_id',
        //     'type' => 'integer',
        //     'database' => 'nullable',
        //     'rule' => 'nullable|unsigned|exist:countries,id,',
        //     'help' => '',
        //     'form_type' => '',
        //     'table' => true,
        // ],
        [
            'name' => 'country',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'city',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
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
            'name' => 'mobile',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'phone:AUTO,UK,mobile',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'landline',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'phone:AUTO,UK',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'user_id',
            'relation' => 'users',
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}