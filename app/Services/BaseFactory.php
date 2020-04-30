<?php

namespace App\Services;

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Str;

class BaseFactory
{
    public function index($factory)
    {
        $model_slugs = config('cms.factory');

        foreach($model_slugs as $model_slug)
        {
            $model_name = Str::studly($model_slug);
            $models_namespace = config('cms.config.models_namespace'). $model_name;
            $model_repository = new $models_namespace();
            $model_columns = $model_repository->getColumns();

            $factory->define($models_namespace, function (Faker $faker) use ($model_columns, $model_name, $model_slug) {
                $output = [];
                $random_int = rand(1000, 9999);
                foreach($model_columns as $column){
                    $fake_data = null;
                    $name = $column['name'];
                    $type = $column['type'];
                    $form_type = isset($column['form_type']) ? $column['form_type'] : '';
                    $database = isset($column['database']) ? $column['database'] : null;

                    if($name === 'url'){
                        // $fake_data = 'fake-' . $faker->slug();
                        $fake_data = $model_slug. '-url-'. $random_int;
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
                    elseif($form_type === 'file')
                    {
                        $file_accept = isset($column['file_accept']) ? $column['file_accept'] : null;
                        $file_manager = isset($column['file_manager']) ? $column['file_manager'] : null;
                        if($file_accept === 'image'){
                            $extention = 'png';
                        }elseif($file_accept === 'video'){
                            $extention = 'mp4';
                        }elseif($file_accept === 'audio'){
                            $extention = 'mp3';
                        }else{
                            $extention = 'pdf';
                        }
                        $filemanager_files = [];
                        $upload_files = [];
                        $random_count = rand(0,3);
                        for($i = 1; $i <= $random_count; $i ++){
                            $filemanager_files[] = asset('images/front/general/test/'. 
                                $file_accept. '/'. $i. '.'. $extention);
                            $upload_files[] = $i. '.'. $extention;
                        }

                        if($file_manager === true){
                            $fake_data = implode(',', $filemanager_files);
                        }else{
                            $base_path = realpath(dirname(__FILE__). 
                                '/../../public_html/cdn/images/front/general/test/'. $file_accept);
                            $fake_data = [];
                            foreach($upload_files as $file){
                                $path = $base_path. '\\'. $file;
                                $fake_data[] = new UploadedFile($path, $file, $extention);
                            }
                        }
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
                        $password = '123456';
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
                if(isset($password)){
                    $output['password_confirmation'] = $password;
                }

                return $output;
            });
        }
    }
}
