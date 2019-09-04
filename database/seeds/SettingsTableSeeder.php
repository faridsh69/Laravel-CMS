<?php

use Illuminate\Database\Seeder;
use App\Models\SettingGeneral;
use App\Models\SettingContact;
use App\Models\SettingDeveloper;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general_settings = [
			'app_title' => 'laravel cms',
			'default_meta_title' => 'laravel cms',
			'default_meta_description' => 'https://github.com/faridsh69/cms is this cms github.',
			'logo' => '//www.cms-laravel.com/cdn/images/logo.png',
			'favicon' => '//www.cms-laravel.com/cdn/images/favicon.png',
			'default_meta_image' => '//www.cms-laravel.com/cdn/images/logo.png',
			'default_user_image' => '//www.cms-laravel.com/cdn/images/user.jpg',
			'default_product_image' => '//www.cms-laravel.com/cdn/images/product.png',
			'google_index' => '1',
			'pagination_number' => '10',
			'android_application_url' => 'https://play.google.com/store/apps',
			'ios_application_url' => 'https://sibapp.com/applications',
			'introduce_video_url' => '//www.cms-laravel.com/cdn/images/video.mp4',
			'introduce_video_cover_photo' => '//www.cms-laravel.com/cdn/images/video.jpg',
			'subscribe_description' => 'Join our team.',
			'contact_us_description' => 'Dont hesitate to cantact with us.',
        ];

        $contact_settings = [
			'email' => 'farid.sh69@gmail.com',
			'mobile' => '+989120568203',
			'phone' => '+989120568203',
			'fax' => '+989120568203',
			'address' => 'Iran, Tehran, Ferdos street',
			'latitude' => '35.731138',
			'longitude' => '51.313043',
			'google_plus' => 'farid.sh69',
			'twitter' => 'faridsh69',
			'facebook' => 'faridsh69',
			'skype' => 'live:faridsh69',
			'instagram' => 'faridsh69',
			'telegram' => 'faridsh69',
        ];

        $developer_settings = [
			'app_debug' => '1',
			'app_env' => '1',
			'theme' => 'capp',
			'cdn_url' => '//www.cms-laravel.com/cdn/',
			'throttle' => '15,0.2',
			'lazy_loading' => '1',
			'email_username' => 'farid.sh69@gmail.com',
			'email_password' => '********',
			'email_default_ccc' => 'farid.sh69@gmail.com',
			'email_default_subject' => 'Laravel Cms',
			'scripts' => '<script> console.log("Script is running..."); </script>',
        ];

        SettingGeneral::updateOrCreate(['id' => 1], $general_settings);
        SettingDeveloper::updateOrCreate(['id' => 1], $developer_settings);
        SettingContact::updateOrCreate(['id' => 1], $contact_settings);
    }
}
