<?php

use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;

class ShopTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tags = [
        	[
	        	'name' => 'Fast Food',
        	],
        	[
	        	'name' => 'Restaurant',
        	],
        	[
	        	'name' => 'Coffee Shop',
        	],
        ];

    	foreach($tags as $tag)
    	{
        	Tag::firstOrCreate($tag);
    	}
    }
}
