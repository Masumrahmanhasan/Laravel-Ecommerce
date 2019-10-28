<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Product::class, 20)->create();
    	$products = Product::select('id')->get();
    	foreach ($products as $product)
    	{
    		$product->addMediaFromUrl('http://loremflickr.com/640/480?random='.rand(1, 100))
   					->toMediaCollection('products');
    	}
    }
}
