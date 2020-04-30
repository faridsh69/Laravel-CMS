<?php

namespace App\Models;

use App\Services\BaseModel;

class Music extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'country'],
        ['name' => 'year'],
        ['name' => 'singer'],
        ['name' => 'properties'],
        ['name' => 'content'],
        ['name' => 'audio'],
        ['name' => 'image'],
        ['name' => 'activated'],
        ['name' => 'category_id'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];
}
