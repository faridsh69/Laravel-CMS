<?php

use Faker\Generator as Faker;

$models = ['Blog', 'Page'];
foreach($models as $model)
{
    $class_name = 'App\\Models\\' . $model;
    $model = new $class_name();
    $columns = $model->getColumns();

    $factory->define($class_name, function (Faker $faker) use ($columns) {
        $output = [];
        foreach($columns as $column){
            $name = $column['name'];
            $type = isset($column['type']) ? $column['type'] : '';
            $rule = isset($column['rule']) ? $column['rule'] : '';
            $relation = isset($column['relation']) ? $column['relation'] : '';
            
            if($rule === 'nullable'){
                continue;
            }
            elseif($name == 'meta_description'){
                $output[$name] = $faker->realText(100);
            }
            elseif($name == 'url'){
                $output[$name] = 'fake-' . $faker->numberBetween($min = 1000, $max = 900000);
            }
            elseif($name == 'content'){
                $output[$name] = '<h1>Fake h1</h1><h2>Fake h2</h2>' . $faker->realText(400);
            }
            elseif($type == 'string'){
                $output[$name] = 'Fake ' . $faker->realText(50);
            }
            elseif($type == 'text'){
                $output[$name] = 'Fake ' . $faker->realText(400);
            }
            elseif($type == '' || $type == 'boolean'){
                $output[$name] = 1;
            }
            elseif($type === 'integer'){
                $output[$name] = $faker->numberBetween(1000, 9000);
            }
        }

        return $output;
    });
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