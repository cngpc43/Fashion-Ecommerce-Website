<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductDetail;

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
Route::prefix('/adminn')->group(function (){
    Route::get('/',function(){
        return view('/admin/layouts/index');
    });
    Route::get('/users',function(){
        $users = User::get()->map(function ($user) {
            unset($user['created_at']);
            unset($user['updated_at']);
            unset($user['email_verified_at']);
            unset($user['password']);
            unset($user['remember_token']);
            return $user;
        });
        $productArray = [];

        foreach($users as $value){
            $data = (object)[
                'id'=>$value->id,
                'roleId'=>$value->roleId,
                'name'=>$value->name,
                'email'=>$value->email,
                'address'=>$value->address,
                'phoneNumber'=>$value->phoneNumber,
            ];
            array_push($productArray,$data);

        }

        return view('/admin/home',['data'=> $productArray,'table'=>'user']);
    });
    Route::get('/user/edit/{id}',function(int $id){
        $user = User::select('name','address','phoneNumber','roleId','email')->find($id);
        $user = (object) [
            'email'=>$user->email,
            'name'=> $user->name,
            'address'=>$user->address,
            'phoneNumber'=>$user->phoneNumber,
            'roleId'=>$user->roleId,
        ];
        return view('/admin/edit',[
            'data'=>$user,
            'table'=>'User',
            'productDetailId'=>1,
            'id'=>$id
        ]);
    });
    Route::get('/user/create',function(){
        $user = (object) [
            'email'=>'',
            'password'=>'',
            'name'=>'',
            'address'=>'',
            'phoneNumber'=>'',
            'roleId'=>'',
        ];
        return view('/admin/create',[
            'data'=>$user,
            'table'=>'User',
        ]);
    });
    Route::get('/products',function(){
        $products = Product::with('ProductDetail')->get();
        $productArray = [];
        foreach($products as $product){  
            if(count($product->productDetail)===0){
                $data = (object) [
                    'productDetailId' => null,
                    'productId'=>$product->productId,
                    'img'=>null,
                    'size'=>null,
                    'color'=>null,
                    'stock'=>null,
                    'name'=>$product->name,
                    'categoryId'=>$product->categoryId,
                    'collectionId'=>$product->collectionId,
                    'price'=>$product->price,
                    'description'=>$product->description,
                    'salePercent'=>$product->salePercent,
                ];
                array_push($productArray,$data);
                continue;
            }
            foreach($product->productDetail as $detail){
                    $data = (object) [
                        'productDetailId' => $detail->productDetailId,
                        'productId'=>$product->productId,
                        'img'=>$detail->img,
                        'size'=>$detail->size,
                        'color'=>$detail->color,
                        'stock'=>$detail->stock,
                        'name'=>$product->name,
                        'categoryId'=>$product->categoryId,
                        'collectionId'=>$product->collectionId,
                        'price'=>$product->price,
                        'description'=>$product->description,
                        'salePercent'=>$product->salePercent,
                    ];
                    array_push($productArray,$data);
                    $data = (object)[];
                }
            }
        return view('/admin/home',['data'=> $productArray,'table'=>'product']);
    });
    Route::get('/product/create',function(){
        $product = (object) [
            'name' => '',
            'categoryId' =>'',
            'collectionId' => '',
            'price' => '',
            'size' =>'',
            'color' =>'',
            'stock' => '',
            'img' => '',
            'salePercent' => '',
            'description' => '',
        ];
        return view('/admin/create',[
            'data'=> $product,
            'table'=>'Product',
        ]);
    });
    Route::get('/product/edit/{productDetailId}',function(int $productDetailId){
        $data = ProductDetail::with('Product')->where('productDetailId',$productDetailId )->first();
        $product = (object) [
            'img' => $data->img,
            'size' => $data->size,
            'color' => $data->color,
            'stock' => $data->stock,
            'name' => $data->product->name,
            'categoryId' => $data->product->categoryId,
            'collectionId' => $data->product->collectionId,
            'price' => $data->product->price,
            'description' => $data->product->description,
            'salePercent' => $data->product->salePercent,
        ];
        return view('/admin/edit',[
            'data'=> $product,
            'table'=>'Product',
            'productDetailId'=>$productDetailId,
            'id'=>1
        ]);
    });

});