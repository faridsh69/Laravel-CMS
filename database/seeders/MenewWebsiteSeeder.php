<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\{Block, Category, Food, Module, Page, SettingContact, SettingDeveloper, SettingGeneral, Tag, User};
use Illuminate\Database\Seeder;
use Str;

final class MenewWebsiteSeeder extends Seeder
{
	public function run(): void
	{
		$photosFolder = 'storage/temp/menew/';

		// Category
		$categories = [
			[
				'title' => 'Salad',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Appetizer',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Autumn Special',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Breakfast',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Pizza',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Main Course',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Coffee',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Freak Shake',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Cake',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'Cold Drinks',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
		];

		foreach (Category::where('type', 'Food')->get() as $category) {
			$category->activated = 0;
			$category->save();
		}

		foreach ($categories as $category) {
			$category['activated'] = 1;
			$category['language'] = 'en';
			$category['type'] = 'Food';
			$category['url'] = Str::slug($category['title']);
			Category::firstOrCreate($category);
		}

		// Tag
		$tags = [
			[
				'title' => 'Heavy meal',
			],
			[
				'title' => 'Starred',
			],
			[
				'title' => 'Bold',
			],
		];

		foreach (Tag::where('type', 'Food')->get() as $tag) {
			$tag->activated = 0;
			$tag->save();
		}

		foreach ($tags as $tag) {
			$tag['activated'] = 1;
			$tag['language'] = 'en';
			$tag['type'] = 'Food';
			$tag['url'] = Str::slug($tag['title']);
			Tag::firstOrCreate($tag);
		}

		$foods = [
			[
				'title' => 'Peperoni pizza',
				'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2017/06/healthy-nicoise-09b6cd9.jpg',
			],
			[
				'title' => 'stack morgh',
				'image' => 'https://files.menew.ir/1/1/3/conversions/%DA%A9%D8%A7%D9%BE%D9%88%DA%86%DB%8C%D9%86%D9%88-cappuccino-normal.jpeg',
			],
			[
				'title' => 'salad sezar',
				'image' => 'https://files.menew.ir/1/97/181/conversions/سالاد-مرغ-گریل-grilled-chicken-salad-normal.jpg',
			],
		];

		// foreach (Food::get() as $food)
		// {
		// 	$food->activated = 0;
		// 	$food->save();
		// }

		foreach ($foods as $food) {
			$food['activated'] = 1;
			$food['language'] = 'en';
			$food['description'] = 'test';
			$food['url'] = Str::slug($food['title']);
			Food::firstOrCreate($food);
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
				'password' => bcrypt('123456'),
				'activated' => 1,
			],
		];
		foreach ($users as $user) {
			User::updateOrCreate([
				'id' => $user['id'],
			], $user);
		}

		// Page

		// Setting
		$general_settings = [
			'app_title' => 'Menew',
			'default_meta_title' => 'Menew',
			'default_meta_description' => 'Menew is a Digital Restaurant Menu.',
			'logo' => asset($photosFolder . 'logo.png'),
			'favicon' => asset($photosFolder . 'favicon.png'),
			'default_meta_image' => asset($photosFolder . 'logo.png'),
			'android_application_url' => 'https://play.google.com/store/apps',
			'ios_application_url' => 'https://sibapp.com/applications',
			'google_map_code' => 'map-map',
			'google_analytics_id' => null,
			'site_verification_google_code' => null,
			'hotjar_id' => null,
			'crisp_id' => 'crisp',
		];

		$contact_settings = [
			'email' => 'farid.sh69@gmail.com',
			'phone' => '00989120568203',
			'whatsapp' => '00989120568203',
			'telephone' => '00989120568203',
			'fax' => '00989120568203',
			'address' => 'Iran, Tehran',
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
			'scripts' => '<script> console.log("Menew is running..."); </script>',
			'styles' => '<style>  </style>',
			'email_username' => 'cms.laravel.os@gmail.com',
			'email_password' => '123',
			'sms_driver' => 'raygansms',
			'sms_sender' => '9830006859000705',
			'sms_api_key' => 'muhammadc22:123',
		];
		SettingGeneral::updateOrCreate([
			'id' => 1,
		], $general_settings);
		SettingDeveloper::updateOrCreate([
			'id' => 1,
		], $developer_settings);
		SettingContact::updateOrCreate([
			'id' => 1,
		], $contact_settings);

		// Block
	}
}
