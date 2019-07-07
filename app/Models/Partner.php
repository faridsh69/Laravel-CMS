<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;

    // title, full_name, content, image, activated
    public $columns = [
        [
            'name' => 'full_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Full name of partner company.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Title of the partner company.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => 'What is in partner company mind?',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Logo of partner company.',
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

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        return $this->columns;
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
