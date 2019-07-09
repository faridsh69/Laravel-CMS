<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;

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
            	'title' => 'SP',
            	'description' => '',
            	'image' => asset('css/front/capp/img/bg-img/welcome-bg.png'),
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Synergy Power',
            	'description' => 'Go Solar. Save Money.',
            	'image' => asset('storage/files/shares/welcome.png'),
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Solar Panel Installation',
            	'description' => 'We’re with you every step of the way, including system design, engineering, permitting, utility interconnection paperwork, installation, and ongoing off-site monitoring.',
            	'image' => asset('css/front/capp/img/eric/icon1.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => 'Solar Panel Maintenance',
            	'description' => 'Is your current solar system producing at maximum capacity? Maybe not. A few times a year, the panels should be inspected for any dirt or debris that may collect on them.',
            	'image' => asset('css/front/capp/img/eric/icon3.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 5,
            	'title' => 'Panel Repairs & Add-Ons',
            	'description' => 'We provide warranty repairs to any solar system we have installed! If your system isn’t working as it should, call us immediately and we will fix the problem right away. We also provide add-ons!',
            	'image' => asset('css/front/capp/img/eric/icon2.jpg'),
            	'activated' => 1,
            ],
        ];

        foreach($sliders as $slider){
            Slider::updateOrCreate(['id' => $slider['id']], $slider);
        }
    }
}
