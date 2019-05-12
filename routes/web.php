<?php

Route::group(['namespace' => 'Admin', 'middleware' => ['throttle:20,0.2', 'auth'], 'as' => 'admin.'], function () {
	Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function () {
		Route::get('', 'DashboardController@index')->name('index');
		Route::get('profile', 'DashboardController@getProfile')->name('profile');
	});
	Route::group(['prefix' => 'setting', 'namespace' => 'Setting', 'as' => 'setting.'], function () {
		Route::get('general', 'SettingController@getGeneral')->name('general');
		Route::get('contact', 'SettingController@getContact')->name('contact');
		Route::get('log', 'SettingController@getLog')->name('log');
		Route::get('backup', 'SettingController@getBackup')->name('backup');
		Route::get('developer-options/basic', 'SettingController@getDeveloperOptionsBasic')->name('developer-options.basic');
		Route::get('developer-options/advance', 'SettingController@getDeveloperOptionsAdvance')->name('developer-options.advance');
	});
	Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
		Route::resource('list', 'ResourceController');
		Route::get('role', 'UserController@getRole')->name('role');
		Route::get('permission', 'UserController@getPermission')->name('permission');
		Route::get('registration-setting', 'UserController@getRegistrationSetting')->name('registration-setting');
	});
	Route::group(['prefix' => 'seo', 'namespace' => 'Seo', 'as' => 'seo.'], function () {
		Route::get('setting', 'SeoController@getSetting')->name('setting');
		Route::get('content-rules', 'SeoController@getContentRules')->name('content-rules');
		Route::get('lazy-loading', 'SeoController@getLazyLoading')->name('lazy-loading');
	});
	Route::group(['prefix' => 'form', 'namespace' => 'Form', 'as' => 'form.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'blog', 'namespace' => 'Blog', 'as' => 'blog.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'page', 'namespace' => 'Page', 'as' => 'page.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'category', 'namespace' => 'Category', 'as' => 'category.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'media', 'namespace' => 'Media', 'as' => 'media.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'comment', 'namespace' => 'Comment', 'as' => 'comment.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'theme', 'namespace' => 'Theme', 'as' => 'theme.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'block', 'namespace' => 'Block', 'as' => 'block.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'widget', 'namespace' => 'Widget', 'as' => 'widget.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'menu', 'namespace' => 'Menu', 'as' => 'menu.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'report', 'namespace' => 'Report', 'as' => 'report.'], function () {
		Route::resource('list', 'ResourceController');
	});
	Route::group(['prefix' => 'notification', 'namespace' => 'Notification', 'as' => 'notification.'], function () {
		Route::resource('list', 'ResourceController');
	});
});	


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', function() {
	return redirect()->route('admin.dashboard.index');
});