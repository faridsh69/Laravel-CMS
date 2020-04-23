<?php

$model_slugs = Config::get('cms.admin_routes');

foreach($model_slugs as $model_slug)
{
	$model_name = \Str::studly($model_slug);
	$model_namespance = config('cms.config.models_namespace'). $model_name;
	$controller_file = __DIR__. '\..\app\Http\Controllers\Admin\\'. $model_name. '\ResourceController.php';
	if (file_exists($controller_file)) {
		$controller_name = $model_name. '\ResourceController';
	}else{
		$controller_name = 'AdminController';
	}
	Route::group(['prefix' => $model_slug, 'as' => $model_slug. '.'], function () use ($model_namespance, $controller_name) {
		Route::get('datatable', $controller_name. '@getDatatable')->middleware('can:datatable,'. $model_namespance)->name('datatable');
		Route::get('export', $controller_name. '@getExport')->middleware('can:export,'. $model_namespance)->name('export');
		Route::get('import', $controller_name. '@getImport')->middleware('can:import,'. $model_namespance)->name('import');
		Route::get('print', $controller_name. '@getPrint')->middleware('can:print,'. $model_namespance)->name('print');
		Route::get('toggle-activated/{id}', $controller_name. '@getToggleActivated')->middleware('can:toggle-activated,'. $model_namespance)->name('toggle-activated');
		Route::resource('list', $controller_name. '');
		Route::get('list/{id}/restore', $controller_name. '@restore')->name('list.restore');
		Route::get('', $controller_name. '@redirect')->name('redirect');
	});
}
Route::get('', 'Dashboard\DashboardController@redirect')->name('redirect');
Route::get('media', 'Media\MediaController@redirect')->name('redirect');
Route::get('media/list', 'Media\MediaController@index')->name('media.list.index');
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
// Route::group(['prefix' => 'category', 'namespace' => 'Category', 'as' => 'category.'], function () {
// 	Route::get('tree', 'ResourceController@getTree')->name('tree');
// 	Route::post('tree', 'ResourceController@postTree')->name('tree.store');
// });
Route::group(['prefix' => 'block', 'namespace' => 'Block', 'as' => 'block.'], function () {
	Route::post('sort', 'ResourceController@postSort')->name('sort.store');
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
		Route::get('', 'SeoController@getCrowl')->name('crowl.redirect');
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
Route::group(['prefix' => 'report', 'namespace' => 'Report', 'as' => 'report.'], function () {
	Route::get('list', 'ReportController@index')->name('list.index');
});
Route::group(['prefix' => 'file', 'namespace' => 'File', 'as' => 'file.'], function () {
	Route::get('remove-by-src', 'ResourceController@getRemoveBySrc')->name('remove-by-src');
});
