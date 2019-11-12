<?php

namespace App\Base;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
	public function run()
	{
		$models = config('services.models.seeder');

	    foreach($models as $model) {
	    	$model_class_name = 'App\\Models\\' . ucfirst($model);
	    	$repository = new $model_class_name();
	    	// if repository is empty then it will generate fake data
	    	if(! $repository->first()){
	        	factory('App\\Models\\' . ucfirst($model), 5)->create();
	        }
	    }
	}
}
