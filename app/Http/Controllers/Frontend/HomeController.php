<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
   public function showHomePage()
   {

   	$data = [];
   	$data['products'] = Product::all()->where('active', 1);
   	return view('frontend.home', $data);

   }
}
