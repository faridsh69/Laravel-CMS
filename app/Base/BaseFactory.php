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
                    $rule = isset($column['rule']) ? $column['rule'] : null;
                    $database = isset($column['database']) ? $column['database'] : '';

                    // $string_length = $this->checkStringLength()

                    if($database === 'nullable' || $database === 'none'){
                        continue;
                    }
                    elseif($name === 'meta_description'){
                        $fake_data = $faker->realText(100);
                    }
                    elseif($name === 'password'){
                        $password = $faker->realText(10);
                        $fake_data = $password;
                    }
                    elseif($name === 'url'){
                        $fake_data = 'fake-' . $faker->numberBetween($min = 1000, $max = 900000);
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
                    elseif($type === '' || $type === 'boolean' || $type === 'bigInteger' || $type === 'integer' || $type === 'tinyInteger'){
                        $fake_data = 1;
                    }
                    elseif($type === 'string'){
                        $fake_data = 'Fake ' . $faker->realText(50);
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

// 'name' => $faker->name,
// 'email' => $faker->unique()->safeEmail,
// 'email_verified_at' => now(),
// 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
// 'remember_token' => Str::random(10),


// 'title' => $faker->uuid,
// 'url' => $faker->uuid,
// 'short_content' => $faker->address,
// 'content' => $faker->text,
// 'meta_description' => $faker->address . $faker->address,
// 'keywords' => null,
// 'meta_image' => null,
// 'published' => true,
// 'google_index' => true,
// // 'creator_id' => 1,
// // 'editor_id' => 1,
