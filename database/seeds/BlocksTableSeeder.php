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
                'column' => 12,
                'widget_type' => 'menu',
                'widget_id' => 1,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
                'order' => 6,
            	'column' => 12,
            	'widget_type' => 'header',
            	'widget_id' => 2,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
                'id' => 17,
                'order' => 8,
                'column' => 12,
                'widget_type' => 'blogs',
                'widget_id' => 15,
                'page_id' => 6,
                'theme' => 'capp',
                'activated' => 1,
            ],
            [
            	'id' => 3,
                'order' => 9,
            	'column' => 12,
            	'widget_type' => 'content',
            	'widget_id' => 3,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
                'id' => 4,
                'order' => 13,
                'column' => 12,
                'widget_type' => 'features',
                'widget_id' => 4,
                'page_id' => 1,
                'theme' => 'capp',
                'activated' => 1,
            ],
            [
                'id' => 5,
                'order' => 14,
                'column' => 12,
                'widget_type' => 'application',
                'widget_id' => 5,
                'page_id' => 1,
                'theme' => 'capp',
                'activated' => 1,
            ],
            [
            	'id' => 6,
                'order' => 18,
            	'column' => 12,
            	'widget_type' => 'video',
            	'widget_id' => 6,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 7,
                'order' => 21,
            	'column' => 12,
            	'widget_type' => 'counting',
            	'widget_id' => 7,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 8,
                'order' => 24,
            	'column' => 12,
            	'widget_type' => 'products',
            	'widget_id' => 8,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 9,
                'order' => 27,
            	'column' => 12,
            	'widget_type' => 'pricing',
            	'widget_id' => 9,
            	'page_id' => 3,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 10,
                'order' => 30,
            	'column' => 12,
            	'widget_type' => 'feedback',
            	'widget_id' => 10,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 11,
                'order' => 33,
            	'column' => 12,
            	'widget_type' => 'subscribe',
            	'widget_id' => 11,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 12,
                'order' => 36,
            	'column' => 12,
            	'widget_type' => 'team',
            	'widget_id' => 12,
            	'page_id' => 2,
            	'theme' => 'capp',
            	'activated' => 0,
            ],
            [
            	'id' => 13,
                'order' => 41,
            	'column' => 12,
            	'widget_type' => 'contact',
            	'widget_id' => 13,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 14,
                'order' => 42,
            	'column' => 12,
            	'widget_type' => 'footer',
            	'widget_id' => 14,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
            	'id' => 15,
                'order' => 9999,
            	'column' => 12,
            	'widget_type' => 'loading',
            	'widget_id' => 15,
            	'page_id' => 1,
            	'theme' => 'capp',
            	'activated' => 1,
            ],
            [
                'id' => 16,
                'order' => 16,
                'column' => 12,
                'widget_type' => 'learn',
                'widget_id' => 15,
                'page_id' => 1,
                'theme' => 'capp',
                'activated' => 1,
            ],
            [
                'id' => 18,
                'order' => 40,
                'column' => 12,
                'widget_type' => 'map',
                'widget_id' => 15,
                'page_id' => 1,
                'theme' => 'capp',
                'activated' => 0,
            ],
        ];

        foreach($blocks as $block){
            unset($block['widget_id']);
            unset($block['theme']);
            Block::updateOrCreate(['id' => $block['id']], $block);
        }
    }
}
