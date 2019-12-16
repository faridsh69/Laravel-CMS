<?php

namespace App\Models;

use Actuallymab\LaravelComment\Models\Comment as CommentSpatie;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends CommentSpatie
{
	use SoftDeletes;

    public $columns = [
        // blog id
        [
	        'name' => 'commentable_id',
	        'type' => 'bigInteger',
	        'database' => '',
	        'relation' => 'blogs',
	        'rule' => 'required|exists:blogs,id',
	        'help' => 'Blog url that is commented.',
	        'form_type' => 'entity',
            'class' => 'App\Models\Blog',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
	        'table' => false,
	    ],
        // user id
        [
            'name' => 'commented_id',
            'type' => 'bigInteger',
            'database' => '',
            'relation' => 'users',
            'rule' => 'nullable|exists:users,id',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        // comment
        [
            'name' => 'comment',
            'type' => 'text',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'blog_id',
            'type' => 'string',
            'database' => 'none',
            'rule' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        // user name show in admin table
        [
            'name' => 'author',
            'type' => 'string',
            'database' => 'none',
            'rule' => 'none',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
        [
            'name' => 'approved',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
    ];

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    protected $appends = [
        'activated',
    ];

    public function getActivatedAttribute()
    {
        return $this->approved;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'commented_id', 'id');
    }

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog', 'commentable_id', 'id');
    }

    // $user->comment(Commentable $model, $comment = '', $rate = 0);
    // $product->comments[0]->approve();
    // $product->averageRate();
    // $product->totalCommentsCount();
}
