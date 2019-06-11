<?php

Auth::routes();
Route::get('login/{social_company}', 'Auth\LoginController@redirectToProvider')->name('login-social');
Route::get('login/{social_company}/callback', 'Auth\LoginController@handleProviderCallback')->name('login-social-redirect');

// Route::get('/home', 'Front\HomeController@getHome')->name('home');
// Route::get('', 'Front\HomeController@getHome')->name('index');

// Route::get('test', 'Front\TestController@index')->name('test');
