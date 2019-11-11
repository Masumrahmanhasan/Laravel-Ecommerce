<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];

	/**
     * The customer who ordered..
     */
	public function customer()
	{
		return $this->belongsTO(User::class);
	}

	/**
     * The order processed by the the admin user...
     */
	public function processor()
	{
		return $this->hasOne(User::class, 'processed_by');
	}

	/*
		A order can have many products...
	*/
	public function products($value='')
	{
		return $this->hasMany(OrderProduct::class);
	}
}
