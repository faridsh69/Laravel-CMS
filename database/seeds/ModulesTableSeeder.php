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
        // title, description, content, icon, image, url, type, parent_id, order, full_name, product_id, activated, language

        $database_name = config('database.connections.mysql.database');
        $folder_name = substr($database_name, 9, 6);
        $image_folder_name = '/storage/files/photos/' . $folder_name . '/';
        $video_folder_name = '/storage/files/videos/' . $folder_name . '/';
        // $modules = Module::get();
        // foreach($modules as $module){
        //     $module->delete();
        // }
        $modules = [
            // Menu
            [
                'type' => 'menu',
                'title' => 'Home',
                'url' => '/',
            ],
            [
                'type' => 'menu',
                'title' => 'About',
                'url' => 'about',
            ],
            [
                'type' => 'menu',
                'title' => 'Products',
                'url' => 'product',
            ],
            [
                'type' => 'menu',
                'title' => 'Basket',
                'url' => 'basket',
            ],
            [
                'type' => 'menu',
                'title' => 'Job',
                'url' => 'job',
            ],
            [
                'type' => 'menu',
                'title' => 'Blog',
                'url' => 'blog',
            ],
            [
                'type' => 'menu',
                'title' => 'Contact',
                'url' => 'contact',
            ],
            // Header
            [
                'type' => 'header',
                'title' => 'Header Title 1',
                'description' => 'Header Description 1',
                'url' => 'header-url-1',
                'image' => $image_folder_name . 'header-1.png',
            ],
            [
                'type' => 'header',
                'title' => 'Header Title 2',
                'description' => 'Header Description 2',
                'url' => 'header-url-2',
                'image' => $image_folder_name . 'header-2.png',
            ],
            [
                'type' => 'header',
                'title' => 'Header Title 3',
                'description' => 'Header Description 3',
                'url' => 'header-url-3',
                'image' => $image_folder_name . 'header-3.png',
            ],
            // Breadcrumb
            [
                'type' => 'breadcrumb',
                'image' => $image_folder_name . 'breadcrumb.png',
            ],
            // Main Feature
            [
                'type' => 'main_feature',
                'title' => 'Feature Title 1',
                'icon' => 'icon-agenda-1', // ti-mobile
                'description' => 'Feature Description, Feature Description, Feature Description',
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
            // Feature
            [
                'type' => 'feature',
                'title' => 'Feature Title 1',
                'icon' => 'icon-id-card',
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 2',
                'icon' => 'icon-worldwide',
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 3',
                'icon' => 'icon-map',
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 4',
                'icon' => 'icon-like',
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 5',
                'icon' => 'icon-responsive',
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'feature',
                'title' => 'Feature Title 6',
                'icon' => 'icon-message',
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            // Introduce
            [
                'type' => 'introduce',
                'title' => 'Introduce Title',
                'content' => 'Introduce Content',
                'url' => 'introduce-url',
                'image' => $image_folder_name . 'introduce.png',
            ],
            // Video
            [
                'type' => 'video',
                'title' => 'Video Title',
                'image' => $video_folder_name . 'video.mp4',
            ],
            // Counting
            [
                'type' => 'counting',
                'title' => 'Courses Available',
                'description' => 130,
                'icon' => 'icon-agenda-1',
            ],
            [
                'type' => 'counting',
                'title' => 'Developers',
                'description' => 339,
                'icon' => 'icon-assistance',
            ],
            [
                'type' => 'counting',
                'title' => 'Online Students',
                'description' => 187,
                'icon' => 'icon-id-card',
            ],
            [
                'type' => 'counting',
                'title' => 'Projects',
                'description' => 37,
                'icon' => 'icon-message',
            ],
            // Products
            [
                'type' => 'product',
                'product_id' => 1,
            ],
            [
                'type' => 'product',
                'product_id' => 2,
            ],
            [
                'type' => 'product',
                'product_id' => 3,
            ],
            [
                'type' => 'product',
                'product_id' => 4,
            ],
            // Services
            [
                'type' => 'service',
                'image' => $image_folder_name . 'service-1.png',
            ],
            [
                'type' => 'service',
                'image' => $image_folder_name . 'service-2.png',
            ],
            [
                'type' => 'service',
                'image' => $image_folder_name . 'service-3.png',
            ],
            [
                'type' => 'service',
                'image' => $image_folder_name . 'service-4.png',
            ],
            [
                'type' => 'service',
                'image' => $image_folder_name . 'service-5.png',
            ],
            // Pricing
            [
                'type' => 'pricing',
                'title' => 'Basic',
                'description' => '3.99$ per month',
                'content' => 'Basic features',
                'order' => 1,
            ],
            [
                'type' => 'pricing',
                'title' => 'Standard',
                'description' => '9.99$ per month',
                'content' => 'Standard features',
                'order' => 2,
            ],
            [
                'type' => 'pricing',
                'title' => 'Advanced',
                'description' => '19.99$ per month',
                'content' => 'Advanced features',
                'order' => 3,
            ],
            // Testimonial
            [
                'type' => 'testimonial',
                'title' => '#13 Customer',
                'full_name' => 'Eric Ez',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . 'feedback-1.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'Manager',
                'full_name' => 'Navid Ma',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . 'feedback-2.png',
            ],
            [
                'type' => 'testimonial',
                'title' => '#4 Customer',
                'full_name' => 'Elizabeth Sm',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . 'feedback-3.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'Chief Technology Officer',
                'full_name' => 'Farid Sh',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . 'feedback-4.png',
            ],
            // FAQ
            [
                'type' => 'faq',
                'title' => 'What is the best benefit of laravel cms?',
                'description' => 'It is complete and very fast and easy to develop',
            ],
            [
                'type' => 'faq',
                'title' => 'What is the best benefit of laravel cms??',
                'description' => 'It is complete and very fast and easy to develop',
            ],
            [
                'type' => 'faq',
                'title' => 'What is the best benefit of laravel cms???',
                'description' => 'It is complete and very fast and easy to develop',
            ],

        ];

        $order = 3;
        foreach($modules as $module){
            $order += 3;
            $module['order'] = $order;
            $module['language'] = 'en';
            $module['activated'] = 1;
            $module['image'] = asset($module['image']);
            Module::firstOrCreate($module);
            // if( isset($module['parent_url']) ){
            //     $parent = Module::where('url', $module['parent_url'])->first();
            //     $module['parent_id'] = $parent->id;
            //     unset($module['parent_url']);
            // }
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

    }
}
