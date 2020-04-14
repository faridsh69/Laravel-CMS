<?php

namespace App\Services;

use Faker\Generator as Faker;

class BaseFactory
{
    public function index($factory)
    {
        $factory_models = config('services.models.factory');

        foreach($factory_models as $factory_model)
        {
            $model_name = ucfirst($factory_model);
            $class_name = 'App\\Models\\' . $model_name;
            $model = new $class_name();
            $columns = $model->getColumns();

            $factory->define($class_name, function (Faker $faker) use ($columns, $model_name) {
                $output = [];
                $random_int = rand(1000, 9999);
                $images = [];
                $random_count = rand(0,3);
                for($i = 0; $i < $random_count; $i ++){
                    $images[] = asset('images/front/general/'. $i. '.png');
                }
                foreach($columns as $column){
                    $fake_data = null;

                    $name = $column['name'];
                    $type = $column['type'];
                    $form_type = $column['form_type'];
                    $database = isset($column['database']) ? $column['database'] : null;
                    $file_accept = isset($column['file_accept']) ? $column['file_accept'] : null;

                    if($name === 'url'){
                        // $fake_data = 'fake-' . $faker->slug();
                        $fake_data = $model_name. '-url-'. $random_int;
                    }
                    elseif($name === 'title'){
                        // $fake_data = $faker->jobTitle();
                        $fake_data = $model_name. ' title '. $random_int;
                    }
                    elseif($name === 'description'){
                        $fake_data = $faker->realText(100);
                    }
                    elseif($name === 'content'){
                        $fake_data = '<h1>h1</h1><h2>h2</h2>' . $faker->realText(400);
                    }
                    elseif($name === 'canonical_url'){
                        $fake_data = null;
                    }
                    elseif($name === 'activated'){
                        $fake_data = 1;
                    }
                    elseif($form_type === 'file' && $file_accept === 'image'){
                        $fake_data = implode('|||', $images);
                    }
                    elseif($name === 'keywords'){
                        $fake_data = $faker->realText(100);
                    }
                    elseif($name === 'icon'){
                        $fake_data = $faker->word();
                    }
                    elseif($name === 'full_name'){
                        $fake_data = $faker->name();
                    }
                    elseif($name === 'phone' || $name === 'telephone'){
                        $fake_data = '+989120568203';
                    }
                    elseif($name === 'national_code'){
                        $fake_data = '1270739034';
                    }
                    elseif($name === 'postal_code'){
                        $fake_data = '18321';
                    }
                    elseif($name === 'country'){
                        $fake_data = $faker->countryCode();
                    }
                    elseif($name === 'province'){
                        $fake_data = $faker->state();
                    }
                    elseif($name === 'city'){
                        $fake_data = $faker->city();
                    }
                    elseif($name === 'address'){
                        $fake_data = $faker->address();
                    }
                    elseif($name === 'latitude'){
                        $fake_data = $faker->latitude();
                    }
                    elseif($name === 'longitude'){
                        $fake_data = $faker->longitude();
                    }
                    elseif($name === 'email'){
                        $fake_data = $faker->email();
                    }
                    elseif($name === 'language'){
                        $fake_data = 'en';
                    }
                    elseif($name === 'password'){
                        $password = $faker->realText(10);
                        $fake_data = $password;
                    }
                    elseif($type === 'array'){
                        $random_related_count = rand(2, 4);
                        $fake_data = range(1, $random_related_count);
                    }
                    elseif($database === 'none'){
                        continue;
                    }
                    elseif($type === 'text'){
                        $fake_data = 'Fake ' . $faker->realText(400);
                    }
                    elseif($type === 'boolean'){
                        $fake_data = 0;
                    }
                    elseif($type === '' || $type === 'bigInteger' || $type === 'integer' || $type === 'tinyInteger' || $type === 'unsignedBigInteger'){
                        $fake_data = 1;
                    }
                    elseif($type === 'string'){
                        $fake_data = 'Fake ' . $faker->realText(20);
                    }

                    $output[$name] = $fake_data;
                }

                // if fake user is generation it needs confirmation password
                if(isset($password)){
                    $output['password_confirmation'] = $password;
                }

                return $output;
            });
        }
    }
}
