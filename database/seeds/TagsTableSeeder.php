<?php

use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = [
        	[
	        	'name' => 'Development',
        	],
        	[
	        	'name' => 'Movie',
        	],
        	[
	        	'name' => '2020',
        	],
        ];

    	foreach($tags as $tag)
    	{
        	Tag::firstOrCreate($tag);
    	}
    }
}
