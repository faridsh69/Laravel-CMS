<?php

namespace App\Models;

use App\Services\BaseModel;
use Illuminate\Database\Eloquent\Relations\Relation;

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

    public function models()
    {
        return $this->belongsToMany(config('cms.config.models_namespace') . $this->type, 'taggables', 'tag_id', 'taggable_id');
    }

    // Relation::morphMap([
    //     'blogs' => 'App\Models\Blog',
    //     'products' => 'App\Models\Product',
    // ]);
}
