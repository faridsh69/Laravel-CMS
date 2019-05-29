<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	use SoftDeletes;
    use Taggable;

    public $guarded = [];

    public $columns = [
        [
            'name' => 'title1',
            'type' => 'string',
            'rule' => 'unique',
            'validation' => 'required|max:190|min:10|unique:pages,title1,',
            // 'help' => 'Title should be unique, minimum 10 and maximum 60 characters.',
        ],
        [
            'name' => 'url2',
            'type' => 'integer',
            'rule' => 'unsigned',
            'validation' => 'required|numeric|max:40',
            'help' => 'required|numeric|max:40',
        ],
        [
            'name' => 'short_content3',
            'type' => 'integer',
            'rule' => 'nullable',
            'validation' => 'required|digits:5',
            'help' => 'required|digits:5',
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'validation' => 'required',
            'table' => true,
        ],
        [
            'name' => 'meta_description5',
            'type' => 'string',
            'validation' => 'required|exists:users,id',
            'help' => 'required|exists:users,id',
            'table' => true,
        ],
        [
            'name' => 'keywords6',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191',
            'help' => 'Its not important for google anymore',
        ],
        [
            'name' => 'meta_image7',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191|url',
            'help' => 'Meta image shows when this page is shared in social networks.',
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'rule' => 'default',
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'rule' => 'default',
            'help' => 'Google will index this page.',
        ],
        [
            'name' => 'canonical_url10',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191|url',
            'help' => 'Canonical url just used for seo redirect duplicate contents.',
        ],
    ];

    protected $hidden = [
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
            $model->google_index = $model->google_index ? 1 : 0;
        });

        self::updating(function($model){
            $model->activated = $model->activated ? 1 : 0;
            $model->google_index = $model->google_index ? 1 : 0;
        });
    }
}
