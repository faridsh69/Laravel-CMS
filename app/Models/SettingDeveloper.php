<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingDeveloper extends Model
{
    use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public $columns = [
        [
            'name' => 'mobile123',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'phone123',
            'type' => 'string',
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
        [
            'name' => 'address',
            'type' => 'string',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'fax',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'email',
            'type' => 'string',
            'form_type' => 'email',
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
