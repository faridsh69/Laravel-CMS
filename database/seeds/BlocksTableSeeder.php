<?php

use Illuminate\Database\Seeder;
use App\Models\Block;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$blocks = [
            [
            	'id' => 1,
            	'column' => 12,
            	'widget_type' => 'menu',
            	'widget_id' => 1,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'column' => 12,
            	'widget_type' => 'header',
            	'widget_id' => 2,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'column' => 12,
            	'widget_type' => 'content',
            	'widget_id' => 3,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
                  'id' => 4,
                  'column' => 12,
                  'widget_type' => 'features',
                  'widget_id' => 4,
                  'page_id' => 1,
                  'theme' => 'ca',
                  'activated' => 1,
            ],
            [
                  'id' => 5,
                  'column' => 12,
                  'widget_type' => 'application',
                  'widget_id' => 5,
                  'page_id' => 1,
                  'theme' => 'ca',
                  'activated' => 1,
            ],
            [
            	'id' => 6,
            	'column' => 12,
            	'widget_type' => 'video',
            	'widget_id' => 6,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 7,
            	'column' => 12,
            	'widget_type' => 'counting',
            	'widget_id' => 7,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 8,
            	'column' => 12,
            	'widget_type' => 'products',
            	'widget_id' => 8,
            	'page_id' => 3,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 9,
            	'column' => 12,
            	'widget_type' => 'pricing',
            	'widget_id' => 9,
            	'page_id' => 3,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 10,
            	'column' => 12,
            	'widget_type' => 'feedback',
            	'widget_id' => 10,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 11,
            	'column' => 12,
            	'widget_type' => 'subscribe',
            	'widget_id' => 11,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 12,
            	'column' => 12,
            	'widget_type' => 'team',
            	'widget_id' => 12,
            	'page_id' => 2,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 13,
            	'column' => 12,
            	'widget_type' => 'contact',
            	'widget_id' => 13,
            	'page_id' => 5,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 14,
            	'column' => 12,
            	'widget_type' => 'footer',
            	'widget_id' => 14,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 15,
            	'column' => 12,
            	'widget_type' => 'loading',
            	'widget_id' => 15,
            	'page_id' => 1,
            	'theme' => 'ca',
            	'activated' => 1,
            ],
        ];
        
        foreach($blocks as $block){
            Block::updateOrCreate(['id' => $block['id']], $block);
        }
    }
}
