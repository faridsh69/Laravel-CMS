<?php

Auth::routes();
Route::get('login/{social_company}', 'Auth\LoginController@redirectToProvider')->name('login-social');
Route::get('login/{social_company}/callback', 'Auth\LoginController@handleProviderCallback')->name('login-social-redirect');
