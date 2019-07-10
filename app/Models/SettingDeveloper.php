<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingDeveloper extends Model
{
    use SoftDeletes;

    public $columns = [
        [
            'name' => 'app_debug',
            'type' => 'boolean',
            'form_type' => 'checkbox',
            'help' => 'Users can see error with details.',
        ],
        [
            'name' => 'app_env',
            'type' => 'boolean',
            'form_type' => 'switch-bootstrap-m',
        ],
        [
            'name' => 'theme',
            'type' => 'string',
            'database' => 'none',
            'relation' => 'themes',
            'rule' => 'nullable|exists:themes,title',
            'help' => 'Dont change it without developer order!',
            'form_type' => 'entity',
            'class' => 'App\Models\Theme',
            'property' => 'title',
            'property_key' => 'title',
            'multiple' => false,
            'table' => true,
        ],
        [
            'name' => 'cdn_url',
            'type' => 'string',
            'form_type' => '',
            'help' => 'All of static files will load from this link.',
        ],
        [
            'name' => 'throttle',
            'type' => 'string',
            'form_type' => '',
            'help' => 'Stop users who is requesting alot to server.',
        ],
        [
            'name' => 'lazy_loading',
            'type' => 'boolean',
            'form_type' => 'checkbox',
            'help' => 'Lazy loading is neccessary for fast website initial loading.',
        ],
        [
            'name' => 'email_username',
            'type' => 'string',
            'form_type' => '',
            'help' => 'email that is used for sending emails to users.',
        ],
        [
            'name' => 'email_password',
            'type' => 'string',
            'form_type' => '',
            'help' => 'email password that is used for sending emails to users.',
        ],
        [
            'name' => 'email_default_subject',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'email_default_ccc',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'scripts',
            'type' => 'text',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'google_analytics',
            'type' => 'string',
            'form_type' => '',
            'help' => 'You can use this for adding google analytics script.',
        ],
        [
            'name' => 'crisp',
            'type' => 'string',
            'form_type' => '',
            'help' => 'You can use this for adding crisp chat.',
        ],
    ];

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
