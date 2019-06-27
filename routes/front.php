<?php

Route::get('blogs', 'BlogController@index')->name('blog.index');
Route::get('blogs/categories', 'BlogController@getCategories')->name('blog.categories');
Route::get('blogs/categories/{category_url}', 'BlogController@getCategory')->name('blog.category');
Route::get('blogs/tags', 'BlogController@getTags')->name('blog.tags');
Route::get('blogs/tags/{tag_url}', 'BlogController@getTag')->name('blog.tag');
Route::get('blogs/{blog_url}', 'BlogController@show')->name('blog.show');
Route::get('video', 'PageController@getVideo')->name('page.video');
Route::get('{page_url?}', 'PageController@index')->name('page.index');
