<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class DefaultServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // title, description, image, activated
        $services = [
            [
            	'id' => 1,
            	'title' => '',
            	'description' => '',
            	'image' => 'images/front/themes/1-original/service-1.jpg',
            	'activated' => 1,
            ],
            [
                'id' => 2,
                'title' => '',
                'description' => '',
                'image' => 'images/front/themes/1-original/service-2.jpg',
                'activated' => 1,
            ],
            [
                'id' => 3,
                'title' => '',
                'description' => '',
                'image' => 'images/front/themes/1-original/service-3.jpg',
                'activated' => 1,
            ],
            [
                'id' => 4,
                'title' => '',
                'description' => '',
                'image' => 'images/front/themes/1-original/service-4.jpg',
                'activated' => 1,
            ],
            [
                'id' => 5,
                'title' => '',
                'description' => '',
                'image' => 'images/front/themes/1-original/service-5.jpg',
                'activated' => 1,
            ],
        ];

        foreach($services as $service){
            Service::updateOrCreate(['id' => $service['id']], $service);
        }
    }
}
