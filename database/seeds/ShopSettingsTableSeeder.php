<?php

use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use Illuminate\Database\Seeder;

class ShopSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general_settings = [
			'app_title' => 'Menew',
			'default_meta_title' => 'MeNEW',
			'default_meta_description' => 'MeNEW is the futue of all menus',
			'logo' => 'http://www.mmenew.ir/cdn/storage/photos/shares/logo.png',
			'favicon' => 'http://www.mmenew.ir/cdn/storage/photos/shares/favicon.png',
			'default_meta_image' => 'http://www.mmenew.ir/cdn/storage/photos/shares/favicon.png',
			'default_user_image' => 'http://www.mmenew.ir/cdn/storage/photos/shares/farid.jpeg',
			'default_product_image' => 'http://www.mmenew.ir/cdn/storage/photos/shares/logo.png',
			'google_index' => '0',
			'pagination_number' => '10',
			'android_application_url' => NULL,
			'ios_application_url' => NULL,
			'introduce_video_url' => 'http://www.mmenew.ir/cdn/css/front/capp/img/menew/video.mp4',
			'introduce_video_cover_photo' => 'http://www.mmenew.ir/cdn/storage/photos/shares/feature-bg07.jpg',
			'subscribe_description' => 'Join our team.',
			'contact_us_description' => 'Become Online with MeNEW',
        ];

        $contact_settings = [
			'email' => 'farid.sh69@gmail.com',
			'mobile' => '+989120568203',
			'phone' => '+989120568203',
			'fax' => '+989120568203',
			'address' => 'Iran,',
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
			// 'cdn_url' => 'http://www.mmenew.ir/cdn',
			'throttle' => '15,0.2',
			'lazy_loading' => '1',
			'email_username' => 'farid.sh69@gmail.com',
			'email_password' => '********',
			'email_default_ccc' => 'farid.sh69@gmail.com',
			'email_default_subject' => 'menew',
			'scripts' => '<script> console.log("Script is running..."); </script>',
        ];

        SettingGeneral::updateOrCreate(['id' => 1], $general_settings);
        SettingDeveloper::updateOrCreate(['id' => 1], $developer_settings);
        SettingContact::updateOrCreate(['id' => 1], $contact_settings);
    }
}
