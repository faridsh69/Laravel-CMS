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
                'type' => 'menu',
                'show_all_pages' => 1,
            	'pages_list' => [],
            	'activated' => 1,
            ],
            [
            	'id' => 2,
                'order' => 6,
            	'type' => 'header',
                'show_all_pages' => 0,
                'pages_list' => [1],
            	'activated' => 1,
            ],
            [
                'id' => 3,
                'order' => 9,
                'type' => 'header',
                'title' => 'header-page',
                'show_all_pages' => 1,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 4,
                'order' => 12,
                'type' => 'blogs',
                'show_all_pages' => 0,
                'pages_list' => [4],
                'activated' => 1,
            ],
            [
                'id' => 5,
                'order' => 15,
                'type' => 'features',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 6,
                'order' => 18,
            	'type' => 'content',
                'show_all_pages' => 1,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 7,
                'order' => 21,
                'type' => 'application',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 8,
                'order' => 24,
            	'type' => 'video',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 9,
                'order' => 27,
            	'type' => 'counting',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 10,
                'order' => 30,
            	'type' => 'products',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 11,
                'order' => 33,
            	'type' => 'pricing',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 0,
            ],
            [
            	'id' => 12,
                'order' => 36,
            	'type' => 'feedback',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 13,
                'order' => 39,
                'type' => 'learn',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 14,
                'order' => 42,
            	'type' => 'subscribe',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 0,
            ],
            [
            	'id' => 15,
                'order' => 45,
            	'type' => 'team',
                'show_all_pages' => 0,
                'pages_list' => [],
                'activated' => 0,
            ],
            [
                'id' => 16,
                'order' => 48,
                'type' => 'map',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 0,
            ],
            [
            	'id' => 17,
                'order' => 51,
            	'type' => 'contact',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
            	'id' => 18,
                'order' => 54,
            	'type' => 'footer',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
            	'id' => 19,
                'order' => 57,
            	'type' => 'loading',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
        ];

        foreach($blocks as $block){
            $block_model = Block::updateOrCreate(
                ['id' => $block['id']],
                [
                    'title' => isset($block['title']) ? $block['title'] : $block['type'],
                    'order' => $block['order'],
                    'type' => $block['type'],
                    'show_all_pages' => $block['show_all_pages'],
                    'activated' => $block['activated'],
                ]
            );
            $block_model->pages()->sync($block['pages_list'], true);
        }
    }
}
