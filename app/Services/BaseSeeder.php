<?php

namespace App\Services;

use Illuminate\Database\Seeder;
use Str;

class BaseSeeder extends Seeder
{
	public function run()
	{
		$model_names = config('cms.seeder');

        foreach($model_names as $model_name)
        {
            echo("Seeding " . $model_name . '...');
            $model_name = Str::studly($model_name);
            $class_name = 'App\\Models\\' . $model_name;
            $repository = new $class_name();
	    	if($repository->first()){
	    		for($i = 0; $i < 4; $i ++){
		    		$fake_data = factory($class_name)->raw();
	        		$repository->saveWithRelations($fake_data);
	        	}
	        }
	        echo("Done!\n");
	    }
	}
}
