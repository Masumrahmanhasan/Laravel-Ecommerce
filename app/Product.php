<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
	use HasMediaTrait;
   	protected $guarded = [];

   	/**
     * The "booting" method of the model.
     *	to generate slug using the title input
     * @return void
     */
   	protected static function boot()
    {
        parent::boot();
        static::creating(function($product){
        	$product->slug = Str::slug($product->title);
        });
    }
   	
   	/**
     * Product has one category...
     */
   	public function category()
   	{
   		return $this->hasOne(Category::class);
   	}
}
