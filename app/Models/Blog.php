<?php

namespace App\Models;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use App\Services\BaseModel;
use Conner\Tagging\Taggable;

class Blog extends BaseModel implements Commentable
{
    use Taggable;
    use HasComments;

    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'content'],
        ['name' => 'keywords'],
        ['name' => 'image'],
        ['name' => 'activated'],
        ['name' => 'google_index'],
        ['name' => 'canonical_url'],
        [
            'name' => 'category_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'categories',
            'rule' => 'nullable|exists:categories,id',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Category',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'tags',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Tag',
            'property' => 'name',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
        [
            'name' => 'related_blogs',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Blog',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
        ['name' => 'language'],
    ];

    public function canBeRated(): bool
    {
        return true;
    }

    public function mustBeApproved(): bool
    {
        return false;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function related_blogs()
    {
        return $this->belongsToMany('App\Models\Blog', 'related_blogs', 'blog_id', 'related_blog_id');
    }
}
