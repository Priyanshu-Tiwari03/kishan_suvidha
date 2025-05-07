<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('reviews')->findOrFail($id);
        $avgRating = $product->reviews()->avg('rating');
    
        // Create ratings breakdown
        $ratingsCount = [];
        $hasPurchased = false;

        if (Auth::check()) {
            $hasPurchased = Order::where('uid', Auth::id())
                ->where('pid', $id)
                ->exists();
        }

 
        for ($i = 1; $i <= 5; $i++) {
            $ratingsCount[$i] = $product->reviews()->where('rating', $i)->count();
        }
    
        $totalReviews = array_sum($ratingsCount);
        $ratingsBreakdown = [];
        foreach ($ratingsCount as $star => $count) {
            $ratingsBreakdown[$star] = $totalReviews ? round(($count / $totalReviews) * 100) : 0;
        }
    
        return view('productpage', compact('product', 'avgRating', 'ratingsCount', 'ratingsBreakdown','hasPurchased'));
    }
    
}
