<?php

use App\Models\Block;
use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
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
                'type' => 'breadcrumb',
                'show_all_pages' => 1,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 4,
                'order' => 12,
                'type' => 'main_feature',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 5,
                'order' => 15,
                'type' => 'feature',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 6,
                'order' => 18,
            	'type' => 'content',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
                'id' => 7,
                'order' => 21,
                'type' => 'introduce',
                'show_all_pages' => 0,
                'pages_list' => [1, 2],
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
            	'type' => 'product',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 11,
                'order' => 33,
                'type' => 'service',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 12,
                'order' => 36,
            	'type' => 'pricing',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 13,
                'order' => 39,
            	'type' => 'testimonial',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 14,
                'order' => 42,
                'type' => 'faq',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 15,
                'order' => 45,
                'type' => 'partner',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
                'id' => 16,
                'order' => 48,
                'type' => 'team',
                'show_all_pages' => 0,
                'pages_list' => [2], // about page
                'activated' => 1,
            ],
            [
                'id' => 17,
                'order' => 51,
                'type' => 'blog',
                'show_all_pages' => 0,
                'pages_list' => [1],
                'activated' => 1,
            ],
            [
            	'id' => 18,
                'order' => 54,
            	'type' => 'subscribe',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],            
            [
                'id' => 19,
                'order' => 57,
                'type' => 'map',
                'show_all_pages' => 0,
                'pages_list' => [3], // contact page
                'activated' => 0,
            ],
            [
            	'id' => 20,
                'order' => 60,
            	'type' => 'contact',
                'show_all_pages' => 0,
                'pages_list' => [3], // contact page
                'activated' => 1,
            ],
            [
            	'id' => 21,
                'order' => 63,
            	'type' => 'footer',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
                'id' => 22,
                'order' => 66,
                'type' => 'loading',
                'show_all_pages' => 1,
                'pages_list' => [],
                'activated' => 1,
            ],
            [
                'id' => 23,
                'order' => 11,
                'type' => 'form',
                'show_all_pages' => 0,
                'pages_list' => [4], // job page
                'activated' => 1,
            ],
        ];

        foreach($blocks as $block){
            $block_model = Block::updateOrCreate(
                ['id' => $block['id']],
                [
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
