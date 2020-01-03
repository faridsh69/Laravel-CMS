<?php

namespace App\Models;

use App\Services\BaseModel;

class Feature extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'icon'],
        ['name' => 'description'],
        ['name' => 'activated'],
    ];
}
