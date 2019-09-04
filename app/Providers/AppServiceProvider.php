<?php

namespace App\Providers;

use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use Illuminate\Support\ServiceProvider;
use Cache;
use DB;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $seconds = 100;
        $general_settings = Cache::remember('settings.general', $seconds, function () {
            return SettingGeneral::first()->toArray();
        });
        $contact_settings = Cache::remember('settings.contact', $seconds, function () {
            return SettingContact::first()->toArray();
        });
        $developer_settings = Cache::remember('settings.developer', $seconds, function () {
            return SettingDeveloper::first()->toArray();
        });
        config(['0-general' => $general_settings]);
        config(['0-developer' => $developer_settings]);
        config(['0-contact' => $contact_settings]);
        config(['app.debug' => config('0-developer.app_debug') ]);
        config(['app.env' => config('0-developer.app_env') ]);

        Validator::extend('seo_header', '\App\Rules\SeoHeading@passes');
    }
}
