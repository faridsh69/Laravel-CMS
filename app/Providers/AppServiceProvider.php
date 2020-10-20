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
use View;

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
        if(env('DB_DATABASE') == ''){
            $database_name = '';
            if(isset($_SERVER['SERVER_NAME'])){
                $domain_map = [
                    'www.cms.test' => 'cms',
                    'www.sport.test' => 'test_cms',
                    'www.cms-laravel.com' => 'faridsh_0cms-la',
                    'www.tankouk.com' => 'faridsh_0tankou',
                    'www.faridshahidi.ir' => 'faridsh_0farids',
                    'www.navidmansouri.ir' => 'faridsh_0navidm',
                    'www.moneyconverter.ir' => 'faridsh_0moneyc',
                    'www.khodro-emdad.ir' => 'faridsh_0khodro',

                    'www.shopsang.ir' => 'faridsh_0shopsa',
                    'www.azimizarf.ir' => 'faridsh_0azimiz',
                    'www.iranzibai.ir' => 'faridsh_0iranzi',
                    'www.repairsite.ir' => 'faridsh_0repair',
                    'www.mdfdecor.ir' => 'faridsh_0mdfdec',
                    'www.sanatishir.ir' => 'faridsh_0sanati',
                    'www.rotbeyek.ir' => 'faridsh_0rotbey',
                    'www.remotedeveloper.ir' => 'faridsh_0remote',
                    'www.googleshops.ir' => 'faridsh_0google',
                    'www.supermarkety.ir' => 'faridsh_0superm',
                    'www.dairytools.ir' => 'faridsh_0dairyt',
                    'www.fitnesgym.ir' => 'faridsh_0fitnes',
                    'www.mobileforoshy.ir' => 'faridsh_0mobile',
                    'www.maedejalalkhah.ir' => 'faridsh_0maedej',
                    'www.reservehospital.ir' => 'faridsh_0reserv',
                    'www.marklebas.ir' => 'faridsh_0markle',
                ];
                $server_name = $_SERVER['SERVER_NAME'];
                $database_name = $domain_map[$server_name];
            }
            config(['database.connections.mysql.database' => $database_name]);
        }
        $seconds = 1;
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
        if(config('setting-developer.auto_language')){
            $language = 'en';
            // you can check the user ip and set language here
            App::setLocale($language);
        }
        Validator::extend('seo_headings', '\App\Rules\SeoHeading@passes');

        $modules = Cache::remember('modules', $seconds, function () {
            return \App\Models\Module::active()
                ->language()
                ->with('children')
                ->orderBy('order', 'asc')
                ->orderBy('id', 'desc')
                ->get();
        });
        View::share('modules', $modules);
    }
}
