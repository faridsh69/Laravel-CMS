<?php

namespace App\Models;

use App\Services\BaseModel;

class Like extends BaseModel
{
    public $columns = [
        ['name' => 'user_id'],
        [
            'name' => 'likeable_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'likeable_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
    ];

    public function likeable()
    {
        return $this->morphTo();
    }
}
