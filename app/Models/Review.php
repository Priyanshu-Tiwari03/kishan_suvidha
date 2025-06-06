<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function product() {
        return $this->belongsTo(Product::class);
    }
     public function user()    { return $this->belongsTo(User::class); }
     protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',  // or 'comment' if your table uses 'comment'
    ];
    
}
