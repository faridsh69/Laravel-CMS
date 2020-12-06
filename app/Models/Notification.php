<?php

namespace App\Models;

use App\Services\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends BaseModel
{
    public $columns = [
        [
            'name' => 'type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'notifiable_type',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => 'Model of who is getting notification',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'notifiable_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => 'required|numeric',
            'help' => 'Model ID of who is getting notification',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'data',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'read_at',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'user',
            'type' => 'string',
            'database' => 'none',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'users',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\User',
            'property' => 'phone',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'notifiable_id', 'id');
    }
}
