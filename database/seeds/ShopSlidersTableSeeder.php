<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class ShopSlidersTableSeeder extends Seeder
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
            	'title' => 'MN',
            	'description' => '',
            	'image' => asset('css/front/capp/img/menew/slider1.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Menew',
            	'description' => 'Future Of Shop Menus.',
            	'image' => asset('css/front/capp/img/menew/slider2.png'),
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Our Best Propositions for You!',
            	'description' => 'Add a lot of data in your users mobile easily. Add a lot of data in your users mobile easily. Add a lot of data in your users mobile easily. Add a lot of data in your users mobile easily. Add a lot of data in your users mobile easily.',
            	'image' => asset('css/front/capp/img/menew/iPhone.png'),
            	'activated' => 1,
            ],
        ];

        foreach($sliders as $slider){
            Slider::updateOrCreate(['id' => $slider['id']], $slider);
        }
    }
}
