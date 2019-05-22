<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
        	[
        		'id' => 1,
	        	'name' => 'category 1',
	        	'parent_id' => '0',
        	],
        	[
        		'id' => 2,
	        	'name' => 'category 2',
	        	'parent_id' => '0',
        	],
        	[
        		'id' => 3,
	        	'name' => 'sub category 1-1',
	        	'parent_id' => '1',
        	],
        ];

    	foreach($categories as $category)
    	{
        	Category::updateOrCreate(['id' => $category['id']], $category);
    	}
    }
}
