<?php

namespace App\Providers;

use App\Policies\BlogPolicy;
use App\Policies\PagePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\UserPolicy;
use App\Policies\SettingPolicy;
use App\Policies\TagPolicy;
use App\Policies\FormPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Blog' => BlogPolicy::class,
        'App\Models\Page' => PagePolicy::class,
        'App\Models\Category' => CategoryPolicy::class,
        'App\Models\User' => UserPolicy::class,
        'App\Models\Setting' => SettingPolicy::class,
        'App\Models\Tag' => TagPolicy::class,
        'App\Models\Form' => FormPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super_admin') ? true : null;
        });

        Passport::routes();
    }
}
