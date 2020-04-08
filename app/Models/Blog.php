<?php

namespace App\Models;

use App\Services\BaseModel;

class Blog extends BaseModel
{
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
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'relation' => 'categories',
            'rule' => 'nullable|exists:categories,id',
            'help' => '',
            'form_type' => 'entity',
            'class' => Category::class,
            'property' => 'title',
            'property_key' => 'id',
            'query_builder' => 'type|blog',
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
            'class' => Tag::class,
            'property' => 'title',
            'property_key' => 'id',
            'query_builder' => 'type|blog',
            'multiple' => true,
            'table' => false,
        ],

        // [
        //     'name' => 'related_blogs',
        //     'type' => 'array',
        //     'database' => 'none',
        //     'rule' => 'nullable',
        //     'help' => '',
        //     'form_type' => 'entity',
        //     'class' => Blog::class,
        //     'property' => 'title',
        //     'property_key' => 'id',
        //     'multiple' => true,
        //     'table' => false,
        // ],
        ['name' => 'language'],
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'model_tag', 'model_id', 'tag_id');
    }

    public function related_blogs()
    {
        return $this->belongsToMany(Blog::class, 'related_blogs', 'blog_id', 'related_blog_id');
    }
}
