<?php

namespace App\Models;

use App\Services\BaseModel;

class SettingDeveloper extends BaseModel
{
    public $columns = [
        [
            'name' => 'app_debug',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => 'Users can see error with details.',
            'form_type' => 'checkbox-m',
        ],
        [
            'name' => 'app_env',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Select Production always.',
            'form_type' => 'enum',
            'form_enum_class' => 'AppEnv',
        ],
        [
            'name' => 'app_language',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Specify application language.',
            'form_type' => 'enum',
            'form_enum_class' => 'AppLanguage',
        ],
        [
            'name' => 'auto_language',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => 'Choose language base on user IP.',
            'form_type' => 'checkbox-m',
        ],
        [
            'name' => 'scripts',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'This codes run on all pages',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'styles',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'This styles go into header of all pages',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'theme',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Select theme',
            'form_type' => 'enum',
            'form_enum_class' => 'AppTheme',
        ],
        [
            'name' => 'theme_color_1',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Select Color 1 of your theme - default #884bdf',
            'form_type' => 'color',
        ],
        [
            'name' => 'theme_color_2',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'form_type' => 'color',
            'help' => 'Select Color 2 of your theme - default #fb397d',
        ],
        [
            'name' => 'direction',
            'type' => 'boolean',
            'database' => 'nullable',
            'rule' => 'boolean',
            'form_type' => 'switch-bootstrap-m',
            'help' => 'Select direction for texts',
        ],
        [
            'name' => 'throttle',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Stop users who is requesting alot to api. default 60,1',
            'form_type' => '',
        ],
        [
            'name' => 'lazy_loading',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => 'Lazy loading is neccessary for fast website fast loading.',
            'form_type' => 'checkbox-m',
        ],
        [
            'name' => 'notification_events',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Enable or disable notifications',
            'form_type' => 'enum',
            'form_enum_class' => 'NotificationEvent',
            'multiple' => true,
        ],
        [
            'name' => 'sms_driver',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'Select sms driver.',
            'form_type' => 'enum',
            'form_enum_class' => 'SmsDriver',
        ],
        [
            'name' => 'sms_sender',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric',
            'help' => 'Specify sms sender number.',
            'form_type' => '',
        ],
        [
            'name' => 'sms_api_key',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Specify sms API KEY.',
            'form_type' => '',
        ],
        [
            'name' => 'email_username',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'email',
            'help' => 'email that is used for sending emails to users.',
            'form_type' => '',
        ],
        [
            'name' => 'email_password',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'email password that is used for sending emails to users.',
            'form_type' => '',
        ],
        [
            'name' => 'seo_title_min',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric|max:255',
            'help' => 'Specify validation for minimum characters in title - 2',
            'form_type' => '',
        ],
        [
            'name' => 'seo_title_max',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric|max:255',
            'help' => 'Specify validation for maximum characters in title - 70',
            'form_type' => '',
        ],
        [
            'name' => 'seo_url_max',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'numeric|max:255',
            'help' => 'Specify validation for maximum characters in url - 80',
            'form_type' => '',
        ],
        [
            'name' => 'seo_url_regex',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Dont change this, its validation for url',
            'form_type' => '',
        ],
    ];

    protected $casts = [
        'notification_events' => 'array',
    ];

    public static function boot()
    {
        parent::boot();
        self::updating(function($model){
            $model->notification_events = json_encode($model->notification_events);
        });
    }
}
