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
            'name' => 'app_title',
            'type' => 'string',
            'rule' => 'required',
            'help' => 'Name of this website.',
            'form_type' => '',
        ],
        [
            'name' => 'default_meta_title',
            'type' => 'string',
            'rule' => '',
            'help' => 'Title of pages that dosnt have title.',
            'form_type' => '',
        ],
        [
            'name' => 'default_meta_description',
            'type' => 'text',
            'rule' => '',
            'help' => 'Default Description that used in search engines.',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'logo',
            'type' => 'string',
            'rule' => 'required',
            'help' => 'Maximum 100px',
            'form_type' => 'image',
        ],
        [
            'name' => 'favicon',
            'type' => 'string',
            'rule' => 'required',
            'help' => 'Maximum 50px',
            'form_type' => 'image',
        ],
        [
            'name' => 'default_meta_image',
            'type' => 'string',
            'rule' => '',
            'help' => 'It can be just like logo image.',
            'form_type' => 'image',
        ],
        [
            'name' => 'default_user_image',
            'type' => 'string',
            'rule' => '',
            'help' => 'Image that used for users that have no profile image.',
            'form_type' => 'image',
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'rule' => 'boolean',
            'help' => 'Warning! if it is unchecked means google will ignore this site.',
            'form_type' => 'checkbox',
        ],
        [
            'name' => 'pagination_number',
            'type' => 'string',
            'rule' => 'numeric',
            'help' => 'Its tables pagination number in blog list page',
            'form_type' => '',
        ],
        [
            'name' => 'android_application_url',
            'type' => 'string',
            'rule' => '',
            'help' => 'Url of Google play for android application.',
            'form_type' => '',
        ],
        [
            'name' => 'ios_application_url',
            'type' => 'string',
            'rule' => '',
            'help' => 'Url of Apple store for ios application.',
            'form_type' => '',
        ],
        [
            'name' => 'introduce_video_url',
            'type' => 'string',
            'rule' => '',
            'help' => 'The main video that will show in home page.',
            'form_type' => '',
        ],
        [
            'name' => 'introduce_video_cover_photo',
            'type' => 'string',
            'rule' => '',
            'help' => 'Cover photo for introduce video.',
            'form_type' => 'image',
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
