<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Services\BaseModelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\morphMany;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasRoles;
    use Notifiable;
    use BaseModelTrait;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
    ];

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

    public function addresses() : hasMany
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function activities() : hasMany
    {
        return $this->hasMany(Activity::class, 'user_id', 'id');
    }

    public function likes() : hasMany
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function comments() : hasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function rates() : hasMany
    {
        return $this->hasMany(Rate::class, 'user_id', 'id');
    }

    public function followings() : hasMany
    {
        return $this->hasMany(Follow::class, 'user_id', 'id');
    }

    public function followers() : morphMany
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function scopeLanguage($query) : Builder
    {
        return $query;
    }

    private function clearFilesAndArrays(array $data, $model)
    {
        foreach(collect($this->getColumns())->where('type', 'boolean')->pluck('name') as $boolean_column)
        {
            if(! isset($data[$boolean_column]))
            {
                $data[$boolean_column] = 0;
            }
        }
        foreach(collect($this->getColumns())->whereIn('type', ['file', 'array', 'captcha'])->pluck('name') as $file_or_array_column)
        {
            unset($data[$file_or_array_column]);
        }
        unset($data['password_confirmation']);
        if(isset($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        }
        else{
            if($model){ // update mode
                $data['password'] = $model->password;
                 if($model->email !== $data['email']){
                    $model->activation_code = null;
                    $model->email_verified_at = null;
                }

                if($model->phone !== $data['phone']){
                    $model->activation_code = null;
                    $model->phone_verified_at = null;
                }
            }
            else{ // create mode
                if($data['password'] === ''){
                    $data['password'] = \Hash::make($data['email']);
                }
            }
        }
        return $data;
    }

    public function getTitleAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function getAdminUsers()
    {
        return self::whereIn('id', [1, 2])->get();
    }

    public $columns = [
        [
            'name' => 'first_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'max:100',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'last_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'max:100',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        ['name' => 'email'],
        ['name' => 'phone'],
        ['name' => 'activated'],
        ['name' => 'telephone'],
        [
            'name' => 'national_code',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric|digits_between:10,10',
            'help' => 'National Code',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'gender',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'switch-bootstrap-m',
            'table' => false,
        ],
        [
            'name' => 'birth_date',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => 'nullable|date',
            'help' => '',
            'form_type' => 'date',
            'table' => false,
        ],
        [
            'name' => 'salary',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        ['name' => 'url'],
        [
            'name' => 'website',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|url|max:190',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        ['name' => 'description'],
        [
            'name' => 'profile_picture',
            'same_column_name' => 'user_image',
        ],
        [
            'name' => 'cover_photo',
            'same_column_name' => 'user_image',
        ],
        [
            'name' => 'activation_code',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'email_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'phone_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'national_card',
            'type' => 'file',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'none',
            'file_manager' => false,
            'file_accept' => 'image',
            'file_multiple' => true,
            'table' => false,
        ],
        [
            'name' => 'national_card_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'bank_card',
            'type' => 'file',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'none',
            'file_manager' => false,
            'file_accept' => 'image',
            'file_multiple' => true,
            'table' => false,
        ],
        [
            'name' => 'bank_card_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'certificate_card',
            'type' => 'file',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'none',
            'file_manager' => false,
            'file_accept' => 'image',
            'file_multiple' => true,
            'table' => false,
        ],
        [
            'name' => 'certificate_card_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'subscribe',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => 'Do you want to receive app notifications?',
            'form_type' => 'switch-bootstrap-m',
            'table' => false,
        ],
        [
            'name' => 'status',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'none', //enum
            'form_enum_class' => 'UserStatus',
            'table' => false,
        ],
        [
            'name' => 'password',
            'type' => 'string',
            'database' => '',
            'rule' => 'nullable|confirmed|min:3|max:100',
            'help' => 'If you let this field be empty in update password will not change.',
            'form_type' => 'password',
            'table' => false,
        ],
        [
            'name' => 'password_confirmation',
            'type' => 'string',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => 'Password should match confirm password.',
            'form_type' => 'confirm_password',
            'table' => false,
        ],
        [
            'name' => 'remember_token',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
    ];
}
