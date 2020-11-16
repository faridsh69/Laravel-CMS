<?php

namespace App\Models;

use App\Services\BaseModel;

class Product extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'category_id'],
        ['name' => 'content'],
        [
            'name' => 'images',
            'same_column_name' => 'admin_filemanager_image',
        ],
        [
            'name' => 'videos',
            'same_column_name' => 'admin_filemanager_video',
        ],
        ['name' => 'images'],
        ['name' => 'admin_videos'],
        ['name' => 'activated'],
        ['name' => 'price'],
        ['name' => 'discount_price'],
        [
            'name' => 'inventory',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        ['name' => 'order'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];
}
