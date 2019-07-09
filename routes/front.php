<?php

Route::get('blogs', 'BlogController@index')->name('blog.index');
Route::get('blogs/categories', 'BlogController@getCategories')->name('blog.categories');
Route::get('blogs/categories/{category_url}', 'BlogController@getCategory')->name('blog.category');
Route::get('blogs/tags', 'BlogController@getTags')->name('blog.tags');
Route::get('blogs/tags/{tag_url}', 'BlogController@getTag')->name('blog.tag');
Route::get('blogs/{blog_url}', 'BlogController@show')->name('blog.show');
Route::get('video', 'PageController@getVideo')->name('page.video');
Route::post('subscribe', 'PageController@postSubscribe')->name('page.subscribe')
	->middleware('throttle:4,2');
Route::get('{page_url?}', 'PageController@getIndex')->name('page.index');

Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
	Route::get('upload-image', 'TestController@getUploadImage')->name('upload-image');
	Route::get('access-token', 'TestController@getAccessToken')->name('access-token');
	Route::get('new-job', 'TestController@getNewJob')->name('new-job');
	Route::post('new-job', 'TestController@postNewJob')->name('post-new-job');
	Route::get('url-parameter', 'TestController@getParameter')->name('url-parameter');
	Route::get('thank-you', 'TestController@getThankYou')->name('thank-you');
	Route::get('redirected', 'TestController@getRedirected')->name('redirected');
});
