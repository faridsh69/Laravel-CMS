<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Str;

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
        // @TODO add cache here for $this->policies
        $model_slugs = config('cms.policies');
        $models_namespace = config('cms.config.models_namespace');
        foreach($model_slugs as $model_slug){
            $model_name = Str::studly($model_slug);
            $model_namespace = $models_namespace. $model_name;
            $model_policy = 'App\Policies\\'. $model_name. 'Policy';
            $model_default_policy = 'App\Policies\ResourcePolicy';
            $this->policies[$model_namespace] = $model_default_policy;
        }
        $this->registerPolicies();

        Gate::define('manage', function ($user, $page) {
            return $user->can($page. '_manager');
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('manager') ? true : null;
        });

        Passport::routes();
    }
}
