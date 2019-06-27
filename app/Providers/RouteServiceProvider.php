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
        // $domain_parts = explode('.', \Request::getHost());
        // if(count($domain_parts) === 4){
        //     if($domain_parts[1] === 'admin'){
                
        //     }
        //     else{
        //         $domain_parts[1]);
        //     }
        // }
        // dd($domain_parts);
        // dd($base_domain);
        // Route::domain('{account}.{domain}.com')->group(function () {
        //     dd($domain);
        //     Route::get('', function ($account) {
        //         dd($account);
        //     });
        // });
        // $base_domain = \Request::getHost();
        // if(strpos($base_domain, 'admin') !== false){
        // $this->mapAdminRoutes();
        // $this->mapShopRoutes();
        // $this->mapWebRoutes();
        // $this->mapFrontRoutes();
        // $this->mapApiRoutes();
        
        $this->mapAdminRoutes();
        $this->mapShopRoutes();
        $this->mapApiRoutes();
        $this->mapAuthRoutes();
        $this->mapFrontRoutes();
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'throttle:25,0.1', 'auth'])
            ->domain('www.admin.mmenew.com')
            ->as('admin.')
            ->namespace($this->namespace . '\Admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapShopRoutes()
    {
        Route::middleware(['web', 'throttle:15,0.1'])
            ->domain('www.cofe.mmenew.com')
            ->as('shop.')
            ->namespace($this->namespace . '\Shop')
            ->group(base_path('routes/shop.php'));
    }

    protected function mapFrontRoutes()
    {
        Route::middleware(['web'])
            ->as('front.')
            ->namespace($this->namespace . '\Front')
            ->group(base_path('routes/front.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->as('api.')
            ->middleware(['api', 'throttle:15,0.3'])
            ->namespace($this->namespace . '\Api')
            ->group(base_path('routes/api.php'));
    }

    protected function mapAuthRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/auth.php'));
    }    
}
