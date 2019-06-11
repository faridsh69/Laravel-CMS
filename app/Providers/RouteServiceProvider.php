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
        $this->mapFrontRoutes();
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapAdminRoutes()
    {
        $admin_domain = 'admin.eric.com';
        $base_domain = \Request::getHost();
        if(strpos($base_domain, "admin") !== false){
            $admin_domain = $base_domain;
        }
        Route::middleware(['web', 'throttle:15,0.2', 'auth'])
            ->domain($admin_domain)
            ->as('admin.')
            ->namespace($this->namespace . '\Admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapFrontRoutes()
    {
        Route::middleware(['web'])
            ->as('front.')
            ->namespace($this->namespace . '\Front')
            ->group(base_path('routes/front.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->as('api.')
            ->middleware(['api', 'throttle:15,0.2'])
            ->namespace($this->namespace . '\Api')
            ->group(base_path('routes/api.php'));
    }
}
