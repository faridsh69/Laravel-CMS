<?php

Route::get('', 'ShopController@getIndex')->name('shop.index');
Route::get('dashboard', 'ShopController@getDashboard')->name('shop.dashboard');
Route::get('image/product/{product_id}/{width}', 'ImageController@getProduct')->name('shop.image');
