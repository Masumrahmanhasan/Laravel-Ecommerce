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
Route::group(['namespace' => 'Frontend'], function() {
	
	Route::get('/', 'HomeController@showHomePage')->name('frontend.home');
	Route::get('/product/{slug}', 'ProductController@showDetails')->name('product.details');

	//cart section
	Route::get('/cart','CartController@showCart')->name('cart.show');
	Route::post('/cart','CartController@addToCart')->name('cart.add');
	Route::post('/cart/remove','CartController@removeFromCart')->name('cart.remove');
	Route::get('/cart/clear','CartController@clearCart')->name('cart.clear');

	Route::get('/checkout', 'CartController@checkout')->name('checkout');
	//Login 
	Route::get('/login', 'AuthController@loginView')->name('login.view');
	Route::post('/login', 'AuthController@loginProcess')->name('login.process');
	//Register
	Route::get('/register', 'AuthController@registerView')->name('register.view');
	Route::post('/register', 'AuthController@registerProcess')->name('register.process');

	Route::get('/activate/{token}', 'AuthController@activate')->name('activate');

	Route::group(['middleware' => 'auth'], function() {


	    Route::get('/logout', 'AuthController@logout')->name('logout');

	    // Route::get('/profile', 'AuthController@logout')->name('logout');
	});
	Route::post('/order', 'CartController@orderProcess')->name('order.process');

	view()->composer(['*'], function($view) {
		$cart = session()->has('cart') ? session()->get('cart') : [];
		$count = count($cart);
		$total = array_sum(array_column($cart, 'total_price'));

		$view->with(['cart'=> $cart, 'count' => $count, 'total' => $total]);
	});
});