<?php

namespace App\Models;

use App\Base\BaseModel;

class Service extends BaseModel
{
    // title, description, image, activated
    public $columns = [
        ['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'image'],
        ['name' => 'activated'],
    ];
}
