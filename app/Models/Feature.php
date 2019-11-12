<?php

namespace App\Models;

use App\Base\BaseModel;

class Feature extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'icon'],
        ['name' => 'description'],
        ['name' => 'activated'],
    ];
}
