<?php

namespace App\Models;

use App\Services\BaseModel;

class Tag extends BaseModel
{
    public $columns = [
        [
            'name' => 'type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => 'This tag is for which models?',
            'form_type' => 'enum',
            'form_enum_class' => 'ModelType',
            'table' => true,
        ],
        ['name' => 'title'],
        ['name' => 'url'],
        ['name' => 'icon'],
        ['name' => 'activated'],
        ['name' => 'language'],
    ];

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function models()
    {
        return $this->belongsToMany('App\\Models\\' . ucfirst($this->type), 'model_tag', 'tag_id', 'model_id');
    }
}
