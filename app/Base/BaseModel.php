<?php

namespace App\Base;

use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
                    'rule' => 'required|min:' . config('0-developer.seo_title_min')
                    . '|max:' . config('0-developer.seo_title_max'),
                    'help' => 'Title should be unique.',
                    'form_type' => '',
                    'table' => true,
                ],
                'url' => [
                    'name' => 'url',
                    'type' => 'string',
                    'database' => 'nullable', // blog, page, menu is required
                    'rule' => 'nullable|max:' . config('0-developer.seo_url_max') 
                    .'|regex:/^[a-z0-9-]+$/',
                    'help' => 'Url should be unique, contain [a-z, 0-9, -], required for seo',
                    'form_type' => '',
                    'table' => true,
                ],
                'description' => [
                    'name' => 'description',
                    'type' => 'text',
                    'database' => 'nullable',
                    'rule' => 'nullable',
                    'help' => 'Title should have 50 characters, maximum 160 characters.',
                    'form_type' => 'textarea',
                    'table' => true,
                ],
                'content' => [
                    'name' => 'content',
                    'type' => 'text',
                    'database' => '',
                    'rule' => 'required', // only page and blog need seo_header
                    'help' => '',
                    'form_type' => 'ckeditor',
                    'table' => false,
                ],
                'image' => [
                    'name' => 'image',
                    'type' => 'string',
                    'database' => 'nullable',
                    'rule' => 'nullable|max:191',
                    'help' => 'Select main image.',
                    'form_type' => 'image',
                    'table' => true,
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

    public function getImageAttribute($image)
    {
        if(isset($image)) {
            return $image; 
        }

        return config('0-general.default_meta_image');
    }

}