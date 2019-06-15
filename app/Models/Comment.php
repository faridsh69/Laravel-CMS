<?php

namespace App\Models;

use Actuallymab\LaravelComment\Models\Comment as CommentSpatie;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends CommentSpatie
{
	use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    protected $appends = ['activated'];

    public function getActivatedAttribute()
    {
        return $this->approved;
    }

    public $columns = [
        [
	        'name' => 'commented_id',
	        'type' => 'bigInteger',
	        'database' => 'nullable',
	        'relation' => 'blogs',
	        'rule' => 'nullable|exists:blogs,id',
	        'help' => '',
	        'form_type' => 'none',
	        'table' => false,
	    ],
	    [
	        'name' => 'commentable_id',
	        'type' => 'bigInteger',
	        'database' => 'nullable',
	        'relation' => 'users',
	        'rule' => 'nullable|exists:users,id',
	        'help' => '',
	        'form_type' => 'none',
	        'table' => false,
	    ],
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
            'name' => 'blog_url',
            'type' => 'string',
            'database' => 'none',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Blog',
            'property' => 'url',
            'property_key' => 'id',
            'multiple' => false,
            'table' => true,
        ],
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
            'form_type' => 'none', // switch-m
            'table' => false,
        ],
    ];

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
