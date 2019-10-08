<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $guarded = [];

   /*
    Auto generate slug using name..
   */
   protected static function boot()
   {
      parent::boot();
        static::creating(function($category){
          $category->slug = Str::slug($category->name);
        });
   }

   /**
     * parent category belongs to category or main category...
     *  __CLASS__ Refers to Category::Class
     * 
     */
   public function parent_category()
   {
   		return $this->belongsTo(__CLASS__);
   }

   
    /**
     * Parent category has child category
     */
   public function child_category(){
   	return $this->hasMany(__CLASS__);
   }

   /*
     *  A Category has many product under it 
     */
   public function products()
   {
      return $this->hasMany(Product::class);
   }
}
