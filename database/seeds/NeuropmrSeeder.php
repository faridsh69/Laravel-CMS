<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;
use App\Models\Block;
use App\Models\User;
use App\Models\Module;
use App\Models\SettingGeneral;
use App\Models\SettingDeveloper;
use App\Models\SettingContact;

class NeuropmrSeeder extends Seeder
{
    public function run()
    {
        $folder_name = 'neuropmr';
		$image_folder_name = '/storage/files/photos/' . $folder_name . '/';
		$video_folder_name = '/storage/files/videos/' . $folder_name . '/';

        // Category
        $categories = [
            [
                'title' => 'سکته مغزی',
            ],
            [
                'title' => 'توانبخشی',
            ],
            [
                'title' => 'مغزواعصاب',
            ],
        ];

        foreach($categories as $category){
            $category['language'] = 'fa';
            Category::firstOrCreate($category);
        }

        // Tag
        $tags = [
            [
                'name' => 'سکته مغزی',
            ],
            [
                'name' => 'توانبخشی',
            ],
            [
                'name' => 'مغزواعصاب',
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
                'first_name' => 'Farzad',
                'last_name' => 'Shahidi',
                'url' => 'farzad-shahidi',
                'email' => 'info@neuropmr.ir',
                'phone' => '09132193852',
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
                'title' => 'خانه',
                'url' => null,
                'content' => null,
                'image' => asset($image_folder_name . 'setting-logo.png'),
                'description' => 'سامانه بیماری های مغزواعصاب و توانبخشی',
                'activated' => 1,
                'google_index' => 1,
                'view_code_url' => '',
            ],
            [
                'title' => 'درباره ما',
                'url' => 'about',
                'content' => '<h1>درباره ما</h1>',
                'description' => 'درباره ما',
                'activated' => 1,
                'google_index' => 1,
            ],
            [
                'title' => 'تماس با ما',
                'url' => 'contact',
                'content' => '',
                'description' => 'تماس با ما',
                'activated' => 1,
                'google_index' => 1,
            ],
        ];

        foreach($pages as $page){
            $page['language'] = 'fa';
            Page::updateOrCreate(['url' => $page['url']], $page);
        }

        // Setting
        $general_settings = [
            'app_title' => 'سامانه بیماری های مغزواعصاب و توانبخشی',
            'default_meta_title' => 'سامانه بیماری های مغزواعصاب و توانبخشی',
            'default_meta_description' => 'سامانه بیماری های مغزواعصاب و توانبخشی در راستای بهبود بخش درمان بیماران مغز و اعصاب دست به ساخت اپلیکیشن کرده است.',
            'logo' => asset($image_folder_name . 'setting-logo.png'),
            'favicon' => asset($image_folder_name . 'setting-favicon.png'),
            'default_meta_image' => asset($image_folder_name . 'setting-logo.png'),
            'default_user_image' => asset($image_folder_name . 'setting-default-user.png'),
            'default_product_image' => asset($image_folder_name . 'setting-default-product.png'),
            'android_application_url' => 'https://play.google.com/store/apps',
            'ios_application_url' => 'https://sibapp.com/applications',
            'google_map_code' => 'AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s',
            'google_analytics_id' => null,
            'site_verification_google_code' => null,
            'hotjar_id' => null,
            'crisp_id' => null,
        ];

        $contact_settings = [
            'email' => 'info@neuropmr.ir',
            'phone' => '09132193852',
            'whatsapp' => '',
            'telephone' => '',
            'fax' => '',
            'address' => 'تهران ایران',
            'latitude' => '51.3890',
            'longitude' => '35.6892',
            'google_plus' => '',
            'twitter' => '',
            'facebook' => '',
            'skype' => '',
            'instagram' => '',
            'telegram' => '',
            'linkedin' => '',
            'github' => '',
            'stackoverflow' => '',
        ];

        $developer_settings = [
            'app_language' => 'fa',
            'auto_language' => false,
            'theme' => 'classic',
            'theme_color_1' => '',
            'theme_color_2' => '',
            'scripts' => '<script> console.log("Laravel is running..."); </script>',
            'styles' => '<style>  </style>',
            'email_username' => 'farid@cms-laravel.com',
            'email_password' => 'Farid1111111',
            'sms_driver' => 'raygansms',
            'sms_sender' => '9830006859000705',
            'sms_api_key' => 'muhammadc22:1234567891',
        ];
        SettingGeneral::updateOrCreate(['id' => 1], $general_settings);
        SettingDeveloper::updateOrCreate(['id' => 1], $developer_settings);
        SettingContact::updateOrCreate(['id' => 1], $contact_settings);

        // Block
        $blocks = Block::whereIn('type', ['map', 'blog', 'product', 'Pricing'])->get();

        foreach($blocks as $block){
            $block->activated = 0;
            $block->save();
        }

        // Module
        $modules = [
            // Menu
            [
                'type' => 'menu',
                'title' => 'خانه',
                'url' => '/',
            ],
            [
                'type' => 'menu',
                'title' => 'درباره ما',
                'url' => 'about',
            ],
            [
                'type' => 'menu',
                'title' => 'تماس با ما',
                'url' => 'contact',
            ],

            // Header
            [
                'type' => 'header',
                'title' => 'سامانه بیماری های مغزواعصاب و توانبخشی',
                'description' => 'سامانه بیماری های مغزواعصاب و توانبخشی',
                'url' => 'document',
                'image' => $image_folder_name . 'header-1.png',
            ],
            [
                'type' => 'header',
                'title' => 'سامانه بیماری های مغزواعصاب و توانبخشی',
                'description' => 'سامانه بیماری های مغزواعصاب و توانبخشی',
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
                'title' => 'آموزش جامع',
                'icon' => 'icon-agenda-1', // ti-mobile
            ],
            [
                'type' => 'main_feature',
                'title' => 'مورد تایید پزشکان',
                'icon' => 'icon-assistance', // ti-money
            ],
            [
                'type' => 'main_feature',
                'title' => 'پشتیبانی 24 ساعته',
                'icon' => 'icon-telephone-3', // ti-settings
            ],
            // Feature
            [
                'type' => 'feature',
                'title' => 'مشخصات دقیق',
                'icon' => 'icon-id-card',
                'description' => 'Feel free to contribute to this open source project.',
            ],
            [
                'type' => 'feature',
                'title' => 'برنامه جهانی',
                'icon' => 'icon-worldwide',
                'description' => 'This cms is multi lingual, both admin and front side.',
            ],
            [
                'type' => 'feature',
                'title' => 'قابل استفاده هر جا',
                'icon' => 'icon-map',
                'description' => 'You can read document and find out its design patterns.',
            ],
            [
                'type' => 'feature',
                'title' => 'سلامتی همیشگی',
                'icon' => 'icon-like',
                'description' => 'Everything is ready, you just need to write your logic.',
            ],
            [
                'type' => 'feature',
                'title' => 'سریع و آسان',
                'icon' => 'icon-responsive',
                'description' => '4 well designed themes are ready for this cms.',
            ],
            [
                'type' => 'feature',
                'title' => 'سریع',
                'icon' => 'icon-message',
                'description' => 'Appropriate Caches used in this cms.',
            ],
            // Introduce
            [
                'type' => 'introduce',
                'title' => 'Why Laravel CMS',
                'description' => 'Developed by Dr Farzad Shahidi',
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
                'title' => 'صفحات اپلیکیشن',
                'description' => 130,
                'icon' => 'icon-agenda-1',
            ],
            [
                'type' => 'counting',
                'title' => 'پزشکان',
                'description' => 339,
                'icon' => 'icon-assistance',
            ],
            [
                'type' => 'counting',
                'title' => 'بیماران بهبود یافته',
                'description' => 1087,
                'icon' => 'icon-id-card',
            ],
            [
                'type' => 'counting',
                'title' => 'کاربران فعال',
                'description' => 237,
                'icon' => 'icon-message',
            ],
            // Products
            [
                'type' => 'product',
                'product_id' => 1,
            ],
            // Services
            [
                'type' => 'service',
                'title' => 'Application page 1',
                'description' => 'Description Application page 1',
                'url' => 'application-1',
                'image' => $image_folder_name . 'service-1.png',
            ],
            [
                'type' => 'service',
                'title' => 'Application page 2',
                'description' => 'Description Application page 2',
                'url' => 'application-1',
                'image' => $image_folder_name . 'service-2.png',
            ],
            [
                'type' => 'service',
                'title' => 'Application page 3',
                'description' => 'Description Application page 3',
                'url' => 'application-1',
                'image' => $image_folder_name . 'service-3.png',
            ],
            [
                'type' => 'service',
                'title' => 'Application page 4',
                'description' => 'Description Application page 4',
                'url' => 'application-1',
                'image' => $image_folder_name . 'service-4.png',
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
                'title' => 'مشاور پزشکی',
                'full_name' => 'دکتر علی ربیعی',
                'description' => '“ I love this cms, it really complete and well designed. ”',
                'image' => $image_folder_name . 'testimonial-1.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'مدیر پروژه',
                'full_name' => 'دکتر اسد احمدی',
                'description' => '“ We used all of our experience in many enterprise projects in this cms ”',
                'image' => $image_folder_name . 'testimonial-2.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'طراح گرافیک',
                'full_name' => 'Elizabeth Sm',
                'description' => '“ I desgined all of its themes on edge of technology ”',
                'image' => $image_folder_name . 'testimonial-3.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'برنامه نویس',
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

        $modules_old = Module::whereIn('type', ['menu', 'header', 'main_feature', 'feature', 'product', 'pricing', 'service', 'partner', 'introduce', 'video', 'faq', 'testimonial'])->get();

        foreach($modules_old as $module){
            $module->activated = 0;
            $module->save();
        }

        $order = 3;
        foreach($modules as $module){
            $order += 3;
            $module['order'] = $order;
            $module['language'] = 'fa';
            $module['activated'] = 1;
            if(isset($module['image'])){
                $module['image'] = asset($module['image']);
            }
            if(isset($module['video'])){
                $module['video'] = asset($module['video']);
            }
            if(!isset($module['title'])){
                $module['title'] = $module['type'];
            }
            if( isset($module['parent_url']) ){
                $parent = Module::where('url', $module['parent_url'])->first();
                $module['parent_id'] = $parent->id;
                unset($module['parent_url']);
            }
            Module::firstOrCreate($module);
        }
    }
}