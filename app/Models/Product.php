<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'sku', 'price', 'description', 'image','category_id','sub-category_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
