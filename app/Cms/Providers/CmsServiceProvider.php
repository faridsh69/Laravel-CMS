<?php

declare(strict_types=1);

namespace App\Cms\Providers;

use App;
use App\Models\{Module, SettingContact, SettingDeveloper, SettingGeneral};
use Cache;
use Schema;
use Validator;
use View;

final class CmsServiceProvider
{
	public static function bootCms()
	{
		if (!Schema::hasTable('setting_generals') || SettingGeneral::first() === null) {
			return 'general settings does not exist!';
		}
		$general_settings = Cache::remember('setting.general', config('cms.config.cache_time'), function () {
			$general_setings_database = SettingGeneral::first();
			if ($general_setings_database) {
				$general_setings_database->logo = $general_setings_database->avatar('logo');
				$general_setings_database->favicon = $general_setings_database->avatar('favicon');

				return $general_setings_database->toArray();
			}

			return [];
		});
		$contact_settings = Cache::remember('setting.contact', config('cms.config.cache_time'), function () {
			$contact_setings_database = SettingContact::first();
			if ($contact_setings_database) {
				return $contact_setings_database->toArray();
			}

			return [];
		});
		$developer_settings = Cache::remember('setting.developer', config('cms.config.cache_time'), function () {
			$developer_setings_database = SettingDeveloper::first();
			if ($developer_setings_database) {
				return $developer_setings_database->toArray();
			}

			return [];
		});

		config([
			'setting-general' => $general_settings,
		]);
		config([
			'setting-contact' => $contact_settings,
		]);
		config([
			'setting-developer' => $developer_settings,
		]);
		App::setLocale(config('setting-developer.app_language'));
		config([
			'app.env' => config('setting-developer.app_env'),
		]);
		config([
			'app.name' => config('setting-general.app_title'),
		]);
		config([
			'app.debug' => config('setting-developer.app_debug'),
		]);
		config([
			'sms.driver' => config('setting-developer.sms_driver'),
		]);
		config([
			'sms.sender' => config('setting-developer.sms_sender'),
		]);
		config([
			'sms.api_key' => config('setting-developer.sms_api_key'),
		]);
		config([
			'mail.username' => config('setting-developer.email_username'),
		]);
		config([
			'mail.password' => config('setting-developer.email_password'),
		]);
		config([
			'mail.from.name' => config('setting-general.app_title'),
		]);
		config([
			'mail.from.address' => config('setting-developer.email_username'),
		]);
		config([
			'mail.reply_to.name' => config('setting-general.app_title'),
		]);
		config([
			'mail.reply_to.address' => config('setting-developer.email_username'),
		]);
		if (config('setting-developer.auto_language')) {
			$language = 'en';
			// you can check the user ip and set language here
			App::setLocale($language);
		}
		Validator::extend('seo_headings', '\App\Rules\SeoHeading@passes');

		$modules = Cache::remember('modules', config('cms.config.cache_time'), function () {
			return Module::active()
				->with('children')
				->orderBy('order', 'asc')
				->orderBy('id', 'desc')
				->get();
		});
		View::share('modules', $modules);
	}
}
