<?php

$models = Config::get('services.models.admin_routes');

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
	Route::put('profile', 'DashboardController@updateProfile')->name('update-profile');
	Route::get('activity', 'DashboardController@getActivity')->name('activity');
});
Route::group(['prefix' => 'category', 'namespace' => 'Category', 'as' => 'category.'], function () {
	Route::get('tree', 'ResourceController@getTree')->name('tree');
	Route::post('tree', 'ResourceController@postTree')->name('tree.store');
});
Route::group(['prefix' => 'menu', 'namespace' => 'Menu', 'as' => 'menu.'], function () {
	Route::get('tree', 'ResourceController@getTree')->name('tree');
	Route::post('tree', 'ResourceController@postTree')->name('tree.store');
});
Route::group(['prefix' => 'block', 'namespace' => 'Block', 'as' => 'block.'], function () {
	Route::post('sort', 'ResourceController@postSort')->name('sort.store');
});
Route::group(['prefix' => 'setting', 'namespace' => 'Setting', 'as' => 'setting.'], function () {
	Route::get('', 'GeneralController@redirect')->name('general.redirect');
	Route::get('general', 'GeneralController@index')->name('general');
	Route::put('general', 'GeneralController@update')->name('general.update');

	Route::get('contact', 'ContactController@index')->name('contact');
	Route::put('contact', 'ContactController@update')->name('contact.update');

	Route::get('developer', 'DeveloperController@index')->name('developer');
	Route::put('developer', 'DeveloperController@update')->name('developer.update');
	
	Route::get('advance', 'SettingController@getAdvance')->name('advance');
	Route::get('advance/command/{command}', 'SettingController@getCommand')->name('advance.command');

	Route::get('api', 'SettingController@getApi')->name('api');

	Route::get('log', 'SettingController@getLog')->name('log');
	Route::get('log-view', 'SettingController@getLogView')->name('log-view');

	Route::resource('backup', 'BackupController');

	Route::group(['prefix' => 'seo', 'namespace' => 'Seo', 'as' => 'seo.'], function () {
		Route::get('', 'SeoController@getCrowl')->name('crowl.redirect');
		Route::get('crowl', 'SeoController@getCrowl')->name('crowl');
		Route::get('content-rules', 'SeoController@getContentRules')->name('content-rules');
	});
});
Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
	Route::get('login/{id}', 'ResourceController@getlogin')->name('login');

	Route::get('role/datatable', 'RoleController@getDatatable')->name('role.datatable');
	Route::resource('role', 'RoleController');
	Route::get('permission/datatable', 'PermissionController@getDatatable')->name('permission.datatable');
	Route::resource('permission', 'PermissionController');
});
Route::group(['prefix' => 'report', 'namespace' => 'Report', 'as' => 'report.'], function () {
	Route::get('', 'ReportController@index')->name('index');
});
Route::get('', 'Dashboard\DashboardController@redirect')->name('redirect');

Route::group(['prefix' => 'product', 'namespace' => 'Product', 'as' => 'product.'], function () {
	Route::get('remove-image/{id}', 'ResourceController@getRemoveImage')->name('remove-image');
});