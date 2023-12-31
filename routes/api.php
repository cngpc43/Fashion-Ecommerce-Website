<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\HomeController;

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
// HOMEPAGE
// Route::get('/', [HomeController::class, 'index']);

// CATEGORY
Route::get('/product-detail/{id}', [ProductController::class, 'getDetailbyID']);
Route::get('/get-all-categories', [CategoryController::class, 'getAllCategories']);
// USER 
// Route::get('/get-all-users', [UserController::class, 'getAllUsers']);
// Route::get('/find-user', [UserController::class, 'findUser']);

// Route::post('/create-new-user', [UserController::class, 'createNewUser']);

// Route::put('/update-user', [UserController::class, 'updateUser']);
// Route::delete('/delete-user', [UserController::class, 'deleteUser']);

// PRODUCT
Route::get('/get-all-products', [ProductController::class, 'getAllProducts']);
Route::get('/find-product', [ProductController::class, 'findProduct']);

Route::post('/create-new-product', [ProductController::class, 'createNewProduct']);

Route::put('/update-product', [ProductController::class, 'updateProduct']);

Route::delete('/delete-product', [ProductController::class, 'deleteProduct']);

// CART

Route::get('/get-all-carts', [CartController::class, 'getAllCarts']);
Route::get('/get-customer-cart/{customerId}', [CartController::class, 'getCustomerCart']);


// Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('api.add-to-cart');


Route::put('/update-cart', [CartController::class, 'updateCart']);
Route::delete('/delete-cart', [CartController::class, 'deleteCart']);
// INVOICE
Route::get('/get-all-invoices', [InvoiceController::class, 'getAllInvoices']);
Route::get('/get-payment-customer-infor', [InvoiceController::class, 'getPaymentInfo']);

Route::post('/create-customer-invoice', [InvoiceController::class, 'createInvoice']);

// HOME
Route::get('/get-trending-product', [HomeController::class, 'getTrendingEachCatagory']);
Route::get('/get-products-by-category-id', [HomeController::class, 'getProductsByCategoryId']);
Route::get('/get-apperal-products', [HomeController::class, 'getApperalProducts']);
Route::get('/get-products-by-collection-id', [HomeController::class, 'getProductsByCollectionId']);

// Admin authentications
Route::middleware('auth.admin')->group(function () {

});
// Customer authentication
Route::middleware('auth.customer')->group(function () {

});

// For Backend 
Route::get('menproduct', ['App\Http\Controllers\MenProductController', 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/get-all-users', [UserController::class, 'getAllUsers']);
// Route::post('/create-new-user', [UserController::class, 'createNewUser']);

// For Backend 
Route::get('menproduct', ['App\Http\Controllers\MenProductController', 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/logout', [LogOutController::class, 'logout']);

Route::get('/user/{id}', [UserController::class, 'show']);


Route::middleware('web')->group(function () {
    // Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('api.add-to-cart');
    // Route::get('/get-cart', [CartController::class, 'getCart'])->name('api.get-cart');
    Route::post('/delete-product-from-cart/{id}', [CartController::class, 'deleteProductFromCart']);
    Route::post('/delete-cart', [CartController::class, 'deleteCart'])->name('api.delete-cart');
});