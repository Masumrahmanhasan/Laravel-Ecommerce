<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
    	# code...
    }

    public function addToCart()
    {
    	try {
    		$request->validate([
    			'product_id' => 'required',
    		]);

    	} catch (ValidationException $e) {
    		return redirect()->back();
    	}

    	// $product = Product::findOrFail($request->input('product_id'));
    	// $cart['products'] = 
    	
    }
}
