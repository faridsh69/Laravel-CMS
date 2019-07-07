<?php

namespace App\Providers;

use App\Policies\BlockPolicy;
use App\Policies\BlogPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\CountingPolicy;
use App\Policies\FeedbackPolicy;
use App\Policies\FormPolicy;
use App\Policies\MenuPolicy;
use App\Policies\NotificationPolicy;
use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\SettingContactPolicy;
use App\Policies\SettingDeveloperPolicy;
use App\Policies\SettingGeneralPolicy;
use App\Policies\ShopPolicy;
use App\Policies\TagPolicy;
use App\Policies\ThemePolicy;
use App\Policies\UserPolicy;
use App\Policies\WidgetPolicy;
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
        'App\Models\Block' => BlockPolicy::class,
        'App\Models\Widget' => WidgetPolicy::class,
        'App\Models\Theme' => ThemePolicy::class,
        'App\Models\Shop' => ShopPolicy::class,
        'App\Models\Product' => ProductPolicy::class,
        'App\Models\Feedback' => FeedbackPolicy::class,
        'App\Models\Counting' => CountingPolicy::class,
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
