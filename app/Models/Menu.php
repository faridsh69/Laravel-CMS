<?php

namespace App\Models;

use App\Base\BaseModel;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends BaseModel
{
    use NodeTrait;

    public $columns = [
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'activated'],
        [
            'name' => 'location',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'enum',
            'form_enum_class' => 'MenuType',
            'table' => false,
        ],
        [
            'name' => 'parent_id',
            'type' => 'bigInteger',
            'database' => 'none',
            'relation' => 'menus',
            'rule' => 'nullable|exists:menus,id',
            'help' => '',
            'form_type' => 'none',
            'table' => true,
        ],
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->title;
    }
}
