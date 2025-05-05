<?php

namespace App\Http\Controllers;
use App\Models\Product;
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
    $cart = session()->get('cart', []);

    if (!isset($cart[$id])) {
        return redirect()->route('cart.show')->with('error', 'Product not found in cart.');
    }

    $product = $cart[$id];
    return view('productbuy', compact('product'));
}
   
}

