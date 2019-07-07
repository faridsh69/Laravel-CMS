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
            'name' => 'default_meta_title',
            'type' => 'string',
            'form_type' => '',
            'help' => 'Title of pages that dosnt have title.',
        ],
        [
            'name' => 'default_meta_description',
            'type' => 'text',
            'form_type' => 'textarea',
            'help' => 'Default Description that used in search engines.',
        ],
        [
            'name' => 'logo',
            'type' => 'string',
            'form_type' => 'image',
            'help' => 'Maximum 100px',
        ],
        [
            'name' => 'favicon',
            'type' => 'string',
            'form_type' => 'image',
            'help' => 'Maximum 50px',
        ],
        [
            'name' => 'default_meta_image',
            'type' => 'string',
            'form_type' => 'image',
            'help' => 'It can be just like logo image.',
        ],
        [
            'name' => 'default_user_image',
            'type' => 'string',
            'form_type' => 'image',
            'help' => 'Image that used for users that have no profile image.',
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'form_type' => 'checkbox',
            'help' => 'Warning! if it is unchecked means google will ignore this site.',
        ],
        [
            'name' => 'pagination_number',
            'type' => 'string',
            'form_type' => '',
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
