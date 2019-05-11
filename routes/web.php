<?php

Route::group(['namespace' => 'Admin', 'middleware' => 'throttle:10,0.1'], function () {
	Route::resource('blog', 'BlogController');
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