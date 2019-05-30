<?php

namespace App\Providers;

use App\Policies\BlogPolicy;
use App\Policies\PagePolicy;
use App\Policies\BasePolicy;
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
        'App\Base\BaseDependency' => BasePolicy::class,
        'App\Models\Blog' => BlogPolicy::class,
        'App\Models\Page' => PagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before(function ($user, $ability) {
        //     return $user->hasRole('Super Admin') ? true : null;
        // });

        Passport::routes();
    }
}
