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
Route::get('test/upload-image', 'TestController@getUploadImage')->name('page.test-upload-image');
Route::get('test/access-token', 'TestController@getAccessToken')->name('page.test-access-token');
Route::get('test/new-job', 'TestController@getNewJob')->name('page.test-new-job');
Route::post('test/new-job', 'TestController@postNewJob')->name('page.test-post-new-job');
Route::get('{page_url?}', 'PageController@getIndex')->name('page.index');
