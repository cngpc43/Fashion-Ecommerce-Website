<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Auth::routes();
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/home', function(){
    return view('home');
})->name('home');


// For admin
Route::middleware('auth.admin')->group(function(){

});

// For customer
Route::middleware('auth.customer')->group(function(){

});



Route::get('/abc',function(){echo '3';});


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


Route::get('/dbconnect', function () {
    return view('dbconnect');
});

