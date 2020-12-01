<?php

namespace App\Providers;

use Cache;
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
        $seconds = 1;
        $this->policies = Cache::remember('policies', $seconds, function () {
            $modelNameSlugs = config('cms.policies');
            $models_namespace = config('cms.config.models_namespace');
            $policies = [];
            foreach($modelNameSlugs as $modelNameSlug){
                $modelName = Str::studly($modelNameSlug);
                $modelNamespace = $models_namespace . $modelName;
                $model_policy = 'App\Policies\\' . $modelName . 'Policy';
                $policies[$modelNamespace] = $model_policy;
            }

            return $policies;
        });
        $this->registerPolicies();

        Gate::define('manage', function ($user, $page) {
            return $user->can($page . '_manager');
        });

        Passport::routes();
    }
}
