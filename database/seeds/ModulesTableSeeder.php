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
        $image_folder_name = '/storage/files/photos/' . $folder_name . '/';
        $modules = Module::get();
        foreach($modules as $module){
            $module->delete();
        }
        $countings = [
            [
            	'title' => 'Courses Available',
            	'description' => 130,
            	'icon' => 'icon-agenda-1',
            ],
            [
            	'title' => 'Developers',
            	'description' => 339,
            	'icon' => 'icon-assistance',
            ],
            [
            	'title' => 'Online Students',
            	'description' => 187,
            	'icon' => 'icon-id-card',
            ],
            [
            	'title' => 'Projects',
            	'description' => 37,
            	'icon' => 'icon-message',
            ],
        ];

        foreach($countings as $counting){
            $counting['type'] = 'counting';
            $counting['language'] = 'en';
            $counting['activated'] = 1;
            
            Module::firstOrCreate($counting);
        }

        $features = [
            [
                'type' => 'main_feature',
                'title' => 'Feature Title 1',
                'icon' => 'icon-agenda-1', // ti-mobile
                'description' => 'Feature Description, Feature Description, Feature Description, ',
            ],
            [
                'type' => 'main_feature',
                'title' => 'Feature Title 2',
                'icon' => 'icon-assistance', // ti-money
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'main_feature',
                'title' => 'Feature Title 3',
                'icon' => 'icon-telephone-3', // ti-settings
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 1',
                'icon' => 'icon-id-card',
                'description' => 'Feature Description, Feature Description, Feature Description,',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 2',
                'icon' => 'icon-worldwide',
                'description' => 'Feature Description, Feature Description, Feature Description,',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 3',
                'icon' => 'icon-map',
                'description' => 'Feature Description, Feature Description, Feature Description,',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 4',
                'icon' => 'icon-like',
                'description' => 'Feature Description, Feature Description, Feature Description,',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 5',
                'icon' => 'icon-responsive',
                'description' => 'Feature Description, Feature Description, Feature Description,',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 6',
                'icon' => 'icon-message',
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
        ];

        foreach($features as $feature){
            $feature['language'] = 'en';
            $feature['activated'] = 1;
            
            Module::updateOrCreate($feature);
        }

        $testimonials = [
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

        foreach($testimonials as $testimonial){
            $testimonial['image'] = asset($testimonial['image']);
        	$testimonial['type'] = 'testimonial';
            $testimonial['language'] = 'en';
            $testimonial['activated'] = 1;
            
            Module::updateOrCreate($testimonial);
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
            $slider['image'] = asset($slider['image']);
        	$slider['type'] = 'header';
            $slider['language'] = 'en';
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
            $service['image'] = asset($service['image']);
        	$service['type'] = 'service';
        	$service['title'] = 'service';
            $service['language'] = 'en';
            $service['activated'] = 1;
            
            Module::updateOrCreate($service);
        }

        $partners = [
            [
                'image' => $image_folder_name . '9-partner-1.png',
            ],
            [
                'image' => $image_folder_name . '9-partner-2.png',
            ],
            [
                'image' => $image_folder_name . '9-partner-3.png',
            ],
            [
                'image' => $image_folder_name . '9-partner-4.png',
            ],
            [
                'image' => $image_folder_name . '9-partner-5.png',
            ],
        ];

        foreach($partners as $partner){
            $partner['image'] = asset($partner['image']);
            $partner['type'] = 'partner';
            $partner['title'] = 'partner';
            $partner['language'] = 'en';
            $partner['activated'] = 1;
            
            Module::updateOrCreate($partner);
        }

        $menus = [
            [
                'title' => 'Home',
                'url' => '/',
                'order' => 1,
            ],
            [
                'title' => 'How to use',
                'url' => 'how-to-use',
                'order' => 4,
            ],
            [
                'title' => 'Introduction',
                'url' => 'introduction',
                'parent_url' => 'how-to-use',
                'order' => 7,
            ],
            [
                'title' => 'Form / Table',
                'url' => 'form-table',
                'parent_url' => 'how-to-use',
                'order' => 10,
            ],
            [
                'title' => 'Models',
                'url' => 'models',
                'parent_url' => 'how-to-use',
                'order' => 13,
            ],
            [
                'title' => 'Translation',
                'url' => 'translation',
                'parent_url' => 'how-to-use',
                'order' => 16,
            ],
            [
                'title' => 'Notification',
                'url' => 'Notification',
                'parent_url' => 'how-to-use',
                'order' => 19,
            ],
            [
                'title' => 'Packages',
                'url' => 'packages',
                'parent_url' => 'how-to-use',
                'order' => 22,
            ],
            [
                'title' => 'Products',
                'url' => 'product',
                'order' => 25,
            ],
            [
                'title' => 'Basket',
                'url' => 'basket',
                'order' => 28,
            ],
            [
                'title' => 'Blog',
                'url' => 'blog',
                'order' => 31,
            ],
            [
                'title' => 'About Us',
                'url' => 'about-us',
                'order' => 34,
            ],
            [
                'title' => 'Contact Us',
                'url' => 'contact-us',
                'order' => 37,
            ],
        ];

        foreach($menus as $menu){
            if( isset($menu['parent_url']) ){
                $parent = Module::where('url', $menu['parent_url'])->first();
                $menu['parent_id'] = $parent->id;
                unset($menu['parent_url']);
            }
        	$menu['type'] = 'menu';
            $menu['language'] = 'en';
            $menu['activated'] = 1;
            
            Module::updateOrCreate($menu);
        }

        $products = [
            [
                'product_id' => 1,
            ],
            [
                'product_id' => 2,
            ],
            [
                'product_id' => 3,
            ],
            [
                'product_id' => 4,
            ],
        ];

        foreach($products as $product){
            $product['title'] = 'product';
            $product['type'] = 'product';
            $product['language'] = 'en';
            $product['activated'] = 1;
            
            Module::updateOrCreate($product);
        }

        $faqs = [
            [
                'title' => 'What is the best benefit of laravel cms?',
                'description' => 'It is complete and very fast and easy to develop',
            ],
            [
                'title' => 'What is the best benefit of laravel cms??',
                'description' => 'It is complete and very fast and easy to develop',
            ],
            [
                'title' => 'What is the best benefit of laravel cms???',
                'description' => 'It is complete and very fast and easy to develop',
            ],
        ];

        foreach($faqs as $faq){
            $faq['type'] = 'faq';
            $faq['language'] = 'en';
            $faq['activated'] = 1;
            
            Module::updateOrCreate($faq);
        }

        $teams = [
            [
                'title' => '#13 Customer',
                'full_name' => 'Eric Ez',
                'image' => $image_folder_name . '8-feedback-1.png',
            ],
            [
                'title' => 'Manager',
                'full_name' => 'Navid Ma',
                'image' => $image_folder_name . '8-feedback-2.png',
            ],
            [
                'title' => '#4 Customer',
                'full_name' => 'Farima El',
                'image' => $image_folder_name . '8-feedback-3.png',
            ],
            [
                'title' => 'Chief Technology Officer',
                'full_name' => 'Farid Sh',
                'image' => $image_folder_name . '8-feedback-4.png',
            ],
        ];

        foreach($teams as $team){
            $team['image'] = asset($team['image']);
            $team['type'] = 'team';
            $team['language'] = 'en';
            $team['activated'] = 1;
            
            Module::updateOrCreate($team);
        }

        $pricings = [
            [
                'title' => 'Basic',
                'description' => '3.99$ per month',
                'content' => 'Basic features',
                'order' => 1,
            ],
            [
                'title' => 'Standard',
                'description' => '9.99$ per month',
                'content' => 'Standard features',
                'order' => 2,
            ],
            [
                'title' => 'Advanced',
                'description' => '19.99$ per month',
                'content' => 'Advanced features',
                'order' => 3,
            ],
        ];

        foreach($pricings as $pricing){
            $pricing['type'] = 'pricing';
            $pricing['language'] = 'en';
            $pricing['activated'] = 1;
            
            Module::updateOrCreate($pricing);
        }
    }
}
