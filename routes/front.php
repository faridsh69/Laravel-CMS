<?php
$models = Config::get('services.models.front_routes');

foreach($models as $model_sm)
{
	$model = ucfirst($model_sm);
	$class_name = 'App\\Models\\' . $model;
	Route::group(['prefix' => $model_sm, 'namespace' => $model, 'as' => $model_sm . '.'], function () use ($class_name) {
	// Route::get('category', 'ResourceController@getCategories');
	Route::get('', 'ResourceController@index');
	Route::get('{url}', 'ResourceController@show');
});
}
Route::get('{page_url?}', 'Page\ResourceController@index')->name('page.index');
// Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
// 	Route::get('', 'BlogController@index')->name('index');
// 	Route::get('categories', 'BlogController@getCategories')->name('categories');
// 	Route::get('category/{category_url}', 'BlogController@getCategory')->name('category');
// 	Route::get('tags', 'BlogController@getTags')->name('tags');
// 	Route::get('tag/{tag_url}', 'BlogController@getTag')->name('tag');
// 	Route::get('{blog_url}', 'BlogController@show')->name('show');
// 	Route::post('{blog_url}/comment', 'BlogController@postComment')->name('comment')
// 	    ->middleware('auth', 'throttle:5,1');
// });

// Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
// 	Route::get('', 'ProductController@index')->name('index');
// 	Route::get('categories', 'ProductController@getCategories')->name('categories');
// 	Route::get('category/{category_url}', 'ProductController@getCategory')->name('category');
// 	Route::get('tags', 'ProductController@getTags')->name('tags');
// 	Route::get('tag/{tag_url}', 'ProductController@getTag')->name('tag');
// 	Route::get('{blog_url}', 'ProductController@show')->name('show');
// 	Route::post('{blog_url}/comment', 'ProductController@postComment')->name('comment')
// 	    ->middleware('auth', 'throttle:5,1');
// });

// Route::group(['prefix' => 'basket', 'as' => 'basket.'], function () {
// 	Route::get('product/init', 'BasketController@getProductInit');
// 	Route::post('add', 'BasketController@postAdd');
// 	Route::post('product/filter', 'BasketController@getProductFilter');
// 	Route::get('', 'BasketController@getIndex');
// 	Route::get('init', 'BasketController@getInit');
// 	Route::post('count', 'BasketController@postBasketCount');
// 	Route::post('count/view', 'BasketController@postBasketCountView');
// 	Route::get('quick-register/{phone}', 'BasketController@getQuickRegister');
// });

// Route::group(['prefix' => 'checkout', 'as' => 'checkout.', 'middleware' => ['auth']], function () {
// 	Route::get('address', 'CheckoutController@getAddress')->name('address');
// 	Route::post('address', 'CheckoutController@postAddress')->name('post-address');
// 	Route::get('address/init', 'CheckoutController@getAddressInit')->name('init-address');
// 	Route::get('shipping', 'CheckoutController@getShipping')->name('shipping');
// 	Route::post('shipping', 'CheckoutController@postShipping')->name('post-shipping');
// 	Route::post('discount', 'CheckoutController@postDiscount')->name('post-discount');
// 	Route::get('payment', 'CheckoutController@getPayment')->name('payment');
// 	Route::get('payment/local', 'CheckoutController@getPaymentLocal')->name('payment-local');
// 	Route::get('payment/online/{bank}', 'CheckoutController@getPaymentOnline')->name('payment-online');
// 	Route::get('payment/verify', 'CheckoutController@getPaymentVerify')->name('payment-verify');
// 	Route::post('payment/verify', 'CheckoutController@getPaymentVerify')->name('post-payment-verify');
// });

// Route::post('submit-form/{form_id}', 'PageController@postSubmitForm')->name('page.submit-form');












// windy map
// Route::get('distance/{coordinate}', 'PageController@getIndex')->name('distance.coordinate');
// Route::get('{lat}/{long}', 'PageController@getIndex')->name('point.details');
// Route::get('-Show-add-more-layers/overlays', 'PageController@getIndex')->name('layers.overlays');

// Route::group(['prefix' => 'test-windy', 'as' => 'test.windy.'], function () {
// 	Route::get('rplanner/v1/elevation/{coordinate}', 'TestMapController@getAltitude')->name('altitude');
// 	Route::get('capalerts/{lat}/{lng}', 'TestMapController@getNodeCapalerts')->name('node.capalerts');
// 	Route::get('node/connection', 'TestMapController@getNodeConnection')->name('node.connection');
// 	Route::get('users/info', 'TestMapController@getUsersInfo')->name('users.info');
// 	Route::get('sedlina/ga/{id}', 'TestMapController@getSedlinaGa')->name('sedlina.ga');
// 	Route::get('forecast/citytile/v1.3/ecmwf/{zoom}/{lat}/{lng}', 'TestMapController@getForecastCitytile')->name('forecast.citytile.ecmwf');
// 	Route::get('node/geoip', 'TestMapController@getNodeGeoip')->name('node.geoip');
// 	Route::get('Zm9yZWNhc3Q/ZWNtd2Y/cG9pbnQvZWNtd2YvdjIuNS8zNS42OTYxLzUxLjQyMzE/c291cmNlPWhwJnNldHVwPXN1bW1hcnkmaW5jbHVkZU5vdz10cnVl', 'TestMapController@getToken')->name('token');
// 	Route::get('reverse/v3/{lat}/{lng}/{zoom}', 'TestMapController@getReverse')->name('reverse');
// });
