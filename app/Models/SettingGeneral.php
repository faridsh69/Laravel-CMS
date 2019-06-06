<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingGeneral extends Model
{
    use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public $columns = [
        [
            'name' => 'app_name',
            'type' => 'string',
            'form_type' => '',
        ],
        [
            'name' => 'app_url',
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
            'name' => 'google_index',
            'type' => 'boolean',
            'form_type' => 'checkbox',
        ],        
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
