<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // title, description, image, activated
        $sliders = [
            [
            	'id' => 1,
            	'title' => 'F SH',
            	'description' => '',
            	'image' => asset('css/front/capp/img/bg-img/welcome-bg1.png'),
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Farid Shahidi',
            	'description' => 'Everything You Need. To Start Selling Online Beautifully.',
            	'image' => asset('css/front/capp/img/bg-img/welcome-img.png'),
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Our Best Propositions for You!',
            	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
            	'image' => asset('css/front/capp/img/bg-img/special.png'),
            	'activated' => 1,
            ],
        ];

        foreach($sliders as $slider){
            Slider::updateOrCreate(['id' => $slider['id']], $slider);
        }
    }
}
