<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Payment;
use App\Models\SubCategory;

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
            // $hasPurchased = Order::where('uid', Auth::id())
            //     ->where('pid', $id)
            //     ->exists();
                               
            $hasPurchased = Payment::where('user_id',    Auth::id())   // ← use your real column names
                                   ->where('product_id', $id)
                                //  ->where('status',    1)       // (optional) only count successful payments
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
    public function viewByCategory($category)
{
    $products = Product::with(['category', 'subcategory'])
        ->whereHas('category', function($q) use ($category) {
            $q->where('name', $category);
        })
        ->get();

    return view('category_products', compact('products', 'category'));
}
public function showBySubcategory($id)
{
    $subcategory = SubCategory::with('products')->findOrFail($id);
    $products = $subcategory->products;

    return view('by_subcategory', compact('subcategory', 'products'));
}
public function submitReview(Request $request, $id)
{
    // Validate input
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
    ]);

    // Save review logic here...
    // For example:
    // Review::create([...]);

    return back()->with('success', 'Review submitted successfully!');
}

    
}
