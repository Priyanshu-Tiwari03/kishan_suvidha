<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class DasboardController extends Controller
{
    public function index(){
        $totalProducts = Product::count();
        $totalUsers = User::count();

        return view('admin.dasboard', compact('totalProducts', 'totalUsers'));
        return view('admin.dasboard');
    }
}
