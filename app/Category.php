<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $guarded = [];

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
