<?php

$admin_models = [
	'blog', // 1
	'page', // 2
	'category', // 3
	'tag', // 4 
	'media', // 5 
	'comment', // 6
	// setting 7 
	// user 8 
	'theme', // 9 
	'block', // 10
	'widget', // 11
	// seo 12 
	'form', // 13
	'report', // 14
	'notification', // 15
	'menu', // 16
];
foreach($admin_models as $model_sm)
{
	$model = ucfirst($model_sm);
	Route::group(['prefix' => $model_sm, 'namespace' => $model, 'as' => $model_sm . '.'], function () use ($model_sm) {
		Route::get('datatable', 'ResourceController@getDatatable')->name('datatable');
		Route::get('export', 'ResourceController@getExport')->name('export');
		Route::get('pdf', 'ResourceController@getPdf')->name('pdf');
		Route::get('print', 'ResourceController@getPrint')->name('print');
		Route::get('import', 'ResourceController@getImport')->name('import');
		Route::get('change-status/{id}', 'ResourceController@getChangeStatus')->name('change-status');
		Route::resource('list', 'ResourceController');
		Route::get('', 'ResourceController@getRedirect')->name('redirect');
	});
}
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function () {
	Route::get('', 'DashboardController@index')->name('index');
	Route::get('profile', 'DashboardController@getProfile')->name('profile');
});
Route::group(['prefix' => 'setting', 'namespace' => 'Setting', 'as' => 'setting.'], function () {
	Route::get('general', 'SettingController@getGeneral')->name('general');
	Route::get('contact', 'SettingController@getContact')->name('contact');
	Route::get('log', 'SettingController@getLog')->name('log');
	Route::group(['prefix' => 'backup', 'namespace' => 'Backup', 'as' => 'backup.'], function () {
		Route::resource('list', 'ResourceController');
		Route::get('', 'ResourceController@getRedirect')->name('redirect');
	});
	Route::group(['prefix' => 'developer-options', 'as' => 'developer-options.'], function () {
		Route::get('basic', 'SettingController@getDeveloperOptionsBasic')->name('basic');
		Route::get('advance', 'SettingController@getDeveloperOptionsAdvance')->name('advance');
		Route::get('api', 'SettingController@getDeveloperOptionsApi')->name('api');
	});
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