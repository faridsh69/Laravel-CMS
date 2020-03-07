<?php

use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
	public function run()
	{
	    $database_name = config('database.connections.mysql.database');
	    $folder_name = substr($database_name, 9, 6);
		$image_folder_name = '/storage/files/photos/' . $folder_name . '/';
		$video_folder_name = '/storage/files/videos/' . $folder_name . '/';
		$general_settings = [
			'app_title' => 'App Title',
			'default_meta_title' => 'App Title',
			'default_meta_description' => 'App desciption about this website that will be show on social networks.',
			'logo' => asset($image_folder_name . '1-logo.png'),
			'favicon' => asset($image_folder_name . '2-favicon.png'),
			'default_meta_image' => asset($image_folder_name . '1-logo.png'),
			'default_user_image' => asset($image_folder_name . '3-user.png'),
			'default_product_image' => asset($image_folder_name . '1-logo.png'),
			'google_index' => '1',
			'pagination_number' => '8',
			'android_application_url' => 'https://play.google.com/store/apps',
			'ios_application_url' => 'https://sibapp.com/applications',
			'introduce_video_url' => asset($video_folder_name . '5-video.mp4'),
			'introduce_video_cover_photo' => asset($image_folder_name . '4-video.png'),
			'google_map_code' => 'AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s',
			'google_analytics_id' => null,
			'site_verification_google_code' => null,
			'hotjar_id' => null,
			'crisp_id' => null,
        ];

        $contact_settings = [
			'email' => 'farid.sh69@gmail.com',
			'phone' => '09120568203',
			'whatsapp' => '+989120568203',
			'telephone' => '02144209873',
			'fax' => '09120568203',
			'address' => 'Frankfort, Germany',
			'latitude' => '35.751138',
			'longitude' => '51.323043',
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
			'app_debug' => true,
			'app_env' => 'development',
			'app_language' => 'en',
			'auto_language' => true,
			'theme' => 'classic',
			'theme_color_1' => $this->random_color(),
			'theme_color_2' => $this->random_color(),
			'direction' => true, // rtl, ltr
			'throttle' => '15,0.2',
			'lazy_loading' => true,
			'scripts' => '<script> console.log("Laravel is running..."); </script>',
			'styles' => '<style>  </style>',
			'seo_title_min' => '1',
			'seo_title_max' => '191', // 70
			'seo_url_max' => '191', // 80
			'seo_url_regex' => '/^[a-z0-9-]+$/',
			'email_username' => 'farid@cms-laravel.com',
			'email_password' => 'Farid111111',
			'sms_driver' => 'kavenegar',
			'sms_sender' => '1000596446',
			'sms_api_key' => '676873656D4557322F783138755654636852324A304B42417548425047383671344372796F6A417759444D3DXXXXXX',
			'user_registered_sms' => true,
			'user_registered_mail' => false,
			'user_logined_sms' => false,
			'user_logined_mail' => false,
			'profile_updated_sms' => false,
			'profile_updated_mail' => false,
			'factor_created_sms' => true,
			'factor_created_mail' => false,			
        ];
        SettingGeneral::updateOrCreate(['id' => 1], $general_settings);
        SettingDeveloper::updateOrCreate(['id' => 1], $developer_settings);
        SettingContact::updateOrCreate(['id' => 1], $contact_settings);
    }

    private function random_color_part() {
	    return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
	}

	private function random_color() {
	    return '#' . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}
}
