<?php

namespace App\Base;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
	public function run()
	{
		$models = Config::get('services.models');

	    foreach($models as $model) {
	        factory('App\\Models\\' . ucfirst($model), 10)->create();
	    }
	}
}
