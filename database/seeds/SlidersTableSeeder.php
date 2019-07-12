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
            	'title' => 'CMS',
            	'description' => '',
            	'image' => asset('css/front/capp/img/bg-img/welcome-bg1.png'),
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Laravel CMS',
            	'description' => 'Everything You Need. To Start Selling Online Beautifully.',
            	'image' => asset('css/front/capp/img/bg-img/welcome-img.png'),
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Our Best Propositions for You!',
            	'description' => 'When we create a model we can define type of column, type of input in forms, rules, help block, showing on table or not, ...
We can tell laravel what we want in an static array then every other things will autogenerate!.',
            	'image' => asset('css/front/capp/img/bg-img/special.png'),
            	'activated' => 1,
            ],
        ];

        foreach($sliders as $slider){
            Slider::updateOrCreate(['id' => $slider['id']], $slider);
        }
    }
}
