<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Blog extends Model
{
	use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
    	'created_at',
    	'updated_at',
        'deleted_at',
    ];

    // public $fillable = [
    //     'id', // integer - required - 
    //     'title', // string - required - unique:blogs,title - min:10|max:60
    //     'url', // string - required - max:80 - lowercase - alphabetic
    //     'short_content', // string - nullable - 
    //     'content', // text - required - find h1 1 done va != title - h2 - 
    //     'creator_id', // integer - required
    //     'editor_id', // integer - required
    //     'published', // boolean - default true - 
    //     'google_index', // boolean - default true -
    //     'meta_description', // string - required - min:70|max:320
    //     'keywords', // string - nullable
    //     'meta_image', // string - nullable ?!?! 
    //     'canonical_url', // string - nullable - url bashe 
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    public $fields = [
        ['name' => 'id', 'type' => 'increments', 'rule' => 'required'],
        // Url should be unique, contain lowercase characters and numbers and -
        ['name' => 'url', 'type' => 'string', 'rule' => 'required|unique:blogs,title|max:80|regex:/[a-z0-9-]/'],
        // Title should be unique, minimum 10 and maximum 60 characters.
        ['name' => 'title', 'type' => 'string', 'rule' => 'required|unique:blogs,title|min:10|max:60'],
        // Short content will show in lists instead of content.
        ['name' => 'short_content', 'type' => 'string', 'rule' => 'nullable|max:191'],
        ['name' => 'content', 'type' => 'text', 'rule' => 'required|seo_header'],
        // Meta description should have minimum 70 and maximum 191 characters.
        ['name' => 'meta_description', 'type' => 'string', 'rule' => 'required|min:70|max:191'],
        ['name' => 'keywords', 'type' => 'string', 'rule' => 'nullable|max:191'],
        ['name' => 'meta_image', 'type' => 'string', 'rule' => 'nullable|max:191|url'],
        ['name' => 'published', 'type' => 'boolean', 'rule' => 'required'],
        // Google will index this page
        ['name' => 'google_index', 'type' => 'boolean', 'rule' => 'required'],
        // Canonical url just used for duplicate contents, they should have same canonical url 
        ['name' => 'canonical_url', 'type' => 'string', 'rule' => 'nullable|max:191|url'],
        ['name' => 'creator_id', 'type' => 'integer', 'rule' => 'required'],
        ['name' => 'editor_id', 'type' => 'integer', 'rule' => 'required'],
        ['name' => 'created_at', 'type' => 'datetime', 'rule' => 'required'],
        ['name' => 'updated_at', 'type' => 'datetime', 'rule' => 'required'],
        ['name' => 'deleted_at', 'type' => 'datetime', 'rule' => 'nullable'],
    ];

    public function editor()
    {
        return $this->belongsTo('App\Models\User', 'editor_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('published', true);
    }

    public function scopeMine($query)
    {
        return $query->where('editor_id', \Auth::id());
    }

    public static function getFillables()
    {
    	return (new self)->fillable;
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->published = $model->published ? 1 : 0;
            $model->google_index = $model->google_index ? 1 : 0;
            $model->creator_id = Auth::id() ? Auth::id() : 1;
            $model->editor_id = Auth::id() ? Auth::id() : 1;
        });

        self::updating(function($model){
            $model->published = $model->published ? 1 : 0;
            $model->google_index = $model->google_index ? 1 : 0;
            $model->creator_id = Auth::id() ? Auth::id() : 1;
            $model->editor_id = Auth::id() ? Auth::id() : 1;
        });
    }
}
