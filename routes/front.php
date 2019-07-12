<?php

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
	Route::get('', 'BlogController@index')->name('index');
	Route::get('categories', 'BlogController@getCategories')->name('categories');
	Route::get('categories/{category_url}', 'BlogController@getCategory')->name('category');
	Route::get('tags', 'BlogController@getTags')->name('tags');
	Route::get('tags/{tag_url}', 'BlogController@getTag')->name('tag');
	Route::get('{blog_url}', 'BlogController@show')->name('show');
});
Route::get('video', 'PageController@getVideo')->name('page.video');
Route::post('subscribe', 'PageController@postSubscribe')->name('page.subscribe')
	->middleware('throttle:4,2');
Route::get('{page_url?}', 'PageController@getIndex')->name('page.index');

// Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
// 	Route::get('upload-image', 'TestController@getUploadImage')->name('upload-image');
// 	Route::get('access-token', 'TestController@getAccessToken')->name('access-token');
// 	Route::get('new-job', 'TestController@getNewJob')->name('new-job');
// 	Route::post('new-job', 'TestController@postNewJob')->name('post-new-job');
// 	Route::get('url-parameter', 'TestController@getParameter')->name('url-parameter');
// 	Route::get('thank-you', 'TestController@getThankYou')->name('thank-you');
// 	Route::get('redirected', 'TestController@getRedirected')->name('redirected');
// });

// Route::group(['prefix' => 'test-menew', 'as' => 'test.menew.'], function () {
// 	Route::get('register-restaurant', 'TestMenewController@getRegisterRestaurant')->name('register-restaurant');
// 	Route::post('register-restaurant', 'TestMenewController@postRegisterRestaurant')->name('post-register-restaurant');
// 	Route::get('register-thank-you', 'TestMenewController@getRegisterThankYou')->name('register-thank-you');
// });
