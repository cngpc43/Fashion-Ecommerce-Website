<?php

namespace App\Http\Controllers;

use App\Models\Belong;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        if (auth()->check()) {
            $cart = Cart::CartDetail();
            return response()->json([
                'errCode' => 200,
                'errMess' => 'Success!',
                'data' => $cart
            ], 200);
        } else {
            $laravelSession = $request->cookie('laravel_session');
            Log::info('Laravel Session: ' . $laravelSession);
            $cart = $request->session()->get('cart', []);
            return response()->json(['cart' => $cart]);
        }
    }
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
    public function deleteProductFromCart(Request $request)
    {
        try {
            if (auth()->check()) {
                $detailId = $request->input('detailId');
                $userId = $request->input('userId');

            } else {

                $cart = session()->get('cart', []);

                // Filter out the product with the specified detailId
                $cart = array_filter($cart, function ($product) use ($detailId) {
                    return intval($product['detailId']) != intval($detailId);
                });

                // Re-index the array
                $cart = array_values($cart);

                // Store the updated cart in the session
                session()->put('cart', $cart);
                session()->save();

                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Product removed from cart successfully!',
                    'data' => $cart

                ], 200);
            }


        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => 'An error occurred while removing product from cart.',
                'error' => $e->getMessage()
            ], 500);
        }
        // Get the cart from the session
    }
    public static function addToUserCart($userId, $detailId, $quantity)
    {
        // Find the user
        $user = User::FindByID($userId);
        // Find the user's cart
        $cart = $user->cart;
        // Check if the item already exists in the cart
        $existingItem = $cart->belongs->where('detailID', $detailId)->first();

        if ($existingItem) {
            // The item already exists in the cart, update the quantity
            $existingItem->quantity += $quantity;
            $existingItem->save();
        } else {
            // The item does not exist in the cart, add a new item
            $cart->belongs()->create([
                'detailID' => $detailId,
                'quantity' => $quantity,
            ]);
        }
    }
    public function addToCart(Request $request)
    {

        $laravelSession = $request->cookie('laravel_session');
        Log::info('Laravel Session: ' . $laravelSession);
        try {
            $userId = $request->input('userId');
            $detailId = $request->input('detailId');
            $quantity = $request->input('quantity');
            $detail = ProductDetail::GetInfoByDetailID($detailId);
            if (auth()->check()) {
                Log::info('User is logged in');
                $this->addToUserCart(auth()->id(), $detailId, $quantity);
            } else {
                if (!$detail) {
                    return response()->json([
                        'errCode' => 404,
                        'errMess' => 'Product not found.',
                    ], 404);
                }
                if ($quantity > $detail->stock) {
                    return response()->json([
                        'errCode' => 400,
                        'errMess' => 'The requested quantity is not available.',
                    ], 400);
                }
                $cart = session()->get('cart', []);

                // Check if the product is already in the cart
                foreach ($cart as &$item) {
                    if ($item['detailId'] == $detailId) {
                        // Check if the current quantity plus the incoming quantity is less than or equal to the stock
                        if ($item['quantity'] + $quantity > $detail->stock) {
                            return response()->json([
                                'errCode' => 400,
                                'errMess' => 'The requested quantity is not available.',
                            ], 400);
                        }

                        // Update the quantity and exit the method
                        $item['quantity'] += $quantity;
                        session()->put('cart', $cart);
                        return response()->json([
                            'errCode' => 200,
                            'errMess' => 'Product quantity updated successfully!',
                            'data' => $cart
                        ], 200);
                    }
                }
            }


            // If the product is not in the cart, add it
            $cart[] = [
                'detailId' => $detailId,
                'quantity' => $quantity,
                'price' => $detail->price,
                'productName' => $detail->name,
                'productSize' => $detail->size,
                'productColor' => $detail->color,
                'productImage' => $detail->img,
            ];

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
