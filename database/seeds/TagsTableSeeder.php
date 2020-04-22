<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = [
        	[
	        	'title' => 'Development',
        	],
        	[
	        	'title' => 'Movie',
        	],
        	[
	        	'title' => '2020',
        	],
        ];

    	foreach($tags as $tag)
    	{
        	Tag::firstOrCreate($tag);
    	}
    }
}
