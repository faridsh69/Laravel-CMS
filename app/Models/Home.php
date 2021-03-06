<?php

namespace App\Models;

use App\Services\BaseModel;

class Home extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'description'],
        ['name' => 'price'],
        ['name' => 'discount_price'],
        ['name' => 'city'],
        ['name' => 'address'],
        ['name' => 'phone'],
        ['name' => 'telephone'],
        ['name' => 'email'],
        ['name' => 'website'],
        ['name' => 'year'],
        ['name' => 'foundation'],
        ['name' => 'rooms'],
        ['name' => 'properties'],
        ['name' => 'content'],
        ['name' => 'image'],
        ['name' => 'video'],
        ['name' => 'activated'],
        ['name' => 'category_id'],
        ['name' => 'tags'],
        ['name' => 'relateds'],
        ['name' => 'language'],
    ];
}
