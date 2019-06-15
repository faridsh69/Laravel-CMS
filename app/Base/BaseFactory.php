<?php

namespace App\Base;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

class BaseFactory
{
    public function index($factory)
    {
        $models = config('services.models.factory');

        foreach($models as $model)
        {
            $model = ucfirst($model);
            $class_name = 'App\\Models\\' . $model;
            $model = new $class_name();
            $columns = $model->getColumns();

            $factory->define($class_name, function (Faker $faker) use ($columns) {
                $output = [];
                foreach($columns as $column){
                    $name = $column['name'];
                    $type = isset($column['type']) ? $column['type'] : '';
                    $database = isset($column['database']) ? $column['database'] : '';
                    $rule = isset($column['rule']) ? $column['rule'] : '';
                    $relation = isset($column['relation']) ? $column['relation'] : '';
                    
                    if($database === 'nullable' || $database === 'none'){
                        continue;
                    }
                    elseif($name == 'meta_description'){
                        $fake_data = $faker->realText(100);
                    }
                    elseif($name == 'url'){
                        $fake_data = 'fake-' . $faker->numberBetween($min = 1000, $max = 900000);
                    }
                    elseif($name == 'content'){
                        $fake_data = '<h1>Fake h1</h1><h2>Fake h2</h2>' . $faker->realText(400);
                    }
                    elseif($type == 'string'){
                        $fake_data = 'Fake ' . $faker->realText(50);
                    }
                    elseif($type == 'text'){
                        $fake_data = 'Fake ' . $faker->realText(400);
                    }
                    elseif($type == '' || $type == 'boolean'){
                        $fake_data = 1;
                    }
                    elseif($type === 'integer'){
                        $fake_data = $faker->numberBetween(1000, 9000);
                    }

                    $output[$name] = $fake_data;
                }

                return $output;
            });
        }
    }
}

// $models_unused = [
//     'blog', // 1 +
//     'page', // 2 +
//     'category', // 3 +
//     'tag', // 4  
//     'user', // 8 
//     // // 'media', // 5  
//     // // 'setting', // 7 + 
//     // // 'seo' // 12 
//     // // 'report', // 14
//     // // 'notification', // 15
//     'menu', // 16
//     'comment', // 6
//     'form', // 13
//     // 'block', // 10
//     // 'widget', // 11
//     // 'theme', // 9 
// ];


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