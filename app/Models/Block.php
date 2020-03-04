<?php

namespace App\Models;

use App\Services\BaseModel;

class Block extends BaseModel
{
    public $columns = [
        [
            'name' => 'type',
            'type' => 'string',
            'database' => '',
            'rule' => 'required',
            'help' => '',
            'form_type' => 'enum',
            'form_enum_class' => 'BlockType',
            'table' => true,
        ],
        ['name' => 'order'],
        ['name' => 'activated'],
        [
            'name' => 'show_all_pages',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => 'If this ckecked this block will show in all pages except below pages list',
            'form_type' => 'checkbox',
            'table' => false,
        ],
        [
            'name' => 'pages',
            'type' => 'array',
            'database' => 'none',
            'rule' => 'nullable',
            'help' => '',
            'form_type' => 'entity',
            'class' => 'App\Models\Page',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => true,
            'table' => false,
        ],
    ];

    public function pages()
    {
        return $this->belongsToMany('App\Models\Page', 'block_page', 'block_id', 'page_id');
    }

    public static function getPageBlocks($page_id)
    {
        $blocks = self::active()
            ->orderBy('order', 'asc')
            ->get();

        $output_blocks = [];
        foreach($blocks as $block)
        {
            if($block->show_all_pages && array_search($page_id, $block->pages->pluck('id')->toArray(), true) === false){
                $output_blocks[] = $block;
            }

            if(!$block->show_all_pages && array_search($page_id, $block->pages->pluck('id')->toArray(), true) !== false){
                $output_blocks[] = $block;
            }
        }

        return $output_blocks;
    }
}
