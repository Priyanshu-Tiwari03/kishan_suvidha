<?php

namespace App\Models;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    
    protected $fillable = ['category_id', 'name', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }

}

