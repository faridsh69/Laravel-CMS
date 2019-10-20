<?php

namespace App\Models;

use App\Base\BaseModel;

class Answer extends BaseModel
{    
    // content, user_id, field_id, form_id, shop_id,
    public $columns = [
        [
            'name' => 'content',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'user_id',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'table' => false,
        ],
        [
            'name' => 'shop_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'shops',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Shop',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'field_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'fields',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Field',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        [
            'name' => 'form_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'forms',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Form',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
    ];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id', 'id');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\Field', 'field_id', 'id');
    }

    public function form()
    {
        return $this->belongsTo('App\Models\Form', 'form_id', 'id');
    }
}
