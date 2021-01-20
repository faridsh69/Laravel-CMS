<?php

use App\Models\Block;
use App\Models\Category;
use App\Models\Module;
use App\Models\Page;
use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class CmsLaravelSeeder extends Seeder
{
    public function run()
    {
		$image_folder_name = '/storage/photos/';
		$video_folder_name = '/storage/videos/';

        // Category
        $categories = [
            [
                'title' => 'Model',
            ],
            [
                'title' => 'Migration',
            ],
            [
                'title' => 'Seeder',
            ],
            [
                'title' => 'Factory',
            ],
            [
                'title' => 'Policy',
            ],
            [
                'title' => 'Test',
            ],
            [
                'title' => 'Controller',
            ],
            [
                'title' => 'Form',
            ],
        ];

        foreach($categories as $category){
            $category['language'] = 'en';
            Category::firstOrCreate($category);
        }

        // Tag
        $tags = [
            [
                'title' => 'Development',
            ],
            [
                'title' => 'Movie',
            ],
            [
                'title' => '2020',
            ],
        ];

        foreach($tags as $tag)
        {
            Tag::firstOrCreate($tag);
        }

        // User
        $users = [
            [
                'id' => 1,
                'first_name' => 'Farid',
                'last_name' => 'Shahidi',
                'url' => 'farid-shahidi',
                'email' => 'farid.sh69@gmail.com',
                'phone' => '+4915730275229',
                'password' => bcrypt('1111'),
                'activated' => 1,
            ],
        ];
        foreach($users as $user){
            User::updateOrCreate(['id' => $user['id']], $user);
        }

        // Page
        $pages = [
            [
                'title' => 'Open Source Full-Featured CMS',
                'url' => null,
                'image' => asset($image_folder_name . 'setting-logo.png'),
                'description' => 'CMS Laravel is an open source project with Laravel contains all usefull packages and services for developing in the fastest way.',
                'view_code_url' => 'front.components.documents.laravel-cms',
            ],
            [
                'title' => 'Document',
                'url' => 'document',
                'image' => asset($image_folder_name . 'setting-logo.png'),
                'description' => 'How to use laravel cms and understand new design patterns that used in this cms.',
                'view_code_url' => 'front.components.documents.getting-started',
            ],
            [
                'title' => 'Getting Started',
                'url' => 'getting-started',
                'image' => asset($image_folder_name . 'setting-logo.png'),
                'description' => 'How to use laravel cms and understand new design patterns that used in this cms.',
                'view_code_url' => 'front.components.documents.getting-started',
            ],
            [
                'title' => 'Model',
                'url' => 'model',
                'image' => asset($image_folder_name . 'documents/model.png'),
                'description' => 'How to write your models in cms-laravel to see how whole project will run with just one array in your model and try to find out why this cms can help to develop more easier and faster.',
                'view_code_url' => 'front.components.documents.model',
            ],
            [
                'title' => 'Setting',
                'url' => 'setting',
                'image' => asset($image_folder_name . 'documents/setting.png'),
                'description' => 'Everything is configured in settings at laravel CMS. Feel free to check settings section.',
                'view_code_url' => 'front.components.documents.setting',
            ],
            [
                'title' => 'Migration',
                'url' => 'migration',
                'image' => asset($image_folder_name . 'documents/migration.png'),
                'description' => 'How to use migration service to create or modify tables based on model changes.',
                'view_code_url' => 'front.components.documents.migration',
            ],
            [
                'title' => 'Form',
                'url' => 'form',
                'image' => asset($image_folder_name . 'documents/form.png'),
                'description' => 'Get familiar with all forms types and use them, all type of form inputs craeted and is ready to develop by laravel-form-builder',
                'view_code_url' => 'front.components.documents.form',
            ],
            [
                'title' => 'Factory',
                'url' => 'factory',
                'image' => asset($image_folder_name . 'documents/factory.png'),
                'description' => 'Factory is used for seed fake data in database and also it used in tests. factory will generate automatically based on your model columns.',
                'view_code_url' => 'front.components.documents.factory',
            ],
            [
                'title' => 'Seeder',
                'url' => 'seeder',
                'image' => asset($image_folder_name . 'documents/seeder.png'),
                'description' => 'You dont need to write any seeders, just add models that you want to seed fake data to config/services.php file.',
                'view_code_url' => 'front.components.documents.seeder',
            ],
            [
                'title' => 'Route',
                'url' => 'route',
                'image' => asset($image_folder_name . 'documents/route.png'),
                'description' => 'Routes seperated in admin, auth, api and front part and take a look they are easy to read and understand.',
                'view_code_url' => 'front.components.documents.route',
            ],
            [
                'title' => 'Controller',
                'url' => 'controller',
                'image' => asset($image_folder_name . 'documents/controller.png'),
                'description' => 'Every controller in cms admin is extended from baseListController and every thing will be ready.',
                'view_code_url' => 'front.components.documents.controller',
            ],
            [
                'title' => 'Export, Import, Print',
                'url' => 'export-import-print',
                'image' => asset($image_folder_name . 'documents/export-import-print.png'),
                'description' => 'Admin panel contains three urls to import, export and print all the data in that table.',
                'view_code_url' => 'front.components.documents.export-import-print',
            ],
            [
                'title' => 'API',
                'url' => 'api',
                'image' => asset($image_folder_name . 'documents/api.png'),
                'description' => 'All apis is ready! There is a powefull baseApiController that needed to be extended and your api is fully ready.',
                'view_code_url' => 'front.components.documents.api',
            ],
            [
                'title' => 'Notification',
                'url' => 'notification',
                'image' => asset($image_folder_name . 'documents/notification.png'),
                'description' => 'Sending notification for different events like login, register, update profile and create a factor with multilanuage support is ready to use.',
                'view_code_url' => 'front.components.documents.notification',
            ],
            [
                'title' => 'Test',
                'url' => 'test',
                'image' => asset($image_folder_name . 'documents/test.png'),
                'description' => 'For all admin routes there are tests that can be run by vendor/bin/phpunit.',
                'view_code_url' => 'front.components.documents.test',
            ],
            [
                'title' => 'File',
                'url' => 'file',
                'image' => asset($image_folder_name . 'documents/file.png'),
                'description' => 'Uploading video, multiple files, validation on it, create thumbnail for images is ready now.',
                'view_code_url' => 'front.components.documents.file',
            ],
            [
                'title' => 'About',
                'url' => 'about',
                'content' => '<h1>About</h1>',
                'description' => 'About page description',
                'activated' => 0,
                'google_index' => 1,
            ],
            [
                'title' => 'Contact',
                'url' => 'contact',
                'content' => '',
                'description' => 'Contact with me on whats app +4915730275229',
                'activated' => 1,
                'google_index' => 1,
            ],
        ];

        foreach($pages as $page){
            $page['language'] = 'en';
            Page::updateOrCreate(['url' => $page['url']], $page);
        }

        // Setting
        $general_settings = [
            'app_title' => 'Laravel CMS',
            'default_meta_title' => 'Laravel CMS',
            'default_meta_description' => 'Laravel CMS is an open source project with Laravel developed by both basic and advanced services and packages.',
            'logo' => asset($image_folder_name . 'setting-logo.png'),
            'favicon' => asset($image_folder_name . 'setting-favicon.png'),
            'default_meta_image' => asset($image_folder_name . 'setting-logo.png'),
            'android_application_url' => 'https://play.google.com/store/apps',
            'ios_application_url' => 'https://sibapp.com/applications',
            'google_map_code' => 'AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s',
            'google_analytics_id' => null,
            'site_verification_google_code' => null,
            'hotjar_id' => null,
            'crisp_id' => 'c6b3db25-3302-4828-b315-60ca45b03b4e',
        ];

        $contact_settings = [
            'email' => 'farid.sh69@gmail.com',
            'phone' => '+4915730275229',
            'whatsapp' => '+4915730275229',
            'telephone' => '+4915730275229',
            'fax' => '+4915730275229',
            'address' => 'Frankfurt Rhine-Main Metropolitan Area',
            'latitude' => '8.6821',
            'longitude' => '50.1109',
            'google_plus' => 'farid.sh69',
            'twitter' => 'faridsh69',
            'facebook' => 'faridsh69',
            'skype' => 'live:farid.sh69',
            'instagram' => 'it_manager_sh',
            'telegram' => 'faridsh69',
            'linkedin' => 'fullstackphpjs',
            'github' => 'faridsh69',
            'stackoverflow' => 'fullstackphpjs',
        ];

        $developer_settings = [
            'app_language' => 'en',
            'theme' => 'classic',
            'theme_color_1' => '',
            'theme_color_2' => '',
            'scripts' => '<script> console.log("Laravel is running..."); </script>',
            'styles' => '<style>  </style>',
            'email_username' => 'cms.laravel.os@gmail.com',
            'email_password' => 'uqiawbziifrgskhu',
            'sms_driver' => 'raygansms',
            'sms_sender' => '9830006859000705',
            'sms_api_key' => 'muhammadc22:1234567891',
        ];
        SettingGeneral::updateOrCreate(['id' => 1], $general_settings);
        SettingDeveloper::updateOrCreate(['id' => 1], $developer_settings);
        SettingContact::updateOrCreate(['id' => 1], $contact_settings);

        // Block
        $blocks = Block::whereIn('type', ['map', 'blog', 'product', 'service', 'pricing', 'video'])->get();

        foreach($blocks as $block){
            $block->activated = 0;
            $block->save();
        }

        // Module
        $modules = [
            // Menu
            [
                'type' => 'menu',
                'title' => 'Home',
                'url' => '/',
            ],
            [
                'type' => 'menu',
                'title' => 'Document',
                'url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Getting Started',
                'url' => 'getting-started',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Setting',
                'url' => 'setting',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Model',
                'url' => 'model',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Form',
                'url' => 'form',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Migration',
                'url' => 'migration',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Factory',
                'url' => 'factory',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Seeder',
                'url' => 'seeder',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Route',
                'url' => 'route',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Controller',
                'url' => 'controller',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'API',
                'url' => 'api',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'File',
                'url' => 'file',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Notification',
                'url' => 'notification',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Test',
                'url' => 'test',
                'parent_url' => 'document',
            ],
            [
                'type' => 'menu',
                'title' => 'Contact',
                'url' => 'contact',
            ],

            // Header
            [
                'type' => 'header',
                'title' => 'Laravel CMS',
                'description' => 'Full Featured CMS',
                'url' => 'document',
                'image' => $image_folder_name . 'header-1.png',
            ],
            [
                'type' => 'header',
                'title' => 'Everything Is Ready!',
                'description' => 'Just define your logic',
                'url' => 'document-model',
                'image' => $image_folder_name . 'header-2.png',
            ],
            // Breadcrumb
            [
                'type' => 'breadcrumb',
                'image' => $image_folder_name . 'breadcrumb.png',
            ],
            // Main Feature
            [
                'type' => 'main_feature',
                'title' => 'Easy to use',
                'icon' => 'fa fa-book', // ti-mobile
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'main_feature',
                'title' => 'Loved by all developers',
                'icon' => 'fa fa-users', // ti-money
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'main_feature',
                'title' => 'Fully supported',
                'icon' => 'fa fa-phone', // ti-settings
            ],
            // Feature
            [
                'type' => 'feature',
                'title' => 'Open source',
                'icon' => 'fa fa-cloud-upload',
                'description' => 'Feel free to contribute to this open source project.',
            ],
            [
                'type' => 'feature',
                'title' => 'Multi language',
                'icon' => 'fa fa-language',
                'description' => 'This cms is multi lingual, both admin and front side.',
            ],
            [
                'type' => 'feature',
                'title' => 'Understable',
                'icon' => 'fa fa-binoculars',
                'description' => 'You can read document and find out its design patterns.',
            ],
            [
                'type' => 'feature',
                'title' => 'Everything is ready',
                'icon' => 'fa fa-thumbs-o-up',
                'description' => 'Everything is ready, you just need to write your logic.',
            ],
            [
                'type' => 'feature',
                'title' => 'Responsive Themes',
                'icon' => 'fa fa-desktop',
                'description' => '4 well designed themes are ready for this cms.',
            ],
            [
                'type' => 'feature',
                'title' => 'Fast response',
                'icon' => 'fa fa-tachometer',
                'description' => 'Appropriate Caches used in this cms.',
            ],
            // Introduce
            [
                'type' => 'introduce',
                'title' => 'Why Laravel CMS',
                'description' => 'Developed by farid shahidi - farid.sh69@gmail.com',
                'content' => '
Laravel CMS is an open source project that creates a complete infrastructure with standard code for anyone who wants to use Laravel. Preparing an structure to visualization Laravel development in the future:
<br>
Specify columns in model => migration, form, seeder, factory, table, api, export to pdf and excel will be ready with complete admin panel codes!
<br>
Prepared services for notification, saving gallery images, creating backup, API authentication, create blogs with comments, rate, categorize and tag, create pages and menus, policies, routes, controllers, and unit tests.
<br>
Provided structure for adding theme to Laravel project with blocks and widgets.
',
                'url' => 'document',
                'image' => $image_folder_name . 'introduce.png',
            ],
            // Video
            [
                'type' => 'video',
                'title' => 'Video Title',
                'video' => $video_folder_name . 'video.mp4',
            ],
            // Counting
            [
                'type' => 'counting',
                'title' => 'Services Available',
                'description' => 130,
                'icon' => 'fa fa-book',
            ],
            [
                'type' => 'counting',
                'title' => 'Developers',
                'description' => 339,
                'icon' => 'fa fa-users',
            ],
            [
                'type' => 'counting',
                'title' => 'Automated Tests',
                'description' => 187,
                'icon' => 'fa fa-cloud-upload',
            ],
            [
                'type' => 'counting',
                'title' => 'Projects',
                'description' => 237,
                'icon' => 'fa fa-tachometer',
            ],
            // Products
            [
                'type' => 'product',
                'product_id' => 1,
            ],
            // Services
            [
                'type' => 'service',
                'title' => 'Model',
                'url' => 'model',
                'image' => $image_folder_name . 'documents/model.png',
            ],
            [
                'type' => 'service',
                'title' => 'Form',
                'url' => 'form',
                'image' => $image_folder_name . 'documents/form.png',
            ],
            [
                'type' => 'service',
                'title' => 'Migration',
                'url' => 'form',
                'image' => $image_folder_name . 'documents/migration.png',
            ],
            [
                'type' => 'service',
                'title' => 'Notification',
                'url' => 'form',
                'image' => $image_folder_name . 'documents/notification.png',
            ],
            // Pricing
            [
                'type' => 'pricing',
                'title' => 'Advanced',
                'description' => 'free',
                'content' => 'Advanced features',
                'order' => 3,
            ],
            // Testimonial
            [
                'type' => 'testimonial',
                'title' => 'Consultant',
                'full_name' => 'Taylor Otwell',
                'description' => '“ I love this cms, it really complete and well designed. ”',
                'image' => $image_folder_name . 'testimonial-1.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'Manager',
                'full_name' => 'Navid Ma',
                'description' => '“ We used all of our experience in many enterprise projects in this cms ”',
                'image' => $image_folder_name . 'testimonial-2.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'Graphic Designer',
                'full_name' => 'Elizabeth Sm',
                'description' => '“ I desgined all of its themes on edge of technology ”',
                'image' => $image_folder_name . 'testimonial-3.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'Chief Technology Officer',
                'full_name' => 'Farid Sh',
                'description' => '“ Love beautifull code? I do too! ”',
                'image' => $image_folder_name . 'testimonial-4.png',
            ],
            // FAQ
            [
                'type' => 'faq',
                'title' => 'What is the best benefit of laravel cms?',
                'description' => 'It is complete and very fast and easy to develop',
            ],
            [
                'type' => 'faq',
                'title' => 'How I can use it?',
                'description' => 'Take a look at models and just define what you need in your project',
            ],
            // Partner
            [
                'type' => 'partner',
                'url' => '//menew.ir',
                'image' => $image_folder_name . 'partner-1.png',
            ],
            [
                'type' => 'partner',
                'url' => '//neuropmr.ir',
                'image' => $image_folder_name . 'partner-2.png',
            ],
            [
                'type' => 'partner',
                'url' => '//menew.ir',
                'image' => $image_folder_name . 'partner-3.png',
            ],
            [
                'type' => 'partner',
                'url' => '//menew.ir',
                'image' => $image_folder_name . 'partner-4.png',
            ],
            [
                'type' => 'partner',
                'url' => '//menew.ir',
                'image' => $image_folder_name . 'partner-5.png',
            ],
            // Team
            [
                'type' => 'team',
                'title' => 'Consultant',
                'full_name' => 'Taylor Otwell',
                'image' => $image_folder_name . 'team-1.png',
            ],
            [
                'type' => 'team',
                'title' => 'Manager',
                'full_name' => 'Navid Ma',
                'image' => $image_folder_name . 'team-2.png',
            ],
            [
                'type' => 'team',
                'title' => 'Graphic Designer',
                'full_name' => 'Elizabeth Sm',
                'image' => $image_folder_name . 'team-3.png',
            ],
            [
                'type' => 'team',
                'title' => 'Chief Technology Officer',
                'full_name' => 'Farid Shahidi',
                'image' => $image_folder_name . 'team-4.png',
            ],
        ];

        $modules_old = Module::whereIn('type', ['menu', 'header', 'breadcrumb', 'main_feature', 'feature', 'product', 'pricing', 'service', 'partner', 'introduce', 'video', 'faq', 'testimonial'])->get();

        foreach($modules_old as $module){
            $module->activated = 0;
            $module->save();
        }

        $order = 3;
        foreach($modules as $module){
            $order += 3;
            $module['order'] = $order;
            $module['language'] = 'en';
            $module['activated'] = 1;
            if(isset($module['image'])){
                $module['image'] = asset($module['image']);
            }
            if(isset($module['video'])){
                $module['video'] = asset($module['video']);
            }
            if(! isset($module['title'])){
                $module['title'] = $module['type'];
            }
            if(isset($module['parent_url'])){
                $parent = Module::where('url', $module['parent_url'])->orderBy('id', 'desc')->first();
                $module['parent_id'] = $parent->id;
                unset($module['parent_url']);
            }
            Module::firstOrCreate($module);
        }
    }
}
