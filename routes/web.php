<?php
use App\Models\User;

// Auth Routes
Auth::routes();

Route::get('/hello', function(){
	dd(User::with('roles')->get());
});

// Frontend routes
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function() {

	Route::get('/', 'HomeController@showHomePage')->name('home');
	Route::get('/product/{slug}', 'ProductController@showDetails')->name('product.details');

	//cart section
	Route::get('/cart','CartController@showCart')->name('cart.show');
	Route::post('/cart','CartController@addToCart')->name('cart.add');
	Route::post('/cart/remove','CartController@removeFromCart')->name('cart.remove');
	Route::get('/cart/clear','CartController@clearCart')->name('cart.clear');

	Route::get('/checkout', 'CartController@checkout')->name('checkout');

	Route::get('/activate/{token}', 'AuthController@activate')->name('activate');

	Route::post('/order', 'CartController@orderProcess')->name('order.process');

	view()->composer(['*'], function($view) {
		$cart = session()->has('cart') ? session()->get('cart') : [];
		$count = count($cart);
		$total = array_sum(array_column($cart, 'total_price'));

		$view->with(['cart'=> $cart, 'count' => $count, 'total' => $total]);
	});
});


// Admin Routes
Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function() {
	Route::get('dashboard', function() {
		return view('admin.dashboard.dashboard');
	})->name('dashboard');
	Route::resource('category', 'CategoryController');
	Route::resource('product', 'ProductController');
});
