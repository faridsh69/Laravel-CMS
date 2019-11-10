<?php

namespace App\Models;

use App\Base\BaseModel;

class SettingDeveloper extends BaseModel
{
    public $columns = [
        [
            'name' => 'app_debug',
            'type' => 'boolean',
            'rule' => 'boolean',
            'form_type' => 'checkbox',
            'help' => 'Users can see error with details.',
        ],
        [
            'name' => 'app_env',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Select Production always.',
            'form_type' => 'enum',
            'form_enum_class' => 'AppEnvType',
        ],
        [
            'name' => 'app_language',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'form_type' => 'none',
            'help' => 'Specify application language.',
        ],  
        [
            'name' => 'theme',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'form_type' => 'enum',
            'form_enum_class' => 'ThemeType',
            'help' => 'Select theme',
        ],
        [
            'name' => 'theme_color_1',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'form_type' => 'color',
            'help' => 'Select Color 1 of your theme',
        ],
        [
            'name' => 'theme_color_2',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'form_type' => 'color',
            'help' => 'Select Color 2 of your theme',
        ],
        [
            'name' => 'direction',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'form_type' => 'enum',
            'form_enum_class' => 'DirectionType',
            'help' => 'Select direction for texts',
        ],        
        [
            'name' => 'throttle',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
            'help' => 'Stop users who is requesting alot to server.',
        ],
        [
            'name' => 'lazy_loading',
            'type' => 'boolean',
            'rule' => 'boolean',
            'form_type' => 'checkbox',
            'help' => 'Lazy loading is neccessary for fast website fast loading.',
        ],
        [
            'name' => 'email_username',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'email',
            'form_type' => '',
            'help' => 'email that is used for sending emails to users.',
        ],
        [
            'name' => 'email_password',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
            'help' => 'email password that is used for sending emails to users.',
        ],
        [
            'name' => 'email_default_subject',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
        [
            'name' => 'email_default_ccc',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
        [
            'name' => 'scripts',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'seo_title_min',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric|max:255',
            'form_type' => '',
        ],
        [
            'name' => 'seo_title_max',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric|max:255',
            'form_type' => '',
        ],
        [
            'name' => 'seo_url_max',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric|max:255',
            'form_type' => '',
        ],
        [
            'name' => 'seo_url_regex',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'form_type' => '',
        ],
    ];
}
