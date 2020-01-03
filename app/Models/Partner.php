<?php

namespace App\Models;

use App\Services\BaseModel;

class Partner extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'full_name'],
        ['name' => 'image'],
        ['name' => 'description'],
        ['name' => 'activated'],
    ];
}
