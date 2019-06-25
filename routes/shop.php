<?php

Route::get('', 'ShopController@getIndex')->name('shop.index');
Route::get('dashboard', 'ShopController@getDashboard')->name('shop.dashboard');
