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
                // create fake data for store in database
                $factory = new BaseFactory();
                $factory->setModelNameSlug($modelNameSlug);
                $fakeModel = $factory->make();
                $fakeData = $fakeModel->getAttributes();

        		$modelRepository->saveWithRelations($fakeData);
        	}
	        echo "Done!\n";
	    }
	}
}
