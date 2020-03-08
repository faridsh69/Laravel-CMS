<?php

namespace App\Services;

use Cache;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\LanguageScope;

class BaseModel extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        $table_name = $this->getTable();
        $seconds = 1;
        return Cache::remember('models.' . $table_name, $seconds, function () {
            $default_columns = [
                'title' => [
                    'name' => 'title',
                    'type' => 'string',
                    'database' => '',
                    'rule' => 'required|min:' . config('setting-developer.seo_title_min')
                    . '|max:' . config('setting-developer.seo_title_max'),
                    'help' => 'Title should be unique and must not be same with H1.',
                    'form_type' => '',
                    'table' => true,
                ],
                'description' => [
                    'name' => 'description',
                    'type' => 'text',
                    'database' => 'nullable',
                    'rule' => 'nullable',
                    'help' => 'Description should be 50 - 70 characters, maximum 160 characters.',
                    'form_type' => 'textarea',
                    'table' => true,
                ],
                'content' => [
                    'name' => 'content',
                    'type' => 'text',
                    'database' => 'nullable',
                    'rule' => 'nullable', // only page and blog need seo_header
                    'help' => '',
                    'form_type' => 'ckeditor',
                    'table' => false,
                ],
                'url' => [
                    'name' => 'url',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => '',
                    // 'rule' => 'max:' . config('setting-developer.seo_url_max')
                    // . '|regex:/^[a-z0-9-]+$/',
                    'help' => 'Url should be unique, contain [a-z, 0-9, -], required for seo',
                    'form_type' => '',
                    'table' => false,
                ],
                'keywords' => [
                    'name' => 'keywords',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Keywords is optional and is not important for google',
                    'form_type' => '',
                    'table' => false,
                ],
                'activated' => [
                    'name' => 'activated',
                    'type' => 'boolean',
                    'database' => 'default',
                    'rule' => 'boolean',
                    'help' => '',
                    'form_type' => 'switch-m', // switch-m, checkbox, switch-bootstrap-m
                    'table' => false,
                ],
                'google_index' => [
                    'name' => 'google_index',
                    'type' => 'boolean',
                    'database' => 'default',
                    'rule' => 'boolean',
                    'help' => 'Shows google robots will follow this link.',
                    'form_type' => 'checkbox',
                    'table' => false,
                ],
                'canonical_url' => [
                    'name' => 'canonical_url',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Canonical url is neccessary if one content will show from two different urls.',
                    'form_type' => '',
                    'table' => false,
                ],
                'icon' => [
                    'name' => 'icon',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => '',
                    'help' => 'Select Icon from https://themify.me/themify-icons',
                    'form_type' => '',
                    'table' => false,
                ],
                'full_name' => [
                    'name' => 'full_name',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => '',
                    'help' => '',
                    'form_type' => '',
                    'table' => false,
                ],
                'user_id' => [
                    'name' => 'user_id',
                    'type' => 'unsignedBigInteger',
                    'database' => 'nullable',
                    'relation' => 'users',
                    'rule' => 'nullable|exists:users,id',
                    'help' => '',
                    'form_type' => 'entity',
                    'class' => 'App\Models\User',
                    'property' => 'phone',
                    'property_key' => 'id',
                    'multiple' => false,
                    'table' => false,
                ],
                'language' => [
                    'name' => 'language',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => '',
                    'help' => 'Specify language.',
                    'form_type' => 'enum',
                    'form_enum_class' => 'AppLanguage',
                ],
                'order' => [
                    'name' => 'order',
                    'type' => 'integer',
                    'database' => 'nullable',
                    'rule' => 'nullable|numeric',
                    'help' => 'Sort by this column, lower order will be ahead',
                    'form_type' => '',
                    'table' => true,
                ],
                'file' => [
                    'name' => 'file',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Upload and select file from file manager',
                    'form_type' => 'file',
                    'file_manager' => true,
                    'file_accept' => 'file',
                    'file_multiple' => true,
                    'table' => false,
                ],
                'image' => [
                    'name' => 'image',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Upload and select image from file manager',
                    'form_type' => 'file',
                    'file_manager' => true,
                    'file_accept' => 'image', // file, image, video, audio, text
                    'file_multiple' => true,
                    'table' => true,
                ],
                'video' => [
                    'name' => 'video',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Upload and select video from file manager',
                    'form_type' => 'file',
                    'file_manager' => true,
                    'file_accept' => 'video',
                    'file_multiple' => true,
                    'table' => false,
                ],
                'audio' => [
                    'name' => 'audio',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Upload and select audio from file manager',
                    'form_type' => 'file',
                    'file_manager' => true,
                    'file_accept' => 'audio',
                    'file_multiple' => true,
                    'table' => false,
                ],
                'text' => [
                    'name' => 'text',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Upload and select text from file manager',
                    'form_type' => 'file',
                    'file_manager' => true,
                    'file_accept' => 'text',
                    'file_multiple' => true,
                    'table' => false,
                ],
            ];

            $columns = $this->columns;
            foreach($columns as $key => $column)
            {
                if(array_key_exists($column['name'], $default_columns)){
                    $columns[$key] = $default_columns[$column['name']];
                }
            }

            return $columns;
        });
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }

    public function scopeMine($query)
    {
        return $query->where('user_id', Auth::id());
    }

    public function scopeLanguage($query)
    {
        return $query->where('language', config('app.locale'));
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }

    public function file($title)
    {
        return $this->files()->where('title', $title)->first();
    }

    public function file_src($title)
    {
        return $this->files()->where('title', $title)->first()->src;
    }

    public function file_src_thumbnail($title)
    {
        return $this->files()->where('title', $title)->first()->src_thumbnail;
    }

    // public function getAssetImageAttribute()
    // {
    //     if(isset($this->image) && $this->image) {
    //         return asset($this->image);
    //     }

    //     return asset(config('setting-general.default_meta_image'));
    // }

    // protected $appends = ['file_upload', 'image_upload', 'video_upload', 'audio_upload', 'text_upload'];

    // public function getFileUploadAttribute(){
    //     $file = $this->files()->where('title', 'file_upload')->first();
    //     if($file){
    //         return $file->src;
    //     }
    //     return null;
    // }

    // public function getFileUploadOrDefaultAttribute(){
    //     $file_upload = $this->file_upload;
    //     if($file_upload){
    //         return $file_upload;
    //     }
    //     return asset(config('setting-general.default_user_image'));
    // }
}
