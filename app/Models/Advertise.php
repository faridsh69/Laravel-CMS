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
            'same_column_name' => 'admin_filemanager_image',
        ],
        [
            'name' => 'buyer_images',
            'same_column_name' => 'user_upload_image',
        ],
        [
            'name' => 'factory_videos',
            'same_column_name' => 'admin_filemanager_video',
        ],
        [
            'name' => 'buyer_videos',
            'same_column_name' => 'user_upload_video',
        ],
        [
            'name' => 'factory_audios',
            'same_column_name' => 'admin_filemanager_audio',
        ],
        [
            'name' => 'buyer_audios',
            'same_column_name' => 'user_upload_audio',
        ],
        ['name' => 'activated'],
        ['name' => 'category_id'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];
}
