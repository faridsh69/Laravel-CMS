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
        $seconds = 1;
        $this->policies = Cache::remember('policies', $seconds, function () {
            $model_slugs = config('cms.policies');
            $models_namespace = config('cms.config.models_namespace');
            $policies = [];
            foreach($model_slugs as $model_slug){
                $model_name = Str::studly($model_slug);
                $model_namespace = $models_namespace. $model_name;
                $model_policy = 'App\Policies\\'. $model_name. 'Policy';
                $policies[$model_namespace] = $model_policy;
            }

            return $policies;
        });
        $this->registerPolicies();

        Gate::define('manage', function ($user, $page) {
            return $user->can($page. '_manager');
        });

        Passport::routes();
    }
}
