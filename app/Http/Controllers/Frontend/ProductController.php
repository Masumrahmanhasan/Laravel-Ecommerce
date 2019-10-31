<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	public function showDetails($slug)
	{
		$data['cart'] 		= session()->has('cart') ? session()->get('cart') : [];
		$data['count'] 		= count($data['cart']);
		$data['total'] 		= array_sum(array_column($data['cart'], 'total_price'));
		$data['product'] 	= Product::where('slug', $slug)->where('active', 1)->first();

		if ($data['product'] === null) 
		{
			return redirect()->route('frontend.home');		
		}

		return view('frontend.products.details', $data);
	}
}
