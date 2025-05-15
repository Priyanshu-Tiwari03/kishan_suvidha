<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'sku', 'price', 'description', 'image','category_id','sub-category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }
 

    
}
