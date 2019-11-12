<?php

use App\Models\Block;
use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $blocks = [
            [
            	'id' => 1,
                'order' => 3,
                'widget_type' => 'menu',
                'show_all_pages' => 1,
            	'pages_list' => [],
            	'activated' => 1,
            ],
            [
            	'id' => 2,
                'order' => 6,
            	'widget_type' => 'header',
                'show_all_pages' => 0,
                'pages_list' => [1],
            	'activated' => 1,
            ],
            [
                'id' => 3,
                'order' => 9,
                'widget_type' => 'header',
                'title' => 'header-page',
                'show_all_pages' => 1,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 4,
                'order' => 12,
                'widget_type' => 'blogs',
                'show_all_pages' => 0,
                'pages_list' => [6],
                'activated' => 1,
            ],
            [
                'id' => 5,
                'order' => 15,
                'widget_type' => 'features',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 6,
                'order' => 18,
            	'widget_type' => 'content',
                'show_all_pages' => 1,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 7,
                'order' => 21,
                'widget_type' => 'application',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 8,
                'order' => 24,
            	'widget_type' => 'video',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 9,
                'order' => 27,
            	'widget_type' => 'counting',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 10,
                'order' => 30,
            	'widget_type' => 'products',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 11,
                'order' => 33,
            	'widget_type' => 'pricing',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 0,
            ],
            [
            	'id' => 12,
                'order' => 36,
            	'widget_type' => 'feedback',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 13,
                'order' => 39,
                'widget_type' => 'learn',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 14,
                'order' => 42,
            	'widget_type' => 'subscribe',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
            	'id' => 15,
                'order' => 45,
            	'widget_type' => 'team',
                'show_all_pages' => 0,
                'pages_list' => [],
                'activated' => 0,
            ],
            [
                'id' => 16,
                'order' => 48,
                'widget_type' => 'map',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 0,
            ],
            [
            	'id' => 17,
                'order' => 51,
            	'widget_type' => 'contact',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
            	'id' => 18,
                'order' => 54,
            	'widget_type' => 'footer',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
            	'id' => 19,
                'order' => 57,
            	'widget_type' => 'loading',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
        ];

        foreach($blocks as $block){
            $block_model = Block::updateOrCreate(['id' => $block['id']], 
                [
                    'title' => isset($block['title']) ? $block['title'] : $block['widget_type'],
                    'order' => $block['order'],
                    'widget_type' => $block['widget_type'],
                    'show_all_pages' => $block['show_all_pages'],
                    'activated' => $block['activated'],
                ]
            );
            $block_model->pages()->sync($block['pages_list'], true);
        }
    }
}
