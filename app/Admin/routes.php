<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use OpenAdmin\Admin\Admin;

$admin = new Admin();
$admin->routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('products', AdminProductController::class);
    $router->resource('product-details', ProductDetailController::class);
    $router->resource('orders', OrdersController::class);
    $router->resource('users', UserController::class);
});

?>