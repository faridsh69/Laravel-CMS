<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$navid = array('sine');
	$carbon = new Carbon\Carbon();
	\DB::table('blogs')->insert([
		'title' => 'first blog',
		'content' => 'first blog content first blog content ',
	]);
	// dd(1);
    return view('welcome', compact('carbon'));
});
