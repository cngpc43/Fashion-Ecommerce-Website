<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function getCart(){
        $cart = Cart::all();
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
}
