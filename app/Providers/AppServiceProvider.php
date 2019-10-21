<?php

namespace App\Providers;

use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use Illuminate\Support\ServiceProvider;
use Cache;
use DB;
use Schema;
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
        $seconds = 10000;
        if(!Schema::hasTable('setting_generals') || SettingGeneral::first() === null){
            return 1;
        }
        $general_settings = Cache::remember('settings.general', $seconds, function () {
            $general_setings_database = SettingGeneral::first(); 
            if($general_setings_database) {return $general_setings_database->toArray();}
            return [];
        });
        $contact_settings = Cache::remember('settings.contact', $seconds, function () {
            $contact_setings_database = SettingContact::first(); 
            if($contact_setings_database) {return $contact_setings_database->toArray();}
            return [];
        });
        $developer_settings = Cache::remember('settings.developer', $seconds, function () {
            $developer_setings_database = SettingDeveloper::first(); 
            if($developer_setings_database) {return $developer_setings_database->toArray();}
            return [];
        });

        config(['0-general' => $general_settings]);
        config(['0-developer' => $developer_settings]);
        config(['0-contact' => $contact_settings]);
        config(['app.debug' => config('0-developer.app_debug') ]);
        config(['app.env' => config('0-developer.app_env') ]);
        config(['app.locale' => config('0-developer.app_language') ]);

        // Validator::extend('seo_header', '\App\Rules\SeoHeading@passes');
    }
}
