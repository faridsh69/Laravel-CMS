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

Route::get('user', 'GeneralController@getUser')->name('user')->middleware('auth:api');

Route::group(['middleware' => ['throttle:5,0.2']], function () {
	Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
		Route::get('countries', 'GeneralController@getCountries')->name('countries');
	});
});
