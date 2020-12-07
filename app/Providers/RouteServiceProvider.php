<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->mapAdminRoutes();
        $this->mapApiRoutes();
        $this->mapAuthRoutes();
        $this->mapFilemanagerRoutes();
        $this->mapFrontRoutes();
    }

    protected function mapAdminRoutes()
    {
        Route::namespace($this->namespace . '\Admin')
            ->as('admin.')
            ->prefix('admin')
            ->middleware(['web', 'auth'])
            ->group(base_path('routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::namespace($this->namespace . '\Api')
            ->as('api.')
            ->prefix('api')
            ->middleware(['api', 'throttle:' . config('setting-developer.throttle')])
            ->group(base_path('routes/api.php'));
    }

    protected function mapAuthRoutes()
    {
        Route::namespace($this->namespace . '\Auth')
            ->as('auth.')
            ->prefix('auth')
            ->middleware('web')
            ->group(base_path('routes/auth.php'));
    }

    protected function mapFrontRoutes()
    {
        Route::namespace($this->namespace . '\Front')
            ->as('front.')
            ->middleware('web')
            ->group(base_path('routes/front.php'));
    }

    protected function mapFilemanagerRoutes()
    {
        Route::group(['prefix' => 'admin/filemanager', 'middleware' => ['web', 'auth', 'can:index,App\Models\File']], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
    }
}
