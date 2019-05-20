<?php

use Illuminate\Database\Seeder;
use Conner\Tagging\Model\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
