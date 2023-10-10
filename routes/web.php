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

// Route::get('/menproduct', [App\Http\Controllers\MenProductController::class, 'ditmemay'])->name('menproduct');
Route::get('/menproduct', function () {
    return view('menproduct');
})->name('menproduct');
Route::get('socks', function () {
    return view('socks');
});
Route::get('test', function () {
    return view('test');
});

