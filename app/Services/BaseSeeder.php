<?php

namespace App\Services;

use Illuminate\Database\Seeder;
use Str;

class BaseSeeder extends Seeder
{
	public function run()
	{
		$modelNameSlugs = config('cms.seeder');

        foreach($modelNameSlugs as $modelNameSlug)
        {
            echo 'Seeding ' . $modelNameSlug . '...';
            $modelName = Str::studly($modelNameSlug);
            $modelNamespace = config('cms.config.models_namespace') . $modelName;
            $modelRepository = new $modelNamespace();
    		for($i = 0; $i < 4; $i ++){
	    		$fake_data = factory($modelNamespace)->raw();
        		$modelRepository->saveWithRelations($fake_data);
        	}
	        echo "Done!\n";
	    }
	}
}
