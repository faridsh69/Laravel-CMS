<?php

namespace App\Models;

use App\Services\BaseModel;

class Activity extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'user_id'],
        [
            'name' => 'activitiable_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'activitiable_id',
            'type' => 'unsignedBigIntiger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'properties',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
    ];

    public function activitiable()
    {
        return $this->morphTo();
    }
}
