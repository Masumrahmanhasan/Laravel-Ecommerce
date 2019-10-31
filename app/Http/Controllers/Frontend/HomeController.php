<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
   public function showHomePage()
   {

   	$data['cart'] 		= session()->has('cart') ? session()->get('cart') : [];
   	$data['count'] 		= count($data['cart']);
   	$data['total'] 		= array_sum(array_column($data['cart'], 'total_price'));
   	$data['products'] 	= Product::all()->where('active', 1);
   	
   	return view('frontend.home', $data);

   }
}
