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

        // dd( Cache::get('settings.general') );
        // // dd(config('0-developer'));
        // config(['app.asset_url' => Cache::get('settings.general') ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // $seconds = 200;

        // $general_settings = Cache::remember('settings.general', $seconds, function () {
        //     return SettingGeneral::first()->toArray();
        // });

        // dd($general_settings);

        // $general_settings = SettingGeneral::first()->toArray();
        // $contact_settings = SettingContact::first()->toArray();
        // $developer_settings = SettingDeveloper::first()->toArray();
        // config(['0-general' => $general_settings]);
        // config(['0-developer' => $developer_settings]);
        // config(['0-contact' => $contact_settings]);

        // Validator::extend('seo_header', '\App\Rules\SeoHeading@passes');
        // $general_settings = SettingGeneral::first()->toArray();
        // $contact_settings = SettingContact::first()->toArray();
        // $developer_settings = SettingDeveloper::first()->toArray();
        // config(['0-general' => $general_settings]);
        // config(['0-developer' => $developer_settings]);
        // config(['0-contact' => $contact_settings]);
        //     // 'debug' => \Cache::get('settings.app_debug'),

        // config(['app.asset_url' => config('0-developer.cdn_url')]);
        // dd( config('app.asset_url'));

        // dd(config('0-developer'));
        // dd(config('0-general'));

        // config([
        //     '0-general' => SettingGeneral:all([
        //         'name','value'
        //     ])
        //     ->keyBy('name') // key every setting by its name
        //     ->transform(function ($setting) {
        //          return $setting->value // return only the value
        //     })
        //     ->toArray(); // make it an array
        // ]);
    }
}
