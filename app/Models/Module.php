<?php

namespace App\Models;

use App\Services\BaseModel;

class Module extends BaseModel
{
	// title, description, content, icon, image, url, +block_type, parent_id, order, full_name, product_id, activated, language

    public $columns = [
    	[
            'name' => 'type',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => 'Every Module is used in one block type.',
            'form_type' => 'enum',
            'form_enum_class' => 'BlockType',
            'table' => true,
        ],
        ['name' => 'title'],
        ['name' => 'description'],
        ['name' => 'content'],
        ['name' => 'icon'],
        ['name' => 'image'],
        ['name' => 'url'],
        ['name' => 'full_name'],
        [
            'name' => 'parent_id',
            'type' => 'bigInteger',
            'database' => 'nullable',
            'relation' => 'modules',
            'rule' => 'nullable|exists:modules,id',
            'help' => 'Used for menu block type.',
            'table' => false,
        ],
        ['name' => 'order'],
        [
        	'name' => 'product_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'relation' => 'users',
            'rule' => 'nullable|exists:products,id',
            'help' => 'Used for products block type.',
            'form_type' => 'entity',
            'class' => 'App\Models\Product',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
        ['name' => 'activated'],
        ['name' => 'language'],
    ];
}
