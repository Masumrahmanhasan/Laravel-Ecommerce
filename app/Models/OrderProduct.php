<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	protected $guarded = [];
	public $timestamps = false;

	/*
		Relation between order
		the order belongs to order table
	*/
	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	/*
		The order products belongs to product table
	*/
	public function product($value='')
	{
		return $this->belongsTo(Product::class);
	}
}
