<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Product added to cart!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }
    public function remove($id)
{
    $cart = session()->get('cart', []);
    
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.show')->with('success', 'Product removed from cart.');
}
public function productBuy($id)
{
    // 1️⃣ Grab your cart‐item from session
    $cart = session()->get('cart', []);
    if (! isset($cart[$id])) {
        return redirect()
            ->route('cart.show')
            ->with('error', 'Product not found in cart.');
    }

    // 2️⃣ Load the actual Product model (with its reviews and reviewers)
    $product = Product::with('reviews.user')->findOrFail($id);

    // 3️⃣ Calculate average rating
    $avgRating = $product->reviews->avg('rating') ?? 0;

    // 4️⃣ Build per‑star counts & % breakdown
    $ratingsCount = [];
    for ($i = 1; $i <= 5; $i++) {
        $ratingsCount[$i] = $product->reviews->where('rating', $i)->count();
    }
    $totalReviews = array_sum($ratingsCount);
    $ratingsBreakdown = [];
    foreach ($ratingsCount as $star => $count) {
        $ratingsBreakdown[$star] = $totalReviews
            ? round(($count / $totalReviews) * 100)
            : 0;
    }

    // 5️⃣ Check if the current user has ever purchased this product
    $hasPurchased = false;
    if (Auth::check()) {
        $hasPurchased = Order::where('uid', Auth::id())
            ->where('pid', $id)
            ->exists();
    }

    // 6️⃣ Pass everything to your Blade
    return view('productbuy', [
        // your existing cart‑item data
        'cartItem'         => $cart[$id],
        // the Eloquent Product (with its name, image, stock, etc.)
        'product'          => $product,
        // reviews data
        'avgRating'        => $avgRating,
        'ratingsCount'     => $ratingsCount,
        'ratingsBreakdown' => $ratingsBreakdown,
        // purchase flag for the modal logic
        'hasPurchased'     => $hasPurchased,
    ]);
   
}
}

