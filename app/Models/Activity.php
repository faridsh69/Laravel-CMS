<?php

namespace App\Models;

use App\Services\BaseModel;

class Activity extends BaseModel
{
    public $columns = [
        ['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'user_id'],
        ['name' => 'activated'],
        [
            'name' => 'activitiable_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'activitiable_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'properties',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
    ];

    public function activitiable()
    {
        return $this->morphTo();
    }

    public function performedOn($model)
    {
        $this->activitiable_type = 'Blog';
        $this->activitiable_id = 1;

        return $this;
    }

    public function causedBy($user)
    {
        if($user){
            $this->user_id = $user->id;
        }

        return $this;
    }

    public function log($description)
    {
        $this->description = $description;
        $this->save();

        return $this;
    }
}
