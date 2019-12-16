<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as ActivitySpatie;

class Activity extends ActivitySpatie
{
    public $columns = [
        [
            'name' => 'log_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'description',
            'type' => 'text',
            'database' => '',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'subject_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'subject_id',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'causer_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'causer_id',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'causer',
            'type' => 'string',
            'database' => 'none',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'properties',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
