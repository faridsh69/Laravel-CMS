<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class CmsSlidersTableSeeder extends Seeder
{
    public function run()
    {
        // title, description, image, activated
        $sliders = [
            [
            	'id' => 1,
            	'title' => 'CMS',
            	'description' => '',
            	'image' => 'images/front/themes/1-original/header-background.png',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Laravel CMS',
            	'description' => 'Everything You Need. To Start Selling Online Beautifully.',
            	'image' => 'images/front/themes/1-original/header-slider.png',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Our Best Propositions for You!',
            	'description' => 'When we create a model we can define type of column, type of input in forms, rules, help block, showing on table or not, ...',
            	'image' => 'images/front/themes/1-original/header-feature.png',
            	'activated' => 1,
            ],
        ];

        foreach($sliders as $slider){
            Slider::updateOrCreate(['id' => $slider['id']], $slider);
        }
    }
}
