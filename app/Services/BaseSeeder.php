<?php

namespace App\Services;

use Illuminate\Database\Seeder;
use Str;

class BaseSeeder extends Seeder
{
	public function run()
	{
		$model_slugs = config('cms.seeder');

        foreach($model_slugs as $model_slug)
        {
            echo("Seeding " . $model_slug . '...');
            $model_name = Str::studly($model_slug);
            $model_namespace = config('cms.config.models_namespace'). $model_name;
            $model_repository = new $model_namespace();
	    	if($model_repository->first()){
	    		for($i = 0; $i < 4; $i ++){
		    		$fake_data = factory($model_namespace)->raw();
	        		$model_repository->saveWithRelations($fake_data);
	        	}
	        }
	        echo("Done!\n");
	    }
	}
}
