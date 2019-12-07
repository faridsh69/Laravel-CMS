<?php

use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;

class CmsTagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = [
        	[
	        	'name' => 'Energy',
        	],
        	[
	        	'name' => 'Solar',
        	],
        	[
	        	'name' => 'Electric',
        	],
        ];

    	foreach($tags as $tag)
    	{
        	Tag::firstOrCreate($tag);
    	}
    }
}
