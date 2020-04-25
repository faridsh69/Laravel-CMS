<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Str;
use Cache;

class AuthServiceProvider extends ServiceProvider
{
    public $policies = [
        // 'App\Models\User' => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $seconds = 30;
        $policies = Cache::remember('policies', $seconds, function () {
            $model_slugs = config('cms.policies');
            $models_namespace = config('cms.config.models_namespace');
            foreach($model_slugs as $model_slug){
                $model_name = Str::studly($model_slug);
                $model_namespace = $models_namespace. $model_name;
                $model_policy = 'App\Policies\\'. $model_name. 'Policy';
                if(!file_exists(__DIR__. '\..\..\\'. $model_policy. '.php')){
                    $model_policy = 'App\Policies\Policy';
                }
                $this->policies[$model_namespace] = $model_policy;
            }
        });

        Gate::define('manage', function ($user, $page) {
            return $user->can($page. '_manager');
        });

        $this->registerPolicies();
        Passport::routes();
    }
}
