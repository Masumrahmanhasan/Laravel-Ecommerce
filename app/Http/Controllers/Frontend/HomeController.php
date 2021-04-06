<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function showHomePage()
   {
   	$data['products'] 	= Product::all()->where('active', 1);
   	return view('frontend.home', $data);

   }
}
