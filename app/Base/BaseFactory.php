<?php

namespace App\Base;

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

            $factory->define($class_name, function (Faker $faker) use ($columns) {
                $output = [];
                foreach($columns as $column){
                    $fake_data = null;

                    $name = $column['name'];
                    $type = $column['type'];
                    $form_type = $column['form_type'];
                    $database = isset($column['database']) ? $column['database'] : null;

                    if($name === 'url'){
                        $fake_data = 'fake-' . $faker->numberBetween($min = 1000, $max = 9999);
                    }
                    elseif($name === 'description'){
                        $fake_data = $faker->realText(100);
                    }
                    elseif($database === 'nullable' || $database === 'none'){
                        continue;
                    }
                    elseif($name === 'password'){
                        $password = $faker->realText(10);
                        $fake_data = $password;
                    }
                    elseif($name === 'content'){
                        $fake_data = '<h1>Fake h1</h1><h2>Fake h2</h2>' . $faker->realText(400);
                    }
                    elseif($form_type === 'email'){
                        $fake_data = $faker->unique()->safeEmail;
                    }
                    elseif($type === 'text'){
                        $fake_data = 'Fake ' . $faker->realText(400);
                    }
                    elseif($type === 'boolean'){
                        $fake_data = 0;
                    }
                    elseif($type === '' || $type === 'bigInteger' || $type === 'integer' || $type === 'tinyInteger'){
                        $fake_data = 1;
                    }
                    elseif($type === 'string'){
                        $fake_data = 'Fake ' . $faker->realText(20);
                    }
                    elseif($type === 'array'){
                        $fake_data = [];
                    }
                    elseif($type === 'files_array'){
                        $fake_data = [];
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
