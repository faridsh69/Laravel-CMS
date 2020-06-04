<?php

$model_slugs = Config::get('cms.api_routes');
foreach($model_slugs as $model_slug)
{
	$controller_name = \Str::studly($model_slug) . '\ResourceController';
	if (! file_exists(__DIR__ . '\..\app\Http\Controllers\Api\\' . $controller_name . '.php')) {
		$controller_name = 'ApiController';
	}
	Route::group(['prefix' => $model_slug, 'as' => $model_slug . '.'], function () use ($controller_name) {
		Route::resource('list', $controller_name);
	});
}

// Route::get('v', 'GeneralController@getVersion')->name('version');
// Route::get('user', 'GeneralController@getUser')->name('user')->middleware('auth:api');

// Route::group([], function () {
// 	Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
// 		Route::get('countries', 'GeneralController@getCountries')->name('countries');
// 		Route::get('cities/{country_name}', 'GeneralController@getCities')->name('cities');
// 	});
// });

// Route::group(['prefix' => 'v1', 'as' => 'v1.', 'namespace' => 'V1'], function () {
// 	Route::resource('category', 'CategoryController');
// 	Route::resource('product', 'ProductController');
// });
