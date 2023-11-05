<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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



Route::get('/', [HomeController::class, 'index']);
Auth::routes();
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// For admin
Route::middleware('auth.admin')->group(function () {

});

// For customer
Route::middleware('auth.customer')->group(function () {

});



Route::get('/abc', function () {
    echo '3';
});


// Route::get('/menproduct', [App\Http\Controllers\MenProductController::class, 'ditmemay'])->name('menproduct');
Route::get('/menproduct', function () {

    return view('menproduct');
})->name('menproduct');

Route::get('/women-product', function () {
    return view('womenproduct');
})->name('women-product');
Route::get('socks', function () {
    return view('socks');
});
Route::get('test', function () {
    return view('test');
});
Route::get('product-detail', function () {
    return view('product-detail');
});

Route::get('/dbconnect', function () {
    return view('dbconnect');
});