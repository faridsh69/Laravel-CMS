<?php

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
	Route::get('', 'BlogController@index')->name('index');
	Route::get('categories', 'BlogController@getCategories')->name('categories');
	Route::get('categories/{category_url}', 'BlogController@getCategory')->name('category');
	Route::get('tags', 'BlogController@getTags')->name('tags');
	Route::get('tags/{tag_url}', 'BlogController@getTag')->name('tag');
	Route::get('{blog_url}', 'BlogController@show')->name('show');
});
Route::post('subscribe', 'PageController@postSubscribe')->name('page.subscribe')->middleware('throttle:4,2');
Route::get('{page_url?}', 'PageController@getIndex')->name('page.index');



Route::group(['prefix' => 'test-windy', 'as' => 'test.windy.'], function () {
	Route::get('offline', 'TestMapController@getOffline')->name('offline');
	Route::get('offline-city', 'TestMapController@getOfflineCity')->name('offline-city');
	Route::get('test-tiles/{zoom}/{x}/{y}', 'TestMapController@getTitlesImages')->name('tiles-images');
	Route::get('test-tiles-labels/en/{zoom}/{x}/{y}', 'TestMapController@getTitlesLabels')->name('tiles-labels');
	Route::get('users/info', 'TestMapController@getUsersInfo')->name('users.info');
	Route::get('sedlina/ga/{id}', 'TestMapController@getSedlinaGa')->name('sedlina.ga');
	Route::get('node/forecast/v2.4/ecmwf/{lat}/{lng}', 'TestMapController@getNodeForecast')->name('node.forecast');
	Route::get('node/capalerts/{lat}/{lng}', 'TestMapController@getNodeCapalerts')->name('node.capalerts');
	Route::get('node/geoip', 'TestMapController@getNodeGeoip')->name('node.geoip');

	Route::get('ims/ecmwf-hres/{year}/{param1}/{param2}/{param3}/{param4}/{param5}/{param6}/wind-surface.jpg', 'TestMapController@getWindSurface')->name('ims.ecmwf-hres');
});

Route::group(['prefix' => 'test-eric', 'as' => 'test.eric.'], function () {
	Route::get('upload-image', 'TestController@getUploadImage')->name('upload-image');
	Route::get('access-token', 'TestController@getAccessToken')->name('access-token');
	Route::get('new-job', 'TestController@getNewJob')->name('new-job');
	Route::post('new-job', 'TestController@postNewJob')->name('post-new-job');
	Route::get('url-parameter', 'TestController@getParameter')->name('url-parameter');
	Route::get('thank-you', 'TestController@getThankYou')->name('thank-you');
	Route::get('redirected', 'TestController@getRedirected')->name('redirected');
});