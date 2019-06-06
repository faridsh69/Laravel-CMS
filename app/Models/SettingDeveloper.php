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
            'name' => 'cdn_url',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'throttle',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'app_debug',
            'type' => 'boolean',
            'form_type' => 'checkbox',
        ],
        [
            'name' => 'app_env',
            'type' => 'boolean',
            'form_type' => 'switch-bootstrap-m',
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
