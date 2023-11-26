<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{RateLimiter, Route};

final class RouteServiceProvider extends ServiceProvider
{
	/**
	 * The path to the "home" route for your application.
	 *
	 * This is used by Laravel authentication to redirect users after login.
	 *
	 * @var string
	 */
	public const HOME = '/';

	/**
	 * The controller namespace for the application.
	 *
	 * When present, controller route declarations will automatically be prefixed with this namespace.
	 *
	 * @var null|string
	 */
	protected $namespace = 'App\\Http\\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 */
	public function boot(): void
	{
		$this->configureRateLimiting();

		$this->bootAdminRoutes();
		$this->bootAuthRoutes();
		$this->bootFrontRoutes();
		$this->bootApiRoutes();
		$this->bootGeneralApiRoutes();
	}

	protected function configureRateLimiting(): void
	{
		RateLimiter::for(
			'api',
			fn (Request $request) => Limit::perMinute(360)->by(optional($request->user())->id ?: $request->ip())
		);
	}

	protected function bootAdminRoutes(): void
	{
		Route::namespace($this->namespace . '\Admin')
			->as('admin.')
			->prefix('admin')
			->middleware(['web', 'auth'])
			->group(base_path('routes/admin.php'));
	}

	protected function bootAuthRoutes(): void
	{
		Route::namespace($this->namespace . '\Auth')
			->as('auth.')
			->prefix('auth')
			->middleware('web')
			->group(base_path('routes/auth.php'));
	}

	protected function bootFrontRoutes(): void
	{
		Route::namespace($this->namespace . '\Front')
			->as('front.')
			->middleware('web')
			->group(base_path('routes/front.php'));
	}

	protected function bootApiRoutes(): void
	{
		Route::namespace($this->namespace . '\Api')
			->as('api.')
			->prefix('api')
			->middleware(['auth:api'])
			->group(base_path('routes/api.php'));
	}

	protected function bootGeneralApiRoutes(): void
	{
		Route::namespace($this->namespace . '\GeneralApi')
			->as('generalapi.')
			->prefix('general-api')
			// ->middleware(['auth:api'])
			->group(base_path('routes/generalApi.php'));
	}
}
