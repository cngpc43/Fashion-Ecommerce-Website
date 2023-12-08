<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenProductController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserController;

// use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('/profile/{id}', [UserController::class, 'show']);
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// For admin
Route::middleware('auth.admin')->group(function () {

});

// For customer
Route::middleware('auth.customer')->group(function () {

});

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/abc', function () {
    echo '3';
});


Route::get('menproduct', [MenProductController::class, 'index']);


Route::get('/women-product', function () {
    return view('womenproduct');
})->name('women-product');
Route::get('socks', function () {
    return view('socks');
});
Route::get('test', function () {
    return view('test');
});
Route::get('product-detail/{id}', [ProductController::class, 'getDetailbyID']);


Route::get('/dbconnect', function () {
    return view('dbconnect');
});
// Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', function () {
    $cart = session()->get('cart', []);
    return view('cart', compact('cart'));
});
// Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('api.add-to-cart');
Route::get('/get-cart', [CartController::class, 'getCart'])->name('api.get-cart');
Route::post('/delete-from-cart', [CartController::class, 'deleteProductfromCart'])->name('api.delete-from-cart');
// Route::post('/update-cart', [CartController::class, 'updateCart'])->name('api.update-cart');
Route::post('update-address', [UserController::class, 'createNewAddress'])->name('api.create-new-address');
Route::post('update-profile', [UserController::class, 'updateInformation'])->name('api.update-profile');
