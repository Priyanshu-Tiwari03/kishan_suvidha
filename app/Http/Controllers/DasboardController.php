<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DasboardController extends Controller
{
    public function index(){
        // $products = Product::latest()->take(5)->get(); 
        // return view('dasboard',compact('products'));
        $groupedProducts = \App\Models\Product::with(['category', 'subcategory'])
    ->get()
    ->groupBy(fn($product) => optional($product->category)->name);
    return view('dasboard', compact('groupedProducts'));

        $categories = Category::with('subcategories')->get();
        return view('home', compact('categories'));
    }
}
