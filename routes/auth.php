<?php

Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login', 'LoginController@authenticate')->name('post-login');
Route::get('register', 'RegisterController@getRegister')->name('register');
Route::get('login/{social_company}', 'LoginController@redirectToProvider')->name('login-social');
Route::get('login/{social_company}/callback', 'LoginController@handleProviderCallback')->name('login-social-redirect');
