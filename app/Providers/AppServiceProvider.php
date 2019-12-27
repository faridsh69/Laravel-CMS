<?php

namespace App\Providers;

use App;
use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use Cache;
use Illuminate\Support\ServiceProvider;
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
        if(isset($_SERVER['SERVER_NAME'])){
            $server_name = $_SERVER['SERVER_NAME'];
            $database_name = 'faridsh_0' . substr($server_name, 4, 6);
            config(['database.connections.mysql.database' => $database_name]);
        }

        $seconds = 5;
        if(! Schema::hasTable('setting_generals') || SettingGeneral::first() === null){
            return 'general settings does not exist!';
        }
        $general_settings = Cache::remember('setting.general', $seconds, function () {
            $general_setings_database = SettingGeneral::first();
            if($general_setings_database) {return $general_setings_database->toArray(); }
            return [];
        });
        $contact_settings = Cache::remember('setting.contact', $seconds, function () {
            $contact_setings_database = SettingContact::first();
            if($contact_setings_database) {return $contact_setings_database->toArray(); }
            return [];
        });
        $developer_settings = Cache::remember('setting.developer', $seconds, function () {
            $developer_setings_database = SettingDeveloper::first();
            if($developer_setings_database) {return $developer_setings_database->toArray(); }
            return [];
        });
        config(['setting-general' => $general_settings]);
        config(['setting-contact' => $contact_settings]);
        config(['setting-developer' => $developer_settings]);
        App::setLocale(config('setting-developer.app_language'));
        config(['app.env' => config('setting-developer.app_env')]);
        config(['app.name' => config('setting-general.app_title')]);
        config(['app.debug' => config('setting-developer.app_debug')]);
        config(['sms.driver' => config('setting-developer.sms_driver')]);
        config(['sms.sender' => config('setting-developer.sms_sender')]);
        config(['sms.api_key' => config('setting-developer.sms_api_key')]);
        config(['mail.username' => config('setting-developer.email_username')]);
        config(['mail.password' => config('setting-developer.email_password')]);
        config(['mail.from.name' => config('setting-general.app_title')]);
        config(['mail.from.address' => config('setting-developer.email_username')]);
        config(['mail.reply_to.name' => config('setting-general.app_title')]);
        config(['mail.reply_to.address' => config('setting-developer.email_username')]);
        // Validator::extend('seo_header', '\App\Rules\SeoHeading@passes');
    }
}
