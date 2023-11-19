<?php

declare(strict_types=1);

$modelNameSlugs = Config::get('cms.front_routes');

foreach ($modelNameSlugs as $modelNameSlug) {
	$controller_name = \Str::studly($modelNameSlug) . '\FrontController';
	if (!file_exists(__DIR__ . '\..\app\Http\Controllers\Front\\' . $controller_name . '.php')) {
		$controller_name = 'FrontController';
	}
	Route::group([
		'prefix' => $modelNameSlug,
		'as' => $modelNameSlug . '.',
	], function () use ($controller_name): void {
		Route::get('', $controller_name . '@index')->name('index');
		Route::get('category', $controller_name . '@getCategories')->name('category.index');
		Route::get('category/{url?}', $controller_name . '@getCategory')->name('category.show');
		Route::get('tag', $controller_name . '@getTags')->name('tag.index');
		Route::get('tag/{url?}', $controller_name . '@getTag')->name('tag.show');
		Route::get('{url}', $controller_name . '@show')->name('show');
		Route::post('{url}/comment', $controller_name . '@comment')->name('comment');
		Route::post('{url}/like', $controller_name . '@like')->name('like');
		Route::get('{url}/like/count', $controller_name . '@likeCount')->name('like-count');
	});
}

Route::get('{page_url?}', 'Page\PageController@index')->name('page.index');
Route::post('form/{form_id}/submit', 'Page\PageController@postSubmitForm')->name('page.submit-form');
