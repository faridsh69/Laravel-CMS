<?php

namespace App\Base;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
	public function run()
	{
	    $models = [
	        'Blog', 'Page',
	    ];

	    foreach($models as $model) {
	        factory('App\\Models\\' . $model, 8)->create();
	    }
	}
}
