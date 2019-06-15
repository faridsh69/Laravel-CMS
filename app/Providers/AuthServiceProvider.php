<?php

namespace App\Providers;

use App\Policies\BlogPolicy;
use App\Policies\PagePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\UserPolicy;
use App\Policies\SettingGeneralPolicy;
use App\Policies\SettingContactPolicy;
use App\Policies\SettingDeveloperPolicy;
use App\Policies\TagPolicy;
use App\Policies\FormPolicy;
use App\Policies\MenuPolicy;
use App\Policies\CommentPolicy;
use App\Policies\NotificationPolicy;
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
        'App\Models\Tag' => TagPolicy::class,
        'App\Models\User' => UserPolicy::class,
        'App\Models\Permission' => UserPolicy::class,
        'App\Models\Role' => UserPolicy::class,
        'App\Models\SettingGeneral' => SettingGeneralPolicy::class,
        'App\Models\SettingContact' => SettingContactPolicy::class,
        'App\Models\SettingDeveloper' => SettingDeveloperPolicy::class,
        'App\Models\Notification' => NotificationPolicy::class,
        'App\Models\Menu' => MenuPolicy::class,
        'App\Models\Comment' => CommentPolicy::class,
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
