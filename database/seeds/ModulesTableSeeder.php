<?php

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $database_name = config('database.connections.mysql.database');
        $folder_name = substr($database_name, 9, 6);
        $image_folder_name = '/storage/photos/shares/' . $folder_name . '/';

        $countings = [
            [
            	'title' => 'SOLD',
            	'description' => 1038,
            	'icon' => 'ion-arrow-down-a',
            ],
            [
            	'title' => 'Happy Clients',
            	'description' => 339,
            	'icon' => 'ion-happy-outline',
            ],
            [
            	'title' => 'Active Members',
            	'description' => 187,
            	'icon' => 'ion-person',
            ],
            [
            	'title' => 'Satisfy Rate',
            	'description' => 97,
            	'icon' => 'ion-ios-star-outline',
            ],
        ];

        foreach($countings as $counting){
            $counting['type'] = 'counting';
            $counting['language'] = config('app.locale');
            $counting['activated'] = 1;
            
            Module::firstOrCreate($counting);
        }

        $features = [
            [
                'title' => 'Feature Title 1',
                'icon' => 'ti-mobile',
                'description' => 'Feature Description 1, ti-mobile, Feature Description 1, ti-mobile, Feature Description 1, ti-mobile, Feature Description 1, ti-mobile, Feature Description 1, ti-mobile, ',
            ],
            [
                'title' => 'Feature Title 2',
                'icon' => 'ti-money',
                'description' => 'Feature Description 2 - ti-money - Feature Description 2 - ti-money - Feature Description 2 - ti-money - Feature Description 2 - ti-money - Feature Description 2 - ti-money',
            ],
            [
                'title' => 'Feature Title 3',
                'icon' => 'ti-settings',
                'description' => 'Feature description 3 - ti-settings, Feature description 3 - ti-settings, Feature description 3 - ti-settings, Feature description 3 - ti-settings, Feature description 3 - ti-settings',
            ],
        ];

        foreach($features as $feature){
        	$feature['type'] = 'main_feature';
            $feature['language'] = config('app.locale');
            $feature['activated'] = 1;
            
            Module::updateOrCreate($feature);

            $feature['type'] = 'feature';            
            Module::updateOrCreate($feature);
        }

        $feedbacks = [
            [
            	'title' => '#13 Customer',
            	'full_name' => 'Eric Ez',
            	'description' => '“ I love this business! ”',
            	'image' => $image_folder_name . '8-feedback-1.png',
            ],
            [
                'title' => 'Manager',
                'full_name' => 'Navid Ma',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . '8-feedback-2.png',
            ],
            [
                'title' => '#4 Customer',
                'full_name' => 'Farima El',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . '8-feedback-3.png',
            ],
            [
            	'title' => 'Chief Technology Officer',
            	'full_name' => 'Farid Sh',
            	'description' => '“ I love this business! ”',
            	'image' => $image_folder_name . '8-feedback-4.png',
            ],
        ];

        foreach($feedbacks as $feedback){
        	$feedback['type'] = 'testimonial';
            $feedback['language'] = config('app.locale');
            $feedback['activated'] = 1;
            
            Module::updateOrCreate($feedback);
        }

        $sliders = [
            [
            	'type' => 'header',
            	'title' => 'Slider Title 1',
            	'description' => 'Slider Description 1',
            	'image' => $image_folder_name . '7-slider-1.png',
            ],
            [
            	'type' => 'breadcrumb',
            	'title' => 'Slider Title 2',
            	'description' => '',
            	'image' => $image_folder_name . '7-slider-2.png',
            ],
            [
            	'type' => 'introduce',
            	'title' => 'Slider Title 3',
            	'description' => 'Slider Description 3',
            	'image' => $image_folder_name . '7-slider-3.png',
            ],
        ];

        foreach($sliders as $slider){
        	$slider['type'] = 'header';
            $slider['language'] = config('app.locale');
            $slider['activated'] = 1;
            
            Module::updateOrCreate($slider);
        }

        $services = [
            [
            	'image' => $image_folder_name . '6-service-1.png',
            ],
            [
                'image' => $image_folder_name . '6-service-2.png',
            ],
            [
                'image' => $image_folder_name . '6-service-3.png',
            ],
            [
                'image' => $image_folder_name . '6-service-4.png',
            ],
            [
                'image' => $image_folder_name . '6-service-5.png',
            ],
        ];

        foreach($services as $service){
        	$service['type'] = 'partner';
        	$service['title'] = 'partner';
            $service['language'] = config('app.locale');
            $service['activated'] = 1;
            
            Module::updateOrCreate($service);
        }

        $menus = [
            [
                'title' => 'Home',
                'url' => '/',
            ],
            [
                'title' => 'How to use',
                'url' => 'how-to-use',
            ],
            [
                'title' => 'Introduction',
                'url' => 'introduction',
                'parent_url' => 'how-to-use',
            ],
            [
                'title' => 'Form / Table',
                'url' => 'form-table',
                'parent_url' => 'how-to-use',
            ],
            [
                'title' => 'Models',
                'url' => 'models',
                'parent_url' => 'how-to-use',
            ],
            [
                'title' => 'Translation',
                'url' => 'translation',
                'parent_url' => 'how-to-use',
            ],
            [
                'title' => 'Notification',
                'url' => 'Notification',
                'parent_url' => 'how-to-use',
            ],
            [
                'title' => 'Packages',
                'url' => 'packages',
                'parent_url' => 'how-to-use',
            ],
            [
                'title' => 'Products',
                'url' => 'product',
            ],
            [
                'title' => 'Basket',
                'url' => 'blog',
            ],
            [
                'title' => 'Blog',
                'url' => 'blog',
            ],
            [
                'title' => 'About Us',
                'url' => 'about-us',
            ],
            [
                'title' => 'Contact Us',
                'url' => 'contact-us',
            ],
        ];

        foreach($menus as $menu){
            if( isset($menu['parent_url']) ){
                $parent = Module::where('url', $menu['parent_url'])->first();
                $menu['parent_id'] = $parent->id;
                unset($menu['parent_url']);
            }
        	$menu['type'] = 'menu';
            $menu['language'] = config('app.locale');
            $menu['activated'] = 1;
            
            Module::updateOrCreate($menu);
        }
    }
}
