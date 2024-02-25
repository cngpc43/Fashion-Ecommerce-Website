<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\Belong;
use App\Models\User;

class OrderController extends Controller
{
    public static function ManageOrder()
    {
        try {
            $orders = DB::table('orders')->join('order_details', 'orders.id', '=', 'order_details.orderId')->join('product_details', 'order_details.detailId', '=', 'product_details.productDetailId')->join('products', 'product_details.productId', '=', 'products.productId')->select('orders.*', 'products.name', 'product_details.img', 'product_details.size', 'product_details.color', 'order_details.quantity')->get();
            return view('ordermanage', compact('orders'));
        } catch (QueryException $e) {
            return response()->json([
                'statusCode' => 400,
                'Message' => 'Fail!',
                'data' => $e
            ], 400);
        }
    }
    // public static function index()
    // {
    //     try {
    //         $orders = Orders::where('userId', Auth::user()->id)->get();
    //         return response()->json([
    //             'statusCode' => 200,
    //             'Message' => 'Success!',
    //             'data' => $orders
    //         ], 200);
    //     } catch (QueryException $e) {
    //         return response()->json([
    //             'statusCode' => 400,
    //             'Message' => 'Fail!',
    //             'data' => $e
    //         ], 400);
    //     }
    // }
    public static function GetNumberOfOrder()
    {
        try {
            $numberOfOrders = Orders::count();

            return response()->json([
                'statusCode' => 200,
                'Message' => 'Success!',
                'data' => $numberOfOrders
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'statusCode' => 400,
                'Message' => 'Fail!',
                'data' => $e
            ], 400);
        }
    }
    public static function CreateOrder(Request $request)
    {
        try {
            if (Auth::check()) {

                $order = new Orders();
                $order->userId = Auth::user()->id;
                $order->status = 'Pending';
                $order->totalPrice = $request->input('totalPrice');
                $order->paymentMethod = $request->input('paymentMethod');
                $order->addressID = $request->input('addressId');
                $order->ship_to = $request->input('ship_to');
                $order->save();
                $orderDetails = $request->input('detail');

                foreach ($orderDetails as $detail) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->orderId = $order->id;
                    $orderDetail->detailID = $detail['detailID'];
                    $orderDetail->quantity = $detail['quantity'];
                    $orderDetail->save();
                    $product = DB::table('product_details')->where('productDetailId', $detail['detailID'])->first();
                    DB::table('product_details')
                        ->where('productDetailId', $detail['detailID'])
                        ->update(['stock' => $product->stock - $detail['quantity']]);
                }


                $cart = Auth::user()->cart;
                Belong::where('cartID', $cart->id)->delete();

                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Success!',
                    'data' => $order
                ], 200);
            } else {
                $order = new Orders();
                $order->status = 'Pending';
                $order->totalPrice = $request->input('totalPrice');
                $order->paymentMethod = $request->input('paymentMethod');
                $order->ship_to = $request->input('ship_to');
                $order->save();
                $orderDetails = $request->input('detail');

                foreach ($orderDetails as $detail) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->orderId = $order->id;
                    $orderDetail->detailID = $detail['detailID'];
                    $orderDetail->quantity = $detail['quantity'];
                    $orderDetail->save();
                    $product = DB::table('product_details')->where('productDetailId', $detail['detailID'])->first();
                    DB::table('product_details')
                        ->where('productDetailId', $detail['detailID'])
                        ->update(['stock' => $product->stock - $detail['quantity']]);
                }
                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Success!',
                    'data' => $order
                ], 200);
            }
        } catch (QueryException $e) {
            return response()->json([
                'statusCode' => 400,
                'Message' => 'Fail!',
                'data' => $e
            ], 400);
        }
    }
    public static function getOrderbyID($id)
    {
        try {
            // $order = Orders::where('id', $id)->first();
            $order = DB::table('orders')->where('orders.id', $id)->join('addresses', 'orders.addressID', '=', 'addresses.id')->select('orders.*', 'addresses.receiver', 'addresses.phone', 'addresses.street', 'addresses.ward', 'addresses.city', 'addresses.state')->first();
            $orderDetail = OrderDetail::where('orderId', $id)->join('product_details', 'order_details.detailId', '=', 'product_details.productDetailId')->join('products', 'product_details.productId', '=', 'products.productId')->get();
            return view('order', compact('order', 'orderDetail'));
        } catch (QueryException $e) {
            return response()->json([
                'statusCode' => 400,
                'Message' => 'Fail!',
                'data' => $e
            ], 400);
        }
    }

    public static function getOrderByUserID()
    {
        try {
            $id = Auth::user()->id;
            $orders = DB::table('orders')
                ->join('order_details', 'orders.id', '=', 'order_details.orderId')
                ->join('product_details', 'order_details.detailId', '=', 'product_details.productDetailId')
                ->join('products', 'product_details.productId', '=', 'products.productId')
                ->where('orders.userId', $id)
                ->select('orders.*', 'order_details.id as orderDetailsId', 'products.name', 'product_details.img', 'product_details.size', 'product_details.color', 'products.price', 'order_details.quantity')
                ->get();
            $pending_orders = DB::table('orders')
                ->join('order_details', 'orders.id', '=', 'order_details.orderId')
                ->join('product_details', 'order_details.detailId', '=', 'product_details.productDetailId')
                ->join('products', 'product_details.productId', '=', 'products.productId')
                ->where('orders.userId', $id)
                ->where('orders.status', 'Pending')
                ->select('orders.*', 'order_details.id as orderDetailsId', 'products.name', 'product_details.img', 'product_details.size', 'product_details.color', 'products.price', 'order_details.quantity')
                ->get();
            $picked_orders = DB::table('orders')
                ->join('order_details', 'orders.id', '=', 'order_details.orderId')
                ->join('product_details', 'order_details.detailId', '=', 'product_details.productDetailId')
                ->join('products', 'product_details.productId', '=', 'products.productId')
                ->where('orders.userId', $id)
                ->where('orders.status', 'Picked up')
                ->select('orders.*', 'order_details.id as orderDetailsId', 'products.name', 'product_details.img', 'product_details.size', 'product_details.color', 'products.price', 'order_details.quantity')
                ->get();
            $delivered_orders = DB::table('orders')
                ->join('order_details', 'orders.id', '=', 'order_details.orderId')
                ->join('product_details', 'order_details.detailId', '=', 'product_details.productDetailId')
                ->join('products', 'product_details.productId', '=', 'products.productId')
                ->where('orders.userId', $id)
                ->where('orders.status', 'Delivered')
                ->select('orders.*', 'order_details.id as orderDetailsId', 'products.name', 'product_details.img', 'product_details.size', 'product_details.color', 'products.price', 'order_details.quantity')
                ->get();
            $canceled_orders = DB::table('orders')
                ->join('order_details', 'orders.id', '=', 'order_details.orderId')
                ->join('product_details', 'order_details.detailId', '=', 'product_details.productDetailId')
                ->join('products', 'product_details.productId', '=', 'products.productId')
                ->where('orders.userId', $id)
                ->where('orders.status', 'Canceled')
                ->select('orders.*', 'order_details.id as orderDetailsId', 'products.name', 'product_details.img', 'product_details.size', 'product_details.color', 'products.price', 'order_details.quantity')
                ->get();
            return view('user.ordermanage', compact('orders', 'pending_orders', 'picked_orders', 'delivered_orders', 'canceled_orders'));

        } catch (QueryException $e) {
            return response()->json([
                'statusCode' => 400,
                'Message' => 'Fail!',
                'data' => $e
            ], 400);
        }
    }
    public static function CalculateMonthlyRevenue()
    {
        try {
            $revenue = DB::table('orders')
                ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('SUM(totalPrice) as revenue'))
                ->groupBy('year', 'month')
                ->get();
            return $revenue;
        } catch (QueryException $e) {
            return null;
        }
    }
}
