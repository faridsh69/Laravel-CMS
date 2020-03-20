<?php

namespace App\Providers;

use App\Policies\ActivityPolicy;
use App\Policies\AddressPolicy;
use App\Policies\AnswerPolicy;
use App\Policies\BlockPolicy;
use App\Policies\BlogPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\FactorPolicy;
use App\Policies\FieldPolicy;
use App\Policies\FilePolicy;
use App\Policies\FormPolicy;
use App\Policies\ModulePolicy;
use App\Policies\NotificationPolicy;
use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\SettingContactPolicy;
use App\Policies\SettingDeveloperPolicy;
use App\Policies\SettingGeneralPolicy;
use App\Policies\TagendPolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Address' => AddressPolicy::class,
        'App\Models\Activity' => ActivityPolicy::class,
        'App\Models\Answer' => AnswerPolicy::class,
        'App\Models\Block' => BlockPolicy::class,
        'App\Models\Blog' => BlogPolicy::class,
        'App\Models\Category' => CategoryPolicy::class,
        'App\Models\Comment' => CommentPolicy::class,
        'App\Models\Factor' => FactorPolicy::class,
        'App\Models\Field' => FieldPolicy::class,
        'App\Models\Form' => FormPolicy::class,
        'App\Models\File' => FilePolicy::class,
        'App\Models\Notification' => NotificationPolicy::class,
        'App\Models\Module' => ModulePolicy::class,
        'App\Models\Page' => PagePolicy::class,
        'App\Models\Permission' => UserPolicy::class,
        'App\Models\Product' => ProductPolicy::class,
        'App\Models\Role' => UserPolicy::class,
        'App\Models\SettingGeneral' => SettingGeneralPolicy::class,
        'App\Models\SettingContact' => SettingContactPolicy::class,
        'App\Models\SettingDeveloper' => SettingDeveloperPolicy::class,
        'App\Models\Tag' => TagPolicy::class,
        'App\Models\Tagend' => TagendPolicy::class,
        'App\Models\User' => UserPolicy::class,
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
