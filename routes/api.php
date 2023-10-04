<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// USER 
Route::get('/get-all-users',[UserController::class,'getAllUsers']);
Route::get('/find-user',[UserController::class,'findUser']);
Route::post('/create-new-user',[UserController::class,'createNewUser']);
Route::put('/update-user',[UserController::class,'updateUser']);
Route::delete('/delete-user',[UserController::class,'deleteUser']);
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);

// PRODUCT
Route::get('/get-all-products',[ProductController::class,'getAllProducts']);
Route::get('/find-product',[ProductController::class,'findProduct']);

Route::post('/create-new-product',[ProductController::class,'createNewProduct']);

Route::put('/update-product',[ProductController::class,'updateProduct']);

Route::delete('/delete-product',[ProductController::class,'deleteProduct']);

// CART
Route::get('/get-cart',[CartController::class,'getCart']);


// Test api
Route::get('/abc',[UserController::class,'test']);
Route::post('/abcd',[UserController::class,'test2']);
Route::get('/abcdf',[UserController::class,'test3']);


// Admin authentications
Route::middleware('auth.admin')->group(function(){

});
// Customer authentication
Route::middleware('auth.customer')->group(function(){

});

// For Backend 
Route::get('menproduct', ['App\Http\Controllers\MenProductController', 'index']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
