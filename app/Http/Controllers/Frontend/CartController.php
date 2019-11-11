<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
	public function showCart()
	{
		
		return view('frontend.cart.cart');
	}

	public function addToCart(Request $request)
	{
		try {
			$request->validate([
				'product_id' => 'required|numeric',
			]);

		} catch (ValidationException $e) {
			return redirect()->back();
		}

		$product = Product::findOrFail($request->input('product_id'));
		$unit_price = ($product->sell_price !== null && $product->sell_price > 0) ? 
		$product->sell_price : $product->price;

		$cart = session()->has('cart') ? session()->get('cart') : [];

		//if products exists then increment quantity...
		if (array_key_exists($product->id, $cart)) {

			$cart[$product->id]['quantity']++;
			$cart[$product->id]['total_price'] = $cart[$product->id]['quantity'] * $cart[$product->id]['unit_price'];


		} else {
			$cart[$product->id] = [
				'title' 	=> $product->title,
				'quantity' 	=> 1,
				'unit_price' 	=> $unit_price,
				'total_price' 	=> $unit_price,
			];
		}

		session(['cart' => $cart]);
		session()->flash('success', 'Product added to cart successfully');
		return redirect()->route('cart.show');

	}
	public function removeFromCart(Request $request)
	{
		try {
			$request->validate([
				'product_id' => 'required|numeric',
			]);

		} catch (ValidationException $e) {
			return redirect()->back();
		}
		$cart = session()->has('cart') ? session()->get('cart') : [];
		
		unset($cart[$request->input('product_id')]);

		session(['cart' => $cart]);
		session()->flash('success', 'Product removed from cart successfully');
		return redirect()->back();
	}
	public function clearCart()
	{
		if (session()->get('cart') === [] ) {
			session()->flash('success', 'There is no product on your cart..');
		}
		else{
			session(['cart' => []]);
			session()->flash('success', 'Your cart has been cleared');
		}
		
		return redirect()->back();
	}

	public function checkout()
	{	
		return view('frontend.checkout');
	}

	public function orderProcess(Request $request)
	{
		$cart = session()->has('cart') ? session()->get('cart') : [];
		$count = count($cart);
		$total = array_sum(array_column($cart, 'total_price'));

		$validator = Validator::make($request->all(), [
			'customer_name' => 'required',
			'customer_phone' => 'required',
			'city' => 'required',
			'postal_code' => 'required',
			'address' => 'required',

		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$order = Order::create([
			'user_id' 			=> auth()->user()->id,
			'customer_name' 	=> $request->input('customer_name'),
			'customer_phone' 	=> $request->input('customer_phone'),
			'city' 				=> $request->input('city'),
			'postal_code' 		=> $request->input('postal_code'),
			'address' 			=> $request->input('address'),
			'total_amount' 		=> $total,
			'paid_amount' 		=> $total,
			'payment_details' 	=> 'Cash on Delivery',
		]);

		foreach ($cart as $product_id => $product)
		{
			$order->products()->create([
				'product_id' => $product_id,
				'quantity' => $product['quantity'],
				'price' => $product['total_price'],
			]);
		}

		session()->forget(['total', 'cart']);
		return redirect('/');

	}
}
