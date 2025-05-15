<?php
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DasboardController as AdminDasboardController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\categoryName;
use App\Models\Categories;
use App\Models\SubCategory;
use App\Http\Controllers\OrderController;
use App\Exports\UsersExport;
use App\Exports\ProductsExport;
use App\Exports\CategoriesExport;
use App\Exports\subcategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'], function () {
    // Guest Middleware for users
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });
    //rote for wishlist
    // Show Wishlist
    Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist.show');

    // View Product
    Route::get('/wishlist/product/{id}', [WishlistController::class, 'viewProduct'])->name('wishlist.productview');

    // Remove Item
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    // Add to Cart
    Route::post('/wishlist/add-to-cart/{id}', [WishlistController::class, 'addToCart'])->name('wishlist.addToCart');



    //route for razorpay


    Route::get('/razorpay', [RazorpayController::class, 'index']);
    Route::post('/razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay.payment');
    Route::post('/razorpay/success', [RazorpayController::class, 'success'])->name('razorpay.success');

    // Auth Middleware for users
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dasboard', [DasboardController::class, 'index'])->name('account.dasboard');
    });

});

// Cart route
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail')->middleware('auth');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/productbuy/{id}', [CartController::class, 'productBuy'])->name('cart.productbuy');



Route::group(['prefix' => 'admin'], function () {
    // Guest Middleware for users
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    // Auth Middleware for users
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dasboard', [AdminDasboardController::class, 'index'])->name('admin.dasboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });

});


Route::controller(AdminProductController::class)->group(function () {
    Route::get('/admin/products', 'index')->name('products.index');
    Route::get('/admin/products/create', 'create')->name('products.create');
    Route::post('/admin/products', 'store')->name('products.store');
    Route::get('/admin/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/admin/products/{product}', 'update')->name('products.update');
    Route::delete('/admin/products/{product}', 'destroy')->name('products.destroy');
});



Route::controller(UserController::class)->group(function () {
    Route::get('/admin/users', 'index')->name('users.index');
    Route::get('/admin/users/create', 'create')->name('users.create');
    Route::post('/admin/users', 'store')->name('users.store');
    Route::get('/admin/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/admin/users/{user}', 'update')->name('users.update');
    Route::delete('/admin/users/{user}', 'destroy')->name('users.destroy');
});

//arjun route
//schemes
Route::resource('schemes', SchemeController::class);
Route::post('/schemes', [SchemeController::class, 'store'])->name('schemes.store');

Route::resource('orders', OrderController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('Sub-categories', SubCategoryController::class);
});
//category

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::get('/categories/export/excel', function () {
    return Excel::download(new CategoriesExport, 'categories.xlsx');
});

Route::get('/categories/export/csv', function () {
    return Excel::download(new CategoriesExport, 'categories.csv');
});

Route::get('/categories/export/pdf', function () {
    $categories = category::all();
    $pdf = Pdf::loadView('export.categories_pdf', compact('categories'));
    return $pdf->download('categories.pdf');
});
//subcategory
Route::get('/sub_categories/export/excel', function () {
    return Excel::download(new subcategoryExport, 'sub_categories.xlsx');
});

Route::get('/sub_categories/export/csv', function () {
    return Excel::download(new subcategoryExport, 'sub_categories.csv');
});

Route::get('/sub_categories/export/pdf', function () {
    $sub_categories = subcategory::all();
    $pdf = PDF::loadView('export.sub_categories_pdf', ['sub_categories' => $sub_categories]);
    return $pdf->download('sub_categories.pdf');

});

//Export routes
Route::get('/users/export/{type}', function ($type) {
    $fileName = 'users.' . $type;
    return Excel::download(new UsersExport, $fileName);
})->where('type', 'csv|xlsx|json');

Route::get('/users/export/pdf', function () {
    $users = User::all();

    $pdf = Pdf::loadView('export.users_pdf', compact('users'));
    return $pdf->download('users.pdf');
});

Route::get('/products/export/excel', function () {
    return Excel::download(new ProductsExport, 'products.xlsx');
});

Route::get('/products/export/csv', function () {
    return Excel::download(new ProductsExport, 'products.csv');
});

Route::get('/products/export/pdf', function () {
    $products = Product::all();
    $pdf = Pdf::loadView('export.products_pdf', compact('products'));
    return $pdf->download('products.pdf');
});

Route::resource('schemes', SchemeController::class);
Route::post('/schemes', [SchemeController::class, 'store'])->name('schemes.store');

Route::resource('orders', OrderController::class);
// show all products in a given category
Route::get('/category/{category}', [App\Http\Controllers\ProductController::class, 'category'])
->name('products.category');

Route::get('/category/{category}', [ProductController::class, 'viewByCategory'])->name('category.products');
Route::get('/subcategory/{id}', [ProductController::class, 'showBySubcategory'])->name('subcategory.products');
Route::get('/myorder', [OrderController::class, 'index'])->name('myorder');



Route::post('/product/{id}/review', [ProductController::class, 'submitReview'])->name('product.review');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/myprofile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/myprofile', [ProfileController::class, 'update'])->name('profile.update');
});
