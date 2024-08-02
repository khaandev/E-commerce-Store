<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoldProductController;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});





 

Route::get('/dashboard', function () {

    $user = Auth::user();
    $likedProducts = $user->likedProducts;

    return view('dashboard',compact('likedProducts'));

})->middleware(['auth', 'verified',UserMiddleware::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin Routes

Route::middleware(['auth',AdminMiddleware::class])->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    // product Status
    Route::post('/products/{product}/update-sold', [ProductController::class, 'updateSold'])->name('products.updateSold');
    Route::post('/products/{product}/update-available', [ProductController::class, 'updateAvailable'])->name('products.updateAvailable');
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');

});

Route::get('/shop',[PagesController::class, 'products'])->name('products.shop');
Route::get('/product/${id}/show', [PagesController::class, 'productsShow'])->name('product.show');

// like

Route::post('/product/{product}/like', [LikeController::class, 'like'])->name('product.like');
Route::delete('/product/{product}/unlike', [LikeController::class, 'unlike'])->name('product.unlike');

// product sold 
Route::post('/product/{product}/sell', [SoldProductController::class, 'sellProduct'])->name('product.sell');

// wallet
Route::resource('/wallets', WalletController::class);



require __DIR__.'/auth.php';
