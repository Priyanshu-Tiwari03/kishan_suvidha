<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $cartCount = 0;
    
            foreach ($cart as $item) {
                $cartCount += $item['quantity']; // Total quantity
            }
    
            $view->with('cartCount', $cartCount);
        });
        
    View::composer('layouts.user', function ($view) {
        $categories = Category::with('subcategories')->get();
        $view->with('categories', $categories);
    });
    }
}
