<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingGeneral extends Model
{
    use SoftDeletes;

    public $guarded = [];

    public $columns = [
        [
            'name' => 'app_name',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'default_meta_title',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'default_meta_description',
            'type' => 'text',
            'form_type' => 'textarea    ',
        ],
        [
            'name' => 'pagination_number',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'crisp',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'google_analytics',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'default_meta_image',
            'type' => 'string',
            'form_type' => 'image',
        ],
        [
            'name' => 'default_user_image',
            'type' => 'string',
            'form_type' => 'image',
        ],
        [
            'name' => 'logo',
            'type' => 'string',
            'form_type' => 'image',
        ],
        [
            'name' => 'favicon',
            'type' => 'string',
            'form_type' => 'image',
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'form_type' => 'checkbox',
        ],
        [
            'name' => 'android_application_url',
            'type' => 'string',
            'help' => 'Url of Google play for android application.',
            'form_type' => '',
        ],
        [
            'name' => 'ios_application_url',
            'type' => 'string',
            'help' => 'Url of Apple store for ios application.',
            'form_type' => '',
        ],
        [
            'name' => 'introduce_video_url',
            'type' => 'string',
            'form_type' => '',
            'help' => 'The main video that will show in home page.',
        ],
        [
            'name' => 'introduce_video_cover_photo',
            'type' => 'string',
            'form_type' => 'image',
            'help' => 'Cover photo for introduce video.',
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
