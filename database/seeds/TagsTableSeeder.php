<?php

use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tags = [
        	[
	        	'name' => 'tag 1',
        	],
        	[
	        	'name' => 'tag 2',
	        	'slug' => 'tagg2',
        	],
        	[
	        	'name' => 'tag 3',
	        	'slug' => 'tagg3',
        	],
        ];

    	foreach($tags as $tag)
    	{
        	Tag::firstOrCreate($tag);
    	}
    }
}
