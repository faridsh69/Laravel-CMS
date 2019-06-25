<?php

Route::get('', 'ShopController@index')->name('shop.index');
Route::get('dashboard', 'ShopController@dashboard')->name('shop.dashboard');
