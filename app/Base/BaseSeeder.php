<?php

namespace App\Base;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
	public function run()
	{
		$models = config('services.models.seeder');
		
	    foreach($models as $model) {
	        factory('App\\Models\\' . ucfirst($model), 3)->create();
	    }
	}
}

// $models = [
// 	'blog', // 1 +
//        'page', // 2 +
//        'tag', // 4  
//        'menu', // 16
//        // 'comment', // 6
//        // 'form', // 13
//        // 'block', // 10
//        // 'widget', // 11
//        // // 'media', // 5  
//        // // 'setting', // 7 + 
//        // // 'seo' // 12 
//        // // 'user', // 8 
//        // // 'report', // 14
//        // // 'notification', // 15
//        // // 'theme', // 9 
//    ];