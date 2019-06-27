<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', 'GeneralController@getVersion')->name('version');
Route::get('user', 'GeneralController@getUser')->name('user')->middleware('auth:api');

Route::group([], function () {
	Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
		Route::get('countries', 'GeneralController@getCountries')->name('countries');
		Route::get('cities/{country_name}', 'GeneralController@getCities')->name('cities');
	});
});
