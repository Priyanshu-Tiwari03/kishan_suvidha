<?php
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DasboardController as AdminDasboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DasboardController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use App\Models\User;
use App\Exports\UsersExport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'], function () {
    // Guest Middleware for users
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
    });

    // Auth Middleware for users
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::get('dasboard',[DasboardController::class,'index'])->name('account.dasboard');
    });
});

Route::group(['prefix' => 'admin'], function () {
    // Guest Middleware for users
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    // Auth Middleware for users
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dasboard',[AdminDasboardController::class,'index'])->name('admin.dasboard');
        Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');
    });
    
});


Route::controller(ProductController::class)->group(function(){  
    Route::get('/admin/products','index')->name('products.index');
    Route::get('/admin/products/create','create')->name('products.create');
    Route::post('/admin/products','store')->name('products.store');
    Route::get('/admin/products/{product}/edit','edit')->name('products.edit');
    Route::put('/admin/products/{product}','update')->name('products.update');
    Route::delete('/admin/products/{product}','destroy')->name('products.destroy');
    });

    

Route::controller(UserController::class)->group(function(){  
    Route::get('/admin/users','index')->name('users.index');
    Route::get('/admin/users/create','create')->name('users.create');
    Route::post('/admin/users','store')->name('users.store');
    Route::get('/admin/users/{user}/edit','edit')->name('users.edit');
    Route::put('/admin/users/{user}','update')->name('users.update');
    Route::delete('/admin/users/{user}','destroy')->name('users.destroy');
});



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

//Route::resource('admin/categories', App\Http\Controllers\Admin\CategoryController::class);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});
