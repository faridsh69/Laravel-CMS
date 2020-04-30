<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasRoles;
    use Notifiable;
    use SoftDeletes;

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
        [
            'name' => 'email',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required|unique:users,email,',
            'help' => '',
            'form_type' => 'email',
            'table' => true,
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'help' => 'International format +4917...',
            'form_type' => 'phone',
            'table' => true,
        ],
        [
            'name' => 'telephone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric',
            'help' => 'Home Number',
            'form_type' => '',
            'table' => false,
        ],
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
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|url',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'website',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|url|max:190',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'bio',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'profile_picture',
            'type' => 'file',
            'database' => 'none',
            'rule' => 'nullable|file|image|mimetypes:image/*|max:2000|dimensions:min_width=100,min_height=100',
            'help' => 'Upload profile picture, minimum acceptable width and heigth is 100px.',
            'form_type' => 'file',
            'file_manager' => false,
            'file_accept' => 'image',
            'file_multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'cover_photo',
            'type' => 'file',
            'database' => 'none',
            'rule' => 'nullable|file|image|mimetypes:image/*|max:4000',
            'help' => 'Upload cover photo',
            'form_type' => 'file',
            'file_manager' => false,
            'file_accept' => 'image',
            'file_multiple' => false,
            'table' => false,
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
            'name' => 'national_card_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
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
            'name' => 'certificate_card_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'checkbox-m',
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

    public function getColumns()
    {
        return $this->columns;
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function getAdminUsers()
    {
        return self::whereIn('id', [1,2])->get();
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'user_id', 'id');
    }

    public function followings()
    {
        return $this->hasMany(Follow::class, 'user_id', 'id');
    }

    public function followers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }

    public function files_for($title)
    {
        return $this->files()->where('title', $title)->get();
    }

    public function files_src_for($title)
    {
        return $this->files_for($title)->pluck('src')->toArray();
    }

    public function srcs($title)
    {
        $isFileManager = collect($this->getColumns())->where('name', $title)->first()['file_manager'];
        $srcs = [];
        if($isFileManager === true && $this->{$title}){
            $srcs = explode(',', $this->{$title});
        } 
        else {
            $srcs = $this->files_src_for($title);
        }

        return $srcs;
    }

    public function src($title)
    {
        $srcs = $this->srcs($title);
        return count($srcs) > 0 ? $srcs[0] : config('setting-general.default_user_image');
    }

    public function saveWithRelations($data, $model = null)
    {
        $data_without_file_and_array = $this->_clearFilesAndArrays($data, $model);
        if($model){
            $this->update($data_without_file_and_array);
        }else{
            $model = $this->create($data_without_file_and_array);
        }
        $this->_saveRelatedDataAfterCreate($data, $model);

        return $model;
    }

    private function _clearFilesAndArrays($data, $model)
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
                if($data['password'] == ''){
                    $data['password'] = \Hash::make($data['email']);
                }
            }
        }
        return $data;
    }

    private function _saveRelatedDataAfterCreate($data, $model)
    {
        foreach(collect($this->getColumns())->where('type', 'file')->pluck('name') as $file_column) {
            $file = $data[$file_column];
            if($file){
                $file_service = new \App\Services\BaseFileService();
                $file_service->save($file, $model, $file_column);
            }
        }
        foreach(collect($this->getColumns())->where('type', 'array')->pluck('name') as $array_column) {
            $model->{$array_column}()->sync($data[$array_column], true);
        }
    }
}
