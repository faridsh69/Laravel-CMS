<?php

declare(strict_types=1);

$modelNameSlugs = Config::get('cms.admin_routes');

foreach ($modelNameSlugs as $modelNameSlug) {
	$controller = \Str::studly($modelNameSlug) . '\ResourceController';
	if (!file_exists(
		__DIR__ . '/../app/Http/Controllers/Admin/' . \Str::studly($modelNameSlug) . '/ResourceController.php'
	)) {
		$controller = 'AdminController';
	}
	Route::group([
		'prefix' => $modelNameSlug,
		'as' => $modelNameSlug . '.',
	], function () use ($controller): void {
		Route::get('datatable', $controller . '@datatable')->name('datatable');
		Route::get('export', $controller . '@export')->name('export');
		Route::get('import', $controller . '@import')->name('import');
		Route::get('print', $controller . '@print')->name('print');
		Route::get('toggle-activated/{id}', $controller . '@toggleActivated')->name('toggle-activated');
		Route::get('list/{id}/restore', $controller . '@restore')->name('list.restore');
		Route::resource('list', $controller);
		Route::get('', $controller . '@redirect')->name('redirect');
	});
}
Route::get('', 'Dashboard\DashboardController@redirect')->name('redirect');
Route::get('icon/list', 'Dashboard\DashboardController@iconsList')->name('icon.list.index');
Route::get('report', 'Report\ReportController@index')->name('report.index');
Route::group([
	'prefix' => 'dashboard',
	'namespace' => 'Dashboard',
	'as' => 'dashboard.',
], function (): void {
	Route::get('', 'DashboardController@index')->name('index');
	Route::get('activity', 'DashboardController@activity')->name('activity');
	Route::get('profile', 'DashboardController@profile')->name('profile');
	Route::put('profile', 'DashboardController@updateProfile')->name('update-profile');
	Route::post('address', 'DashboardController@postAddress')->name('post-address');
	Route::get('identify', 'DashboardController@identify')->name('identify');
	Route::get('identify/email', 'DashboardController@identifyEmail')->name('identify.email');
	Route::post('identify/email', 'DashboardController@postIdentifyEmail')->name('identify.email-verify');
	Route::get('identify/phone', 'DashboardController@identifyPhone')->name('identify.phone');
	Route::post('identify/phone', 'DashboardController@postIdentifyPhone')->name('identify.phone-verify');
	Route::post('identify/{document}', 'DashboardController@postIdentifyDocument')->name('identify.document');
});
Route::group([
	'prefix' => 'setting',
	'namespace' => 'Setting',
	'as' => 'setting.',
], function (): void {
	Route::get('', 'GeneralController@redirect')->name('general.redirect');
	Route::get('general', 'GeneralController@index')->name('general');
	Route::put('general', 'GeneralController@putUpdate')->name('general.update');

	Route::get('contact', 'ContactController@index')->name('contact');
	Route::put('contact', 'ContactController@putUpdate')->name('contact.update');

	Route::get('developer', 'DeveloperController@index')->name('developer');
	Route::put('developer', 'DeveloperController@putUpdate')->name('developer.update');

	Route::get('advance', 'SettingController@advance')->name('advance');
	Route::get('advance/command/{command}', 'SettingController@command')->name('advance.command');

	Route::get('api', 'SettingController@api')->name('api');

	Route::get('log', 'SettingController@log')->name('log');
	Route::get('log-view', 'SettingController@logView')->name('log-view');

	Route::resource('backup', 'BackupController');

	Route::group([
		'prefix' => 'seo',
		'namespace' => 'Seo',
		'as' => 'seo.',
	], function (): void {
		Route::get('', 'SeoController@redirectToCrowl')->name('crowl.redirect');
		Route::get('content-rules', 'SeoController@contentRules')->name('content-rules');
		Route::get('crowl', 'SeoController@crowl')->name('crowl');
		Route::get('crowl-run', 'SeoController@crowlRun')->name('crowl-run');
	});
});
Route::group([
	'prefix' => 'user',
	'namespace' => 'User',
	'as' => 'user.',
], function (): void {
	Route::get('login/{id}', 'ResourceController@login')->name('login');
	Route::get('identify/{id}', 'ResourceController@identify')->name('identify');
	Route::get('identify/{id}/{document}', 'ResourceController@identifyDocument')->name('identify.document');
});
Route::group([
	'prefix' => 'block',
	'namespace' => 'Block',
	'as' => 'block.',
], function (): void {
	Route::post('sort', 'ResourceController@postSort')->name('sort.store');
});
Route::group([
	'prefix' => 'file',
	'namespace' => 'File',
	'as' => 'file.',
], function (): void {
	Route::get('remove-by-src', 'ResourceController@removeBySrc')->name('remove-by-src');
});
