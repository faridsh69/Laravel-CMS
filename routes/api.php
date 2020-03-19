<?php

// Route::get('', 'GeneralController@getVersion')->name('version');
Route::get('user', 'GeneralController@getUser')->name('user')->middleware('auth:api');

Route::group([], function () {
	Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
		Route::get('countries', 'GeneralController@getCountries')->name('countries');
		Route::get('cities/{country_name}', 'GeneralController@getCities')->name('cities');
	});
});

Route::group(['prefix' => 'v1', 'as' => 'v1.', 'namespace' => 'V1'], function () {
	Route::resource('shop', 'ShopController');
	Route::resource('category', 'CategoryController');
	Route::resource('product', 'ProductController');
});
