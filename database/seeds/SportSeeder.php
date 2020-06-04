<?php

use App\Models\Block;
use App\Models\Category;
use App\Models\GymAction;
use App\Models\Module;
use App\Models\Page;
use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public function run()
    {
    	$language = 'fa';
        $folder_name = 'sport';
  		$image_folder_name = '/storage/photos/' . $folder_name . '/';
  		$video_folder_name = '/storage/videos/' . $folder_name . '/';

        // Category
        $categories = [
            [
             	'type' => 'GymAction',
             	'url' => 'jolo-bazo',
                'title' => 'جلو بازو',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'posht-bazo',
                'title' => 'پشت بازو',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'shekam',
                'title' => 'پهلو و شکم',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'jolo-ran',
                'title' => 'ﺟﻠﻮ ﺭاﻥ',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'posht-ran',
                'title' => 'ﭘﺸﺖ ﺭاﻥ',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'zirbaghal',
                'title' => 'زیربغل',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'sine',
                'title' => 'سینه',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'sarshone',
                'title' => 'سرشانه',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'kool',
                'title' => 'کول',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'sagh-pa',
                'title' => 'ساق پا',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'saed',
                'title' => 'ساعد',
            ],
        ];

        foreach($categories as $category){
            $category['language'] = $language;
            Category::firstOrCreate($category);
        }

        // Tag
        $tags = [
            [
             	'type' => 'GymAction',
             	'url' => 'havazi',
                'title' => 'هوازی',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'azole saz',
                'title' => 'عضله سازی',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'harekate-sangin',
                'title' => 'حرکت سنگین',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'harekate-sabok',
                'title' => 'حرکت سبک',
            ],
            [
             	'type' => 'GymAction',
             	'url' => 'esteghamati',
                'title' => 'استقامتی',
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
                'title' => 'تنکوک سامانه جامع ورزشی',
                'url' => null,
                'image' => asset($image_folder_name . 'setting-logo.png'),
                'description' => 'تنکوک سامانه جامع ورزشی  - 
در راستای خدمت رسانی به ورزشکاران به اطلاع رسانی دقیق و حرفه ای به ورزشکاران عزیز به بهترین نحور درخدمت شماست.',
            ],
//             [
//                 'title' => 'حرکات ورزشی',
//                 'url' => 'gym-action',
//                 'image' => asset($image_folder_name . 'setting-logo.png'),
//                 'description' => '
// حرکات ورزشی را باید بصورت دقیق انجام داد و در اینجا لیست کاملی از حرکات ارایه شده است',
//             ],
            [
                'title' => 'درباره ما',
                'url' => 'about',
                'content' => 'در این صفحه به زودی درباره ما را می خوانید.',
                'description' => '
تنکوک سامانه جامع ورزشی  - 
در راستای خدمت رسانی به ورزشکاران به اطلاع رسانی دقیق و حرفه ای به ورزشکاران عزیز به بهترین نحور درخدمت شماست.
                ',
                'activated' => 1,
                'google_index' => 1,
            ],
            [
                'title' => 'تماس با ما',
                'url' => 'contact',
                'content' => '',
                'description' => 'Contact with me on whats app +4915730275229',
                'activated' => 1,
                'google_index' => 1,
            ],
        ];

        foreach($pages as $page){
            $page['language'] = $language;
            Page::updateOrCreate(['url' => $page['url']], $page);
        }

        // Setting
        $general_settings = [
            'app_title' => 'تنکوک سامانه جامع ورزشی
',
            'default_meta_title' => 'تنکوک سامانه جامع ورزشی
',
            'default_meta_description' => '
در راستای خدمت رسانی به ورزشکاران به اطلاع رسانی دقیق و حرفه ای به ورزشکاران عزیز به بهترین نحور درخدمت شماست..',
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
            'app_language' => $language,
            'direction' => false,
            'theme' => 'classic',
            'theme_color_1' => '',
            'theme_color_2' => '',
            'scripts' => '<script> console.log("Laravel is running..."); </script>',
            'styles' => '<style>  </style>',
            'email_username' => 'cms.laravel.os@gmail.com',
            'email_password' => 'uqiawbziifrgskhu1',
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
                'title' => '
خانه',
                'url' => '',
            ],
            [
                'type' => 'menu',
                'title' => 'حرکات ورزشی',
                'url' => 'gym-action',
            ],
			[
                'type' => 'menu',
                'title' => 'برنامه ورزشی',
                'url' => 'gym-program',
            ],
			[
                'type' => 'menu',
                'title' => 'برنامه تغذیه',
                'url' => 'food-program',
            ],
			[
                'type' => 'menu',
                'title' => 'بلاگ',
                'url' => 'blog',
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
                'title' => 'تنکوک سامانه جامع ورزشی',
                'description' => 'در خدمت ورزشکاران',
                'url' => 'gym-action',
                'image' => $image_folder_name . 'header-1.png',
            ],
            [
                'type' => 'header',
                'title' => 'خدمات آنلاین ورزشی',
                'description' => 'اطلاعات جامع ورزشی',
                'url' => 'gym-action',
                'image' => $image_folder_name . 'header-2.png',
            ],
            [
                'type' => 'breadcrumb',
                'image' => $image_folder_name . 'breadcrumb.png',
            ],
            [
                'type' => 'main_feature',
                'title' => 'استفاده آسان',
                'icon' => 'fa fa-book', // ti-mobile
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'main_feature',
                'title' => 'محبوب ورزشکاران',
                'icon' => 'fa fa-users', // ti-money
                'description' => 'Feature Description, Feature Description, Feature Description',
            ],
            [
                'type' => 'main_feature',
                'title' => 'پشتیبانی کامل',
                'icon' => 'fa fa-phone', // ti-settings
            ],
            // Feature
            [
                'type' => 'feature',
                'title' => 'دسترسی آسان',
                'icon' => 'fa fa-cloud-upload',
                'description' => 'Feel free to contribute to this open source project.',
            ],
            [
                'type' => 'feature',
                'title' => 'چند زبانه',
                'icon' => 'fa fa-language',
                'description' => 'This cms is multi lingual, both admin and front side.',
            ],
            [
                'type' => 'feature',
                'title' => 'جامع و کامل',
                'icon' => 'fa fa-binoculars',
                'description' => 'You can read document and find out its design patterns.',
            ],
            [
                'type' => 'feature',
                'title' => 'مناسب تمام سنین',
                'icon' => 'fa fa-thumbs-o-up',
                'description' => 'Everything is ready, you just need to write your logic.',
            ],
            [
                'type' => 'feature',
                'title' => 'گرافیم زیبا',
                'icon' => 'fa fa-desktop',
                'description' => '4 well designed themes are ready for this cms.',
            ],
            [
                'type' => 'feature',
                'title' => 'ریسپامسیو',
                'icon' => 'fa fa-tachometer',
                'description' => 'Appropriate Caches used in this cms.',
            ],
            // Introduce
            [
                'type' => 'introduce',
                'title' => 'پرا تنکوم ؟',
                'description' => 'Developed by farid shahidi - farid.sh69@gmail.com',
                'content' => '
تنکوک سامانه حجامع ورزشی در خهدمت شماست.
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
                'title' => 'مربی های ما',
                'description' => 130,
                'icon' => 'fa fa-book',
            ],
            [
                'type' => 'counting',
                'title' => 'ورزشکاران',
                'description' => 339,
                'icon' => 'fa fa-users',
            ],
            [
                'type' => 'counting',
                'title' => 'تغداد حرمات ورزشی',
                'description' => 187,
                'icon' => 'fa fa-cloud-upload',
            ],
            [
                'type' => 'counting',
                'title' => 'تعداد برنامه های ورزشی',
                'description' => 237,
                'icon' => 'fa fa-tachometer',
            ],
            // Products
            // [
            //     'type' => 'product',
            //     'product_id' => 1,
            // ],
            // Services
            // [
            //     'type' => 'service',
            //     'title' => 'Model',
            //     'url' => 'model',
            //     'image' => $image_folder_name . 'documents/model.png',
            // ],
            // [
            //     'type' => 'service',
            //     'title' => 'Form',
            //     'url' => 'form',
            //     'image' => $image_folder_name . 'documents/form.png',
            // ],
            // [
            //     'type' => 'service',
            //     'title' => 'Migration',
            //     'url' => 'form',
            //     'image' => $image_folder_name . 'documents/migration.png',
            // ],
            // [
            //     'type' => 'service',
            //     'title' => 'Notification',
            //     'url' => 'form',
            //     'image' => $image_folder_name . 'documents/notification.png',
            // ],
            // Pricing
            // [
            //     'type' => 'pricing',
            //     'title' => 'Advanced',
            //     'description' => 'free',
            //     'content' => 'Advanced features',
            //     'order' => 3,
            // ],
            // Testimonial
            [
                'type' => 'testimonial',
                'title' => 'Consultant',
                'full_name' => 'ارمغان مسایلی',
                'description' => '“ 
من این سامانه را خیلی دوس دارم و تمام شاگردانم را تشویق میکنم اطلاعات دقیق خود را از آن دریافت نمایید. ”',
                'image' => $image_folder_name . 'testimonial-1.png',
            ],
            [
                'type' => 'testimonial',
                'title' => 'مدیر سایت',
                'full_name' => 'نئید منصوری',
                'description' => '“ 
در ارتباط با ورزش تمام اطلاعات دقیق و خدمات آنلاین را از ما بخواهید ”',
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
                'full_name' => 'فرید شهیدی',
                'description' => '“ Love beautifull code? I do too! ”',
                'image' => $image_folder_name . 'testimonial-4.png',
            ],
            // FAQ
            [
                'type' => 'faq',
                'title' => 'خدمات ارزنده این ساین چیسنت?',
                'description' => 'It is complete and very fast and easy to develop',
            ],
            [
                'type' => 'faq',
                'title' => 'روزش استفاده  صیحیح از برنامه ها جیست?',
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
                'full_name' => 'ارمغان مسایلی',
                'image' => $image_folder_name . 'team-1.png',
            ],
            [
                'type' => 'team',
                'title' => 'Manager',
                'full_name' => 'نوید منصوری',
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
                'full_name' => 'فرید  شهیدی',
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
            $module['language'] = $language;
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

	    // Gym Action
	    $gym_actions = [
	        [
	            'title' => 'جلو بازو سیم کش از پشت',
	            'url' => 'front-arm-drawer',
	            'description' => '',
	            'content' => 'یک دسته را به قرقره دستگاه سیم کش وصل کنید ، دستگیره را در دست چپ خود بکشید و یک قدم به جلو (به دور از دستگاه) بردارید تا اینکه در کابل تنش ایجاد شود و بازوی شما کمی به پشت بدن شما کشیده شود. پای خود را محکم کنید تا پای راست شما در جلو باشد. دسته را بچرخانید اما اجازه ندهید که آرنج شما به جلو حرکت کند..
',
	            'image' => 'front-arm/drawer.jpg',
	            'category' => 'ﺟﻠﻮ ﺑﺎﺯﻭ',
	            'tags' => 'ﻋﻀﻠﻪ ﺳﺎﺯ|ﺣﺮﮐﺖ ﺳﻨﮕﯿﻦ',
	            'relateds' => '',
	            'activated' => 1,
	        ],
	        [
	            'title' => 'چلو بازو لاری با هارتل',
	            'url' => 'front-arm-lari',
	            'description' => '',
	            'content' => 'روی یک نیمکت لاری بنشینید و ارتفاع را طوری تنظیم کنید که زیر بغل شما بالای نیمکت قرار بگیرد.هارتل را در عرض شانه ها با بازوها بکشید(اجازه دهید ارنج ها کمی خم باشد). هازتل را بالا بکشید و قسمت پشتی بازوهای خود را در برابر نیمکت نگه دارید. سه ثانیه طول بکشد تا هارتل به پایین پایین بیاید.
',
	            'image' => 'front-arm/lari.jpg',
	            'category' => 'ﺟﻠﻮ ﺑﺎﺯﻭ',
	            'tags' => 'ﻋﻀﻠﻪ ﺳﺎﺯ|ﺣﺮﮐﺖ ﺳﻨﮕﯿﻦ',
	            'relateds' => '',
	            'activated' => 1,
	        ],
	        [
	            'title' => 'جلو بازو هارتل مچ برعکس',
	            'url' => 'front-arm-halter',
	            'description' => '',
	            'content' => 'رهارتل را در هر پهنای آن  که راحت باشید بچرخانید. بازوها را در دوطرف خود نگه دارید ، هارتل را بالا بیاورید.

',
	            'image' => 'front-arm/halter.jpg',
	            'category' => 'ﺟﻠﻮ ﺑﺎﺯﻭ',
	            'tags' => 'ﻋﻀﻠﻪ ﺳﺎﺯ|ﺣﺮﮐﺖ ﺳﻨﮕﯿﻦ',
	            'relateds' => '',
	            'activated' => 1,
	        ],
	    ];

	    foreach($gym_actions as $gym_action){
	    	$category = Category::ofType('GymAction')->where('title', $gym_action['category'])->first();
	    	$gym_action_model = new GymAction();
	    	$gym_action_model->title = $gym_action['title'];
	    	$gym_action_model->url = $gym_action['url'];
	    	$gym_action_model->description = $gym_action['description'];
	    	$gym_action_model->content = $gym_action['content'];
	    	$gym_action_model->image = asset($image_folder_name . 'gym-action/' . $gym_action['image']);
	    	$gym_action_model->category_id = $category->id;
	        $gym_action_model->language = $language;
	        $gym_action_model->activated = 1;

	        if(! GymAction::where('url', $gym_action_model->url)->first()){
		        $gym_action_model->save();

		        $tags = Tag::ofType('GymAction')->whereIn('title', explode('|', $gym_action['tags']))->get();
		        $gym_action_model->tags()->sync($tags);
		        $gym_actions_related = GymAction::orderBy('id', 'desc')->take(4)->get();
		        $gym_action_model->relateds()->sync($gym_actions_related);
		    }
	    }
	}
}
