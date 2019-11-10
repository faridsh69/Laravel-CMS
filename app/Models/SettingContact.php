<?php

namespace App\Models;

use App\Base\BaseModel;

class SettingContact extends BaseModel
{
    public $columns = [
        [
            'name' => 'email',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'email',
            'form_type' => 'email',
        ],
        [
            'name' => 'mobile',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'form_type' => '',
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'form_type' => '',
        ],
        [
            'name' => 'fax',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'form_type' => '',
        ],
        [
            'name' => 'address',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'latitude',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Latitude of the place you want to show on the map.',
            'form_type' => '',
        ],
        [
            'name' => 'longitude',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Logitude of the place you want to show on the map.',
            'form_type' => '',
        ],
        [
            'name' => 'google_plus',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
        [
            'name' => 'twitter',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
        [
            'name' => 'facebook',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
        [
            'name' => 'skype',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
        [
            'name' => 'instagram',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
        [
            'name' => 'telegram',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
    ];
}
