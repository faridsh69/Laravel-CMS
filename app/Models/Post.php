<?php

namespace App\Models;

use App\Services\BaseModel;

class Post extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'content'],
        ['name' => 'user_image'],
        ['name' => 'user_video'],
        ['name' => 'activated'],
        ['name' => 'category_id'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];
}
