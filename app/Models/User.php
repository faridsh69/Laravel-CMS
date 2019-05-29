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

    protected $gaurd = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $columns = [
        [
            'name' => 'first_name',
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

        // Schema::defaultStringLength(191);
        // Schema::create('users', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('first_name');
        //     $table->string('last_name');
        //     $table->string('phone')->unique();
        //     $table->string('password');
        //     $table->string('email')->nullable();
        //     $table->string('national_code')->nullable();
        //     $table->enum('gender', ['male', 'female'])->default('male');
        //     $table->date('birthday')->nullable();
        //     $table->string('used_marketer_code')->nullable();
        //     $table->string('generated_marketer_code')->nullable();
        //     $table->string('rate')->nullable();
        //     $table->integer('credit')->unsigned()->default(0);
        //     $table->tinyInteger('status')->default(1);
        //     $table->integer('image_id')->unsigned()->nullable();
        //     $table->integer('sms_code')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });


    public function getColumns()
    {
        return $this->columns;
    }
}
