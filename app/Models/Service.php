<?php

namespace App\Models;

use App\Services\BaseModel;

class Service extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'image'],
        ['name' => 'activated'],
        ['name' => 'language'],
    ];
}
