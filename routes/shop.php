<?php

Route::get('', 'ShopController@getIndex')->name('index');
// Route::get('vue', 'ShopController@getVue')->name('vue');
// Route::get('image/product/{product_id?}/{width?}', 'ImageController@getProduct')->name('image');
Route::get('comment', 'ShopController@getComment')->name('comment');
Route::get('comment-ui', 'ShopController@getCommentUI')->name('comment');
Route::post('comment', 'ShopController@postComment')->name('post-comment');

Route::get('login', 'DashboardController@getLogin')->name('login');
Route::post('logout', 'DashboardController@postLogout')->name('shop-logout');
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
	Route::get('', 'DashboardController@index')->name('index');
	Route::get('comment', 'DashboardController@getComment')->name('comment');
	Route::post('showItem/{id?}', 'DashboardController@showItem')->name('showItem');
	Route::post('itemStore', 'DashboardController@itemStore')->name('item.store');
	Route::post('batchStore', 'DashboardController@batchStore')->name('batch.store');

	// this link redirected to dashboard should fix
	Route::post('deleteMainPic', 'DashboardController@deleteMainPic')->name('deleteMainPic');
	Route::post('removeItemGalleryFile', 'DashboardController@removeItemGalleryFile')->name('removeItemGalleryFile');
	Route::post('uploadGallery/{id?}', 'DashboardController@uploadGallery')->name('uploadGallery');
	Route::post('changeCardSortInBatchPage', 'DashboardController@changeCardSortInBatchPage')->name('changeCardSortInBatchPage');
	Route::post('test', 'DashboardController@test')->name('test');
	Route::post('updateItem/{id}', 'DashboardController@updateItem')->name('updateItem');
	Route::post('changeItemSort', 'DashboardController@changeItemSort')->name('changeItemSort');
	Route::post('changeStatus/{id?}', 'DashboardController@changeStatus')->name('changeStatus');

	Route::post('updateCard/{id?}', 'DashboardController@updateCard')->name('updateCard');
	Route::post('hideItem', 'DashboardController@hideItem')->name('hideItem');
	Route::post('changeBatchStatus/{id?}', 'DashboardController@changeBatchStatus')->name('changeBatchStatus');
	// this links are not working
	Route::get('setIndex', 'DashboardController@setIndex')->name('set.index');
	Route::get('removeItemTag', 'DashboardController@removeItemTag')->name('removeItemTag');
	Route::get('setStore', 'DashboardController@setStore')->name('set.store');

	Route::get('settings', 'DashboardController@settingsIndex')->name('settings.index');
	Route::post('changeSetting', 'DashboardController@changeSetting')->name('changeSetting');

	Route::get('releaseTable', 'DashboardController@releaseTable')->name('release.table');
	Route::get('menumakerIndex', 'DashboardController@menumakerIndex')->name('menumaker.index');
	Route::get('ordersInfo', 'DashboardController@ordersInfo')->name('orders.info');
	Route::get('ordersHistory', 'DashboardController@ordersHistory')->name('orders.history');
});
