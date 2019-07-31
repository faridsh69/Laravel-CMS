<?php

Route::get('', 'ShopController@getIndex')->name('index');
Route::get('image/product/{product_id}/{width}', 'ImageController@getProduct')->name('image');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
	Route::get('', 'DashboardController@index')->name('index');
	Route::get('showItem/{id}', 'DashboardController@showItem')->name('showItem');
	Route::get('itemStore', 'DashboardController@itemStore')->name('item.store');
	Route::get('batchStore', 'DashboardController@batchStore')->name('batch.store');
	Route::get('deleteMainPic', 'DashboardController@deleteMainPic')->name('deleteMainPic');
	Route::get('changeCardSortInBatchPage', 'DashboardController@changeCardSortInBatchPage')->name('changeCardSortInBatchPage');
	Route::get('test', 'DashboardController@test')->name('test');
	Route::get('updateItem', 'DashboardController@updateItem')->name('updateItem');
	Route::get('changeItemSort', 'DashboardController@changeItemSort')->name('changeItemSort');
	Route::get('uploadGallery', 'DashboardController@uploadGallery')->name('uploadGallery');
	Route::get('removeItemGalleryFile', 'DashboardController@removeItemGalleryFile')->name('removeItemGalleryFile');
	Route::get('changeStatus', 'DashboardController@changeStatus')->name('changeStatus');
	Route::get('removeItemTag', 'DashboardController@removeItemTag')->name('removeItemTag');
	Route::get('setStore', 'DashboardController@setStore')->name('set.store');
	Route::get('menumakerIndex', 'DashboardController@menumakerIndex')->name('menumaker.index');
	Route::get('updateCard', 'DashboardController@updateCard')->name('updateCard');
	Route::get('hideItem', 'DashboardController@hideItem')->name('hideItem');
	Route::get('changeBatchStatus', 'DashboardController@changeBatchStatus')->name('changeBatchStatus');
	Route::get('settingsIndex', 'DashboardController@settingsIndex')->name('settings.index');

});