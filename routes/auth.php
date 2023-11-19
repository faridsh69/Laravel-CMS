<?php

declare(strict_types=1);

Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login', 'LoginController@authenticate')->name('post-login');
Route::get('register', 'RegisterController@getRegister')->name('register');
Route::post('register', 'RegisterController@postRegister')->name('post-register');
Route::post('logout', 'LoginController@logout')->name('logout');
Route::get('forget-password', 'ForgotPasswordController@index')->name('forget-password');
Route::get('login/{social_company}', 'LoginController@redirectToProvider')->name('login-social');
Route::get('login/{social_company}/callback', 'LoginController@handleProviderCallback')->name(
	'login-social-redirect'
);
