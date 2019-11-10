<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class DefaultSlidersTableSeeder extends Seeder
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
            	'title' => 'Slider Title 1',
            	'description' => 'Slider Description 1',
            	'image' => 'images/front/themes/1-original/header-background.png',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Slider Title 2',
            	'description' => 'Slider Description 2',
            	'image' => 'images/front/themes/1-original/header-slider.png',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Slider Title 3',
            	'description' => 'Slider Description 3',
            	'image' => 'images/front/themes/1-original/header-feature.png',
            	'activated' => 1,
            ],
        ];

        foreach($sliders as $slider){
            Slider::updateOrCreate(['id' => $slider['id']], $slider);
        }
    }
}
