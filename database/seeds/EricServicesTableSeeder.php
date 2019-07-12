<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class EricServicesTableSeeder extends Seeder
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
            	'image' => asset('css/front/capp/img/eric/app-1.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => '',
            	'description' => '',
            	'image' => asset('css/front/capp/img/eric/app-2.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => '',
            	'description' => '',
            	'image' => asset('css/front/capp/img/eric/app-3.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => '',
            	'description' => '',
            	'image' => asset('css/front/capp/img/eric/app-4.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 5,
            	'title' => '',
            	'description' => '',
            	'image' => asset('css/front/capp/img/eric/app-5.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 6,
            	'title' => '',
            	'description' => '',
            	'image' => asset('css/front/capp/img/eric/app-6.jpg'),
            	'activated' => 1,
            ],
        ];

        foreach($services as $service){
            Service::updateOrCreate(['id' => $service['id']], $service);
        }
    }
}
