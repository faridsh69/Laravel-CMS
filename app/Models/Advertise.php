<?php

namespace App\Models;

use App\Services\BaseModel;

class Advertise extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'price'],
        ['name' => 'discount_price'],
        ['name' => 'color'],
        ['name' => 'year'],
        ['name' => 'properties'],
        ['name' => 'content'],
        [
            'name' => 'factory_images',
            'same_column_name' => 'image',
        ],
        [
            'name' => 'buyer_images',
            'same_column_name' => 'user_image',
        ],
        [
            'name' => 'factory_videos',
            'same_column_name' => 'video',
        ],
        [
            'name' => 'buyer_videos',
            'same_column_name' => 'user_video',
        ],
        [
            'name' => 'factory_audios',
            'same_column_name' => 'audio',
        ],
        [
            'name' => 'buyer_audios',
            'same_column_name' => 'user_audio',
        ],
        ['name' => 'activated'],
        ['name' => 'category_id'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];
}
