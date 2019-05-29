<?php

namespace App\Base;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
	public function run()
	{
	    $models = [
			'blog', // 1
			'page', // 2
			// -- 'category', // 3
			// -- 'tag', // 4 
			// -- 'media', // 5 
			// 'comment', // 6
			// setting 7 
			// -- 'user', // 8 
			// 'theme', // 9 
			// 'block', // 10
			// 'widget', // 11
			// seo 12 
			// 'form', // 13
			// -- 'report', // 14
			// 'notification', // 15
			// 'menu', // 16
		];

	    foreach($models as $model) {
	        factory('App\\Models\\' . ucfirst($model), 10)->create();
	    }
	}
}
