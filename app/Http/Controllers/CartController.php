<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getAllCarts()
    {
        try {
            $carts = Cart::all();
            if (!$carts) {
                return response()->json([
                    'errCode' => 400,
                    'errMess' => 'There are no products in the cart!',
                ], 400);
            } else {
                return response()->json([
                    'errCode' => 200,
                    'errMess' => 'Success!',
                    'data' => $carts
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'errCode' => 500,
                'errMess' => 'An error occurred while retrieving carts.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Find cart from specific customerId by customerId
    public function getCustomerCart($customerId)
    {
        try {
            $cart = Cart::where('customerId', $customerId)->with('ProductDetail.Product')->get();
            if ($cart->isEmpty()) {
                return response()->json([
                    'errCode' => 400,
                    'errMess' => 'There no product in cart!',
                ], 400);
            } else {
                return response()->json([
                    'errCode' => 200,
                    'errMess' => 'Success!',
                    'data' => $cart
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'errCode' => 500,
                'errMess' => 'An error occurred while retrieving carts.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    // Use Session for people without login , then check login

    // public function addToCart(Request $request)
    // {
    //     try {

    //         $productDetail = ProductDetail::with('product')->where('productDetailId', $request->productDetailId)->first();
    //         if (!$productDetail) {
    //             return response()->json([
    //                 'errCode' => 400,
    //                 'errMess' => 'Cannot find product '
    //             ], 400);
    //         }

    //         // Check stock and compare to quantity
    //         if ($productDetail->stock < $request->quantity) {
    //             return response()->json([
    //                 'errCode' => 400,
    //                 'errMess' => 'Quantity exceed stock'
    //             ], 400);
    //         }


    //         // Authentication for login
    //         if (Auth::check()) {

    //             // Check if we not have cart session . Convert session -> DB in Login controller

    //             // Add new product to cart [exist and not exist product in cart]

    //             //Convert product if we already have product before in login userController
    //             $ExistProductCart = Cart::where('customerId', Auth::user()->id)
    //                 ->where('productDetailId', $productDetail->productDetailId)
    //                 ->first();
    //             if ($ExistProductCart) {
    //                 $ExistProductCart->quantity += $request->quantity;
    //                 $ExistProductCart->save();
    //                 return response()->json([
    //                     'errCode' => 200,
    //                     'errMess' => 'add quantity successfully!'
    //                 ], 200);
    //             } else {
    //                 $cart = Cart::create([
    //                     'customerId' => Auth::user()->id,
    //                     'productDetailId' => $request->productDetailId,
    //                     'quantity' => $request->quantity
    //                 ], 200);
    //                 return response()->json([
    //                     'errCode' => 200,
    //                     'errMess' => 'add successfully!'
    //                 ], 200);
    //             }
    //         } else {
    //             // Check if we do not have cart session
    //             if (!$request->session()->has('cart')) {
    //                 $request->session()->put('cart', []);
    //             }
    //             $sessionCart = $request->session()->get('cart');
    //             if (array_key_exists($request->productDetailId, $sessionCart)) {
    //                 // Increase the quantity to exist product
    //                 $sessionCart[$request->productDetailId]['quantity'] += $request->quantity;
    //                 $request->session()->put('cart', $sessionCart);
    //                 return response()->json([
    //                     'errCode' => 200,
    //                     'errMess' => 'add quantity successfully!'
    //                 ], 200);
    //             } else {
    //                 // New product
    //                 $sessionCart[$request->productDetailId] = [
    //                     'quantity' => $request->quantity
    //                 ];
    //                 $request->session()->put('cart', $sessionCart);
    //                 return response()->json([
    //                     'errCode' => 200,
    //                     'errMess' => 'add successfully!'
    //                 ], 200);
    //             }
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'errCode' => 500,
    //             'errMess' => $e->getMessage(),
    //         ], 500);
    //     }






    // }

    public function updateCart(Request $request)
    {
        try {
            $cart = Cart::where('id', $request->id)->first();
            if (!$cart) {
                return response()->json([
                    'errCode' => 400,
                    'errMess' => 'Cart Not found!',
                ], 400);
            } else {
                $cart->customerId = $request->customerId;
                $cart->productDetailId = $request->productDetailId;
                $cart->quantity = $request->quantity;
                $cart->save();
                return response()->json([
                    'errCode' => 200,
                    'errMess' => 'Update Successfully!',
                    'data' => $cart
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'errCode' => 500,
                'errMess' => 'An error occurred while retrieving carts.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
    // public function deleteCart(Request $request)
    // {
    //     try {
    //         $cart = Cart::where('id', $request->id)->first();
    //         if (!$cart) {
    //             return response()->json([
    //                 'errCode' => 400,
    //                 'errMess' => 'Cart Not found!',
    //             ], 400);
    //         } else {
    //             $cart->delete();
    //             return response()->json([
    //                 'errCode' => 200,
    //                 'errMess' => 'Delete Successfully!',
    //                 'data' => $cart
    //             ], 200);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'errCode' => 500,
    //             'errMess' => 'An error occurred while retrieving carts.',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }


    // }
    public function deleteCart(Request $request)
    {
        try {
            // Get the cart from the session
            $cart = session()->get('cart', []);

            // Empty the cart
            $cart = [];

            // Store the updated (empty) cart in the session
            session()->put('cart', $cart);

            return response()->json([
                'errCode' => 200,
                'errMess' => 'Cart emptied successfully!',
                'data' => $cart
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'errCode' => 500,
                'errMess' => 'An error occurred while emptying the cart.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function addToCart(Request $request)
    {
        try {
            // Get the product data from the request
            $detailId = $request->input('detailId');
            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $productName = $request->input('productName');
            $productSize = $request->input('productSize');
            $productColor = $request->input('productColor');
            $productImage = $request->input('productImage')[0]; // Get the first image

            // Get the cart from the session, or initialize it as an empty array if it doesn't exist
            $cart = session()->get('cart', []);

            // Add the product to the cart
            $cart[] = [
                'detailId' => $detailId,
                'quantity' => $quantity,
                'price' => $price,
                'productName' => $productName,
                'productSize' => $productSize,
                'productColor' => $productColor,
                'productImage' => $productImage, // Add the image to the cart data
            ];

            // Store the updated cart in the session
            session()->put('cart', $cart);

            return response()->json([
                'errCode' => 200,
                'errMess' => 'Product added to cart successfully!',
                'data' => $cart
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'errCode' => 500,
                'errMess' => 'An error occurred while adding product to cart.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    // Placeholder function, replace it with your actual code
    protected function addToUserCart($user, $detailId, $quantity)
    {
        // Add the item to the user's cart in the database
    }

    public function index()
    {
        if (auth()->check()) {
            // The user is logged in
            $user = auth()->user();
            $cart = $user->cart;
        } else {
            // The user is not logged in
            $cart = session()->get('cart', []);
        }

        return view('cart', compact('cart'));
    }

}
