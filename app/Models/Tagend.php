<?php

namespace App\Models;

use App\Services\BaseModel;

class Tagend extends BaseModel
{
    public $columns = [
    	['name' => 'title'],
        ['name' => 'description'],
        [
            'name' => 'sign',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '0 negative 1 positive',
            'form_type' => 'switch-bootstrap-m',
            'table' => false,
        ],
        [
            'name' => 'value_type',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '0 absolute 1 percent',
            'form_type' => 'switch-bootstrap-m',
            'table' => false,
        ],
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
            'name' => 'is_copon',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'checkbox-m',
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
        ['name' => 'activated'],
        ['name' => 'user_id'],
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
        return $query->where('title', 'NOT LIKE', '%post%')
            ->where('is_copon', 0)
            ->where('activated', 1);
    }

    public function scopeShipping($query)
    {
        return $query->where('title', 'like', '%post%')
            ->where('is_copon', 0)
            ->active();
    }

    public function scopeCopon($query)
    {
        return $query->where('is_copon', 1)
            ->where('activated', 1);
    }
}
