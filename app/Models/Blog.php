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
        ['name' => 'category_id'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];

    public function related_blogs()
    {
        return $this->belongsToMany(Blog::class, 'related_blogs', 'blog_id', 'related_blog_id');
    }
}
