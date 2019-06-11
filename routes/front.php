<?php

Route::get('blogs', 'BlogController@index')->name('blog.index');
Route::get('blogs/{blog_url}', 'BlogController@show')->name('blog.show');
Route::get('', 'PageController@index')->name('page.index');
Route::get('{page_url}', 'PageController@show')->name('page.show');
