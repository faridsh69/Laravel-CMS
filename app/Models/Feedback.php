<?php

namespace App\Models;

use App\Base\BaseModel;

class Feedback extends BaseModel
{
    // full_name, title, content, image, activated
    public $columns = [
        [
            'name' => 'full_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Full name of the feedback author.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Title of the feedback author in company.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => 'What is in author mind?',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Profile image of the author.',
            'form_type' => 'image',
            'table' => true,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => '', // switch-m
            'table' => false,
        ],
    ];
}
