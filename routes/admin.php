<?php

$model_slugs = Config::get('cms.admin_routes');

foreach($model_slugs as $model_slug)
{
	$controller_name = \Str::studly($model_slug). '\ResourceController';
	if (!file_exists(__DIR__. '\..\app\Http\Controllers\Admin\\'. $controller_name. '.php')) {
		$controller_name = 'AdminController';
	}
	Route::group(['prefix' => $model_slug, 'as' => $model_slug. '.'], function () use ($controller_name) {
		Route::get('datatable', $controller_name. '@datatable')->name('datatable');
		Route::get('export', $controller_name. '@export')->name('export');
		Route::get('import', $controller_name. '@import')->name('import');
		Route::get('print', $controller_name. '@print')->name('print');
		Route::get('toggle-activated/{id}', $controller_name. '@toggleActivated')->name('toggle-activated');
		Route::get('list/{id}/restore', $controller_name. '@restore')->name('list.restore');
		Route::resource('list', $controller_name);
		Route::get('', $controller_name. '@redirect')->name('redirect');
	});
}
Route::get('', 'Dashboard\DashboardController@redirect')->name('redirect');
Route::get('icon/list', 'Dashboard\DashboardController@getIconsList')->name('icon.list.index');
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function () {
	Route::get('', 'DashboardController@index')->name('list.index');
	Route::get('activity', 'DashboardController@getActivity')->name('activity');
	Route::get('profile', 'DashboardController@getProfile')->name('profile');
	Route::put('profile', 'DashboardController@updateProfile')->name('update-profile');
	Route::post('address', 'DashboardController@postAddress')->name('post-address');
	Route::get('identify', 'DashboardController@getIdentify')->name('identify');
	Route::get('identify/email', 'DashboardController@getIdentifyEmail')->name('identify.email');
	Route::post('identify/email', 'DashboardController@postIdentifyEmail')->name('identify.email-verify');
	Route::get('identify/phone', 'DashboardController@getIdentifyPhone')->name('identify.phone');
	Route::post('identify/phone', 'DashboardController@postIdentifyPhone')->name('identify.phone-verify');
	Route::post('identify/{document}', 'DashboardController@postIdentifyDocument')->name('identify.document');
});
Route::group(['prefix' => 'setting', 'namespace' => 'Setting', 'as' => 'setting.'], function () {
	Route::get('', 'GeneralController@redirect')->name('general.redirect');
	Route::get('general', 'GeneralController@index')->name('general');
	Route::put('general', 'GeneralController@putUpdate')->name('general.update');

	Route::get('contact', 'ContactController@index')->name('contact');
	Route::put('contact', 'ContactController@putUpdate')->name('contact.update');

	Route::get('developer', 'DeveloperController@index')->name('developer');
	Route::put('developer', 'DeveloperController@putUpdate')->name('developer.update');

	Route::get('advance', 'SettingController@getAdvance')->name('advance');
	Route::get('advance/command/{command}', 'SettingController@getCommand')->name('advance.command');

	Route::get('api', 'SettingController@getApi')->name('api');

	Route::get('log', 'SettingController@getLog')->name('log');
	Route::get('log-view', 'SettingController@getLogView')->name('log-view');

	Route::resource('backup', 'BackupController');

	Route::group(['prefix' => 'seo', 'namespace' => 'Seo', 'as' => 'seo.'], function () {
		Route::get('', 'SeoController@redirectToCrowl')->name('crowl.redirect');
		Route::get('content-rules', 'SeoController@getContentRules')->name('content-rules');
		Route::get('crowl', 'SeoController@getCrowl')->name('crowl');
		Route::get('crowl-run', 'SeoController@getCrowlRun')->name('crowl-run');
	});
});
Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
	Route::get('login/{id}', 'ResourceController@getlogin')->name('login');
	Route::get('identify/{id}', 'ResourceController@getIdentify')->name('identify');
	Route::get('identify/{id}/{document}', 'ResourceController@getIdentifyDocument')->name('identify.document');
});
Route::group(['prefix' => 'block', 'namespace' => 'Block', 'as' => 'block.'], function () {
	Route::post('sort', 'ResourceController@postSort')->name('sort.store');
});
Route::group(['prefix' => 'report', 'namespace' => 'Report', 'as' => 'report.'], function () {
	Route::get('', 'ReportController@index')->name('index');
});
Route::group(['prefix' => 'media', 'namespace' => 'Media', 'as' => 'media.'], function () {
	Route::get('', 'MediaController@index')->name('index');
});
Route::group(['prefix' => 'file', 'namespace' => 'File', 'as' => 'file.'], function () {
	Route::get('remove-by-src', 'ResourceController@getRemoveBySrc')->name('remove-by-src');
});
