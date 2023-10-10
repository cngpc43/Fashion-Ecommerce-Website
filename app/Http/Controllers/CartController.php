<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCarts(){
        $carts = Cart::all();
        if (!$carts){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'There no product in cart!',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Success!',
                'data'=>$carts
            ],200);
        }
    }

    // Find cart from specific customerId by customerId
    public function getCustomerCart(Request $request){
        $cart = Cart::where('customerId',$request->query('id'))->get();
        if (!$cart){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'There no product in cart!',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Success!',
                'data'=>$cart
            ],200);
        }
    }
    
    // Use Session for people without login , then check login
    
    public function addCart(Request $request){
        // Check product exist first ?
        $product = Product::where('id',$request->productId)->first();
        if(!$product){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'Cannot find product '
            ],400);
        }

        // Check stock and compare to quantity
        // if($product->stock < $request->quantity){
        //     return response()->json([
        //         'errCode'=>400,
        //         'errMess'=>'Quantity exceed stock'
        //     ],400);
        // }


        // Authentication for login
        if (Auth::check()){

            // Check if we not have cart session . Convert session -> DB in Login controller

            // Add new product to cart [exist and not exist product in cart]
            $ExistProductCart = Cart::where('customerId',Auth::user()->id)
                                        ->where('productId',$product->id)
                                        ->first();
            if ($ExistProductCart){
                $ExistProductCart->quantity+=$request->quantity;
                $ExistProductCart->save();
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'add quantity successfully!'
                ],200);
            } else {
                echo 'hello';
                $cart = Cart::create([
                    'customerId'=>Auth::user()->id,
                    'productId'=>$request->productId,
                    'quantity'=>$request->quantity
                ],200);
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'add successfully!'
                ],200);
            }
        } else {
            // Check if we do not have cart session
            if (!$request->session()->has('cart')){
                $request->session()->put('cart',[]);
            }
            $sessionCart = $request->session()->get('cart');
            if (array_key_exists($request->productId, $sessionCart)) {
                // Increase the quantity to exist product
                $sessionCart[$request->productId]['quantity'] += $request->quantity;
                $request->session()->put('cart',$sessionCart);
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'add quantity successfully!'
                ],200);
            } else {
                // New product
                $sessionCart[$request->productId] = [
                    'quantity'=>$request->quantity
                ];
                $request->session()->put('cart',$sessionCart);
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'add successfully!'
                ],200);
            }
        }





    }

    public function updateCart(Request $request){
        $cart = Cart::where('id',$request->id)->first();
        if(!$cart){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'Cart Not found!',
            ],400);
        } else {
            $cart->customerId=$request->customerId;
            $cart->productId=$request->productId;
            $cart->quantity=$request->quantity;
            $cart->save();
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Update Successfully!',
                'data'=>$cart
            ],200);
        }
    }
    public function deleteCart(Request $request){
        $cart = Cart::where('id',$request->id)->first();
        if(!$cart){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'Cart Not found!',
            ],400);
        } else {
            $cart->delete();
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Delete Successfully!',
                'data'=>$cart
            ],200);
        }
    }

}
