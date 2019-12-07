<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class DefaultServicesTableSeeder extends Seeder
{
    public function run()
    {
        $database_name = config('database.connections.mysql.database');
        $folder_name = substr($database_name, 9, 6);
        $image_folder_name = '/storage/photos/shares/' . $folder_name . '/';
        $services = [
            [
            	'id' => 1,
            	'title' => '',
            	'description' => '',
            	'image' => $image_folder_name . '6-service-1.png',
            	'activated' => 1,
            ],
            [
                'id' => 2,
                'title' => '',
                'description' => '',
                'image' => $image_folder_name . '6-service-2.png',
                'activated' => 1,
            ],
            [
                'id' => 3,
                'title' => '',
                'description' => '',
                'image' => $image_folder_name . '6-service-3.png',
                'activated' => 1,
            ],
            [
                'id' => 4,
                'title' => '',
                'description' => '',
                'image' => $image_folder_name . '6-service-4.png',
                'activated' => 1,
            ],
            [
                'id' => 5,
                'title' => '',
                'description' => '',
                'image' => $image_folder_name . '6-service-5.png',
                'activated' => 1,
            ],
        ];

        foreach($services as $service){
            Service::updateOrCreate(['id' => $service['id']], $service);
        }
    }
}
