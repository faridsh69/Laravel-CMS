@extends('front.components.documents.index')
@section('document-data')
<h1>Routes</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p></p><br>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>Routes seperated in admin, auth, api and front part and take a look they are easy to read and understand.</p>
<h2 id="how-to-use">How to use</h2>
<p>All routes are seperated to 4 sections, admin routes all is from config.services.modes.admin_routes and you can delete them from your admin panel if they are not useful for your project.<br> All routes is gaurded by authorization with role and permission.</p>
<pre>        
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
    Route::namespace($this->namespace)
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

</pre>
<h2 id="used-packages">Used Packages</h2>
<pre>
api authentication: "laravel/passport"
role&permission: "spatie/laravel-permission"
file manager: "unisharp/laravel-filemanager": "dev-master",
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/cms/tree/master/routes">Routes folder</a><br>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Providers/RouteServiceProvider.php">RouteServiceProvider</a><br>


@endsection