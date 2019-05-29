<?php

namespace App\Base;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
	public function run()
	{
		$models = config('services.models');
	    foreach($models as $model) {
	    	if($model === 'tag'){
	    		break;
	    	}
	        factory('App\\Models\\' . ucfirst($model), 10)->create();
	    }
	}
}
