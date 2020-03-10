<?php

namespace App\Models;

use App\Services\BaseModel;

class Tagend extends BaseModel
{
    public $columns = [
    	['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'activated'],
        ['name' => 'user_id'],
        [
            'name' => 'value',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'sign',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '0 negative 1 positive',
            'form_type' => 'switch-bootstrap-m',
            'table' => false,
        ],
        [
            'name' => 'is_copon',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '',
            'form_type' => 'checkbox',
            'table' => false,
        ],
        [
            'name' => 'type',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '0 absolot 1 percent',
            'form_type' => 'switch-bootstrap-m',
            'table' => false,
        ],
        [
            'name' => 'code',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'used_count',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'used_from_date',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'date',
            'table' => false,
        ],
        [
            'name' => 'used_to_date',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'date',
            'table' => false,
        ],
        [
            'name' => 'minimum_price',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        ['name' => 'language'],
    ];

	public function scopeForced($query)
    {
        return $query->where('title', 'NOT LIKE', '%ارسال%')
            ->where('is_copon', 0)
            ->where('activated', 1);
    }

    public function scopeShipping($query)
    {
        return $query->where('title', 'like', '%ارسال%')
            ->where('is_copon', 0)
            ->active();
    }

    public function scopeCopon($query)
    {
        return $query->where('is_copon', 1)
            ->where('activated', 1);
    }
}
