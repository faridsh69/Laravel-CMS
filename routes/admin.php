<?php

$models = Config::get('services.models');
foreach($models as $model_sm)
{
	$model = ucfirst($model_sm);
	$class_name = 'App\\Models\\' . $model;
	Route::group(['prefix' => $model_sm, 'namespace' => $model, 'as' => $model_sm . '.'], function () use ($model_sm, $class_name) {
		Route::get('datatable', 'ResourceController@getDatatable')
			->middleware('can:datatable,'.$class_name)
			->name('datatable');
		Route::get('export', 'ResourceController@getExport')
			->middleware('can:export,'.$class_name)
			->name('export');
		Route::get('pdf', 'ResourceController@getPdf')
			->middleware('can:pdf,'.$class_name)
			->name('pdf');
		Route::get('print', 'ResourceController@getPrint')
			->middleware('can:print,'.$class_name)
			->name('print');
		Route::get('import', 'ResourceController@getImport')
			->middleware('can:import,'.$class_name)
			->name('import');
		Route::get('change-status/{id}', 'ResourceController@getChangeStatus')
			->middleware('can:change-status,'.$class_name)
			->name('change-status');
		Route::resource('list', 'ResourceController');
		Route::get('list/{list}/restore', 'ResourceController@getRestore')->name('list.restore');
		Route::get('', 'ResourceController@getRedirect')->name('redirect');
	});
}
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function () {
	Route::get('', 'DashboardController@index')->name('index');
	Route::get('profile', 'DashboardController@getProfile')->name('profile');
});
Route::group(['prefix' => 'setting', 'namespace' => 'Setting', 'as' => 'setting.'], function () {
	Route::get('general', 'SettingController@getGeneral')->name('general');
	Route::put('general', 'SettingController@putGeneral')->name('general.update');
	Route::get('contact', 'SettingController@getContact')->name('contact');
	Route::get('log', 'SettingController@getLog')->name('log');
	Route::get('log-view', 'SettingController@getLogView')->name('log-view');
	Route::group(['prefix' => 'backup', 'namespace' => 'Backup', 'as' => 'backup.'], function () {
		Route::resource('list', 'ResourceController');
		Route::get('', 'ResourceController@getRedirect')->name('redirect');
	});
	Route::group(['prefix' => 'seo', 'namespace' => 'Seo', 'as' => 'seo.'], function () {
		Route::get('setting', 'SeoController@getSetting')->name('setting');
		Route::get('content-rules', 'SeoController@getContentRules')->name('content-rules');
		Route::get('lazy-loading', 'SeoController@getLazyLoading')->name('lazy-loading');
	});
	Route::group(['prefix' => 'developer-options', 'as' => 'developer-options.'], function () {
		Route::get('basic', 'SettingController@getDeveloperOptionsBasic')->name('basic');
		Route::get('advance', 'SettingController@getDeveloperOptionsAdvance')->name('advance');
		Route::get('api', 'SettingController@getDeveloperOptionsApi')->name('api');
	});
});
Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
	Route::get('role', 'UserController@getRole')->name('role');
	Route::get('permission', 'UserController@getPermission')->name('permission');
	Route::get('registration-setting', 'UserController@getRegistrationSetting')->name('registration-setting');
});
Route::group(['prefix' => 'report', 'namespace' => 'Report', 'as' => 'report.'], function () {
	Route::get('index', 'ResourceController@index')->name('index');
});
