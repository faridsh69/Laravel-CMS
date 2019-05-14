<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('seo_header', '\App\Rules\SeoHeading@passes');

        // Validator::extend('seo_header', function ($attribute, $value, $parameters, $validator) {
        //     return true';
        // });
    }
}
