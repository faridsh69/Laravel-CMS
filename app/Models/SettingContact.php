<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingContact extends Model
{
    use SoftDeletes;

    public $guarded = [];

    public $columns = [
        [
            'name' => 'email',
            'type' => 'string',
            'form_type' => 'email',
        ],
        [
            'name' => 'mobile',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'fax',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'address',
            'type' => 'string',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'latitude',
            'type' => 'string',
            'help' => 'Latitude of the place you want to show on the map.',
            'form_type' => '',
        ],
        [
            'name' => 'longitude',
            'type' => 'string',
            'help' => 'Logitude of the place you want to show on the map.',
            'form_type' => '',
        ],
        [
            'name' => 'google_plus',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'twitter',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'facebook',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'skype',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'instagram',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'telegram',
            'type' => 'string',
            'form_type' => '',
        ],
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
