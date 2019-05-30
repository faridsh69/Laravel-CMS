<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;

    public $guarded = [];

    protected $hidden = [
        'password', 'remember_token', 'deleted_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $columns = [
        [
            'name' => 'first_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'last_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'email',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|unique:users,email,',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'mobile',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric|max:16',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'landline',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric|max:16',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'is_male',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'birth_date',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => 'nullable|date',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'salary',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'nullable|integer',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required|max:80|regex:/^[a-z0-9-]+$/|unique:users,url,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'barcode',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required|unique:users,barcode,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'website',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|url|max:190',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'email_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => 'nullable|date',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'password',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|confirmed',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        
    ];

    public function getColumns()
    {
        return $this->columns;
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->activated = $model->activated ? 1 : 0;
            $model->is_male = $model->is_male ? 1 : 0;
        });

        self::updating(function($model){
            $model->activated = $model->activated ? 1 : 0;
            $model->is_male = $model->is_male ? 1 : 0;
        });
    }
    
}
