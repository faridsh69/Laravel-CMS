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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $columns = [
        [
            'name' => 'name',
            'type' => 'string',
            'rule' => '',
            'validation' => '',
            'table' => true,
        ],
        [
            'name' => 'email',
            'type' => 'string',
            'rule' => 'unique',
            'validation' => 'required|unique:users,email,',
            'table' => true,
        ],
        [
            'name' => 'email_verified_at',
            'type' => 'timestamp',
            'rule' => 'nullable',
            'validation' => 'nullable|date',
            'help' => '',
            'form_type' => 'system',
            'table' => true,
        ],
        [
            'name' => 'password',
            'type' => 'string',
            'rule' => 'required',
            'form_type' => 'password',
        ], 
        [
            'name' => 'activated',
            'type' => 'boolean',
            'rule' => 'default',
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
