<?php

namespace App\Models;

use App\Services\BaseModel;

class Address extends BaseModel
{
    public $columns = [
        ['name' => 'full_name'],
        ['name' => 'activated'],
        ['name' => 'user_id'],
        ['name' => 'country'],
        ['name' => 'province'],
        ['name' => 'city'],
        ['name' => 'address'],
        ['name' => 'postal_code'],
        ['name' => 'phone'],
        ['name' => 'telephone'],
        ['name' => 'latitude'],
        ['name' => 'longitude'],
    ];
}
