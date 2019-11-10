<?php

use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;

class DefaultTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tags = [
        	[
	        	'name' => 'Blog Tag 1',
        	],
        	[
	        	'name' => 'Blog Tag 2',
        	],
        	[
	        	'name' => 'Blog Tag 3',
        	],
        ];

    	foreach($tags as $tag)
    	{
        	Tag::firstOrCreate($tag);
    	}
    }
}
