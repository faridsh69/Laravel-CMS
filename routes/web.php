<?php

Route::group(['namespace' => 'Admin', 'middleware' => 'throttle:20,0.2', 'as' => 'admin.'], function () {
	Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function () {
		Route::get('', 'DashboardController@index')->name('index');
	});
	Route::group(['prefix' => 'setting', 'namespace' => 'Setting', 'as' => 'setting.'], function () {
		Route::get('general', 'SettingController@getGeneral')->name('general');
		Route::get('contact', 'SettingController@getContact')->name('contact');
		Route::get('log', 'SettingController@getLog')->name('log');
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
	Route::group(['prefix' => 'blog', 'namespace' => 'Blog', 'as' => 'blog.'], function () {
		Route::resource('list', 'ResourceController');
	});
});	


// Route::get('/', function () {
// 	$navid = array('sine');
// 	$carbon = new Carbon\Carbon();
// 	// App\Models\Blog::insert([
// 	// 	'title' => 'first blog ' . rand(1,10) ,
// 	// 	'content' => 'first blog content first blog content ',
// 	// ]);
// 	// dd(1);
//     return view('welcome', compact('carbon'));
// });

// Route::post('/', function(Illuminate\Http\Request $request){
// 	App\Models\Blog::insert([
// 		'title' => $request->input('title'),
// 		'content' => $request->input('content'),
// 	]);

// 	return redirect('/');
// });