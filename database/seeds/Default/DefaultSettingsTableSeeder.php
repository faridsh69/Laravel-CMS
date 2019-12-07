<?php

use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use Illuminate\Database\Seeder;

class DefaultSettingsTableSeeder extends Seeder
{
	public function run()
	{
	    $database_name = config('database.connections.mysql.database');
	    $folder_name = substr($database_name, 9, 6);
	    $image_folder_name = '/storage/photos/shares/' . $folder_name . '/';
		$general_settings = [
			'app_title' => 'App Title',
			'default_meta_title' => 'App Title',
			'default_meta_description' => 'App Desciption should be about 60 characters',
			'logo' => $image_folder_name . '1-logo.png',
			'favicon' => $image_folder_name . '2-favicon.png',
			'default_meta_image' => $image_folder_name . '1-logo.png',
			'default_user_image' => $image_folder_name . '3-user.png',
			'default_product_image' => $image_folder_name . '1-logo.png',
			'google_index' => '1',
			'pagination_number' => '8',
			'android_application_url' => 'https://play.google.com/store/apps',
			'ios_application_url' => 'https://sibapp.com/applications',
			'introduce_video_url' => $image_folder_name . '5-video.mp4',
			'introduce_video_cover_photo' => $image_folder_name . '4-video.png',
			'subscribe_description' => 'General Setting Subscribe Description.',
			'contact_us_description' => 'General Setting Contactus Description.',
			'google_analytics_id' => '',
			'hotjar_id' => '',
			'crisp_id' => '',
        ];

        $contact_settings = [
			'email' => 'farid.sh69@gmail.com',
			'mobile' => '+989120568203',
			'phone' => '+989120568203',
			'fax' => '+989120568203',
			'address' => 'تهران - زعفرانیه - خیابان آصف - پلاک 93 - واحد 1',
			'latitude' => '35.751138',
			'longitude' => '51.323043',
			'google_plus' => 'farid.sh69',
			'twitter' => 'faridsh69',
			'facebook' => 'faridsh69',
			'skype' => 'live:faridsh69',
			'instagram' => 'faridsh69',
			'telegram' => 'faridsh69',
        ];

        $developer_settings = [
			'app_debug' => '1',
			'app_env' => 'production',
			'app_language' => 'fa',
			'theme' => '1-original',
			'theme_color_1' => $this->random_color(),
			'theme_color_2' => $this->random_color(),
			'direction' => 'ltr',
			'throttle' => '15,0.2',
			'lazy_loading' => '1',
			'email_username' => 'farid.sh69@gmail.com',
			'email_password' => 'email@password',
			'email_default_ccc' => 'farid.sh69@gmail.com',
			'email_default_subject' => 'Laravel Cms',
			'scripts' => '<script> console.log("Laravel is running..."); </script>',
			'seo_title_min' => '2',
			'seo_title_max' => '70',
			'seo_url_max' => '80',
			'seo_url_regex' => '/^[a-z0-9-]+$/',
        ];

        SettingGeneral::updateOrCreate(['id' => 1], $general_settings);
        SettingDeveloper::updateOrCreate(['id' => 1], $developer_settings);
        SettingContact::updateOrCreate(['id' => 1], $contact_settings);
    }

    private function random_color_part() {
	    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}
	private function random_color() {
	    return '#' . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}
}
