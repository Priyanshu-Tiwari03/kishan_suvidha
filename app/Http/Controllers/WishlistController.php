<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WishlistController extends Controller
{
    public function showWishlist()
    {
        $wishlist = session()->get('wishlist', []);
        return view('wishlist', compact('wishlist'));
    }
    
}
