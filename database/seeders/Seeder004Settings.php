<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\{SettingContact, SettingDeveloper, SettingGeneral};
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

final class Seeder004Settings extends Seeder
{
	public function run(): void
	{
		$laravelCmsFolder = storage_path() . config('cms.config.cms_files');

		$generalSettings = [
			'app_title' => 'App Title',
			'default_meta_title' => 'App Title',
			'default_meta_description' => 'App desciption about this website that will be show on social networks.',
			'logo' => 'logo.png',
			'favicon' => 'favicon.png',
			'google_index' => '1',
			'pagination_number' => '6',
			'android_application_url' => 'https://play.google.com/store/apps',
			'ios_application_url' => 'https://sibapp.com/applications',
			'google_map_code' => 'AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s',
			'google_analytics_id' => null,
			'site_verification_google_code' => null,
			'hotjar_id' => null,
			'crisp_id' => null,
		];

		$contactSettings = [
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

		$developerSettings = [
			'app_debug' => true,
			'app_env' => 'development',
			'app_language' => 'en',
			'auto_language' => false,
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
			'email_username' => 'cms.laravel.os@gmail.com',
			'email_password' => 'uqiawbziifrgskhu1',
			'sms_driver' => 'raygansms',
			'sms_sender' => '9830006859000705',
			'sms_api_key' => 'muhammadc22:1234567891',
			'notification_events' => [
				'password_changed_sms',
				'user_registered_mail',
				'document_rejected_sms',
				'factor_created_sms',
				'factor_created_mail',
				'form_submitted_sms',
				'site_notification_mail'
			],
		];
		SettingDeveloper::updateOrCreate([
			'id' => 1,
		], $developerSettings);
		SettingContact::updateOrCreate([
			'id' => 1,
		], $contactSettings);
		// SettingGeneral::updateOrCreate(['id' => 1], $generalSettings);

		$logoName = $generalSettings['logo'];
		unset($generalSettings['logo']);
		$uploadLogoFile = $laravelCmsFolder . $logoName;
		$generalSettings['logo'] = new UploadedFile($uploadLogoFile, $uploadLogoFile);

		$faviconName = $generalSettings['favicon'];
		unset($generalSettings['favicon']);
		$uploadFaviconFile = $laravelCmsFolder . $faviconName;
		$generalSettings['favicon'] = new UploadedFile($uploadFaviconFile, $uploadFaviconFile);

		$settingGeneralRepository = new SettingGeneral();
		$settingGeneralRepository->saveWithRelations($generalSettings);
	}

	private function random_color_part()
	{
		return str_pad(dechex(mt_rand(0, 255)), 2, '0', \STR_PAD_LEFT);
	}

	private function random_color()
	{
		return '#' . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}
}
