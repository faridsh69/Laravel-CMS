<?php

namespace App\Models;

use App\Services\BaseModel;

class Follow extends BaseModel
{
    public $columns = [
        ['name' => 'user_id'],
        [
            'name' => 'followable_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'followable_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
    ];

    public function followable()
    {
        return $this->morphTo();
    }
}
