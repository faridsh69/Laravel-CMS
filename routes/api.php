<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

$modelNameSlugs = Config::get('cms.api_routes');

foreach ($modelNameSlugs as $modelNameSlug) {
	$controllerName = \Str::studly($modelNameSlug) . '\ApiController';
	if (!file_exists(__DIR__ . '\..\app\Http\Controllers\Api\\' . $controllerName . '.php')) {
		$controllerName = 'ApiController';
	}
	Route::resource($modelNameSlug, $controllerName);

	Route::group([
		'prefix' => $modelNameSlug,
		'as' => $modelNameSlug . '.',
	], function () use ($controllerName): void {
		Route::get('id/{id}', $controllerName . '@getById')->name('get-by-id');
		Route::put('id/{id}', $controllerName . '@updateById')->name('update-by-id');
		Route::delete('id/{id}', $controllerName . '@destroyById')->name('destroy-by-id');
	});
}
