<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CartController;

class InvoiceController extends Controller
{
    public function getAllInvoices(){
        try {
            $invoices = Invoice::all();
            if (!$invoices){
                return response()->json([
                    'errCode'=>400,
                    'errMess'=>'There no invoices!',
                ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Success!',
                    'data'=>$invoices
                ],200);
            }
        } catch (\Exception $e){
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage()
            ], 500);
        }
        
    }
    // Accumulate products price from cart for login and without login
    public function getPaymentInfo(Request $request){
        try {
            $total = 0;
            if (Auth::check()){
                $customerCart = (new CartController)->getCustomerCart(Auth::user()->id);
                if($customerCart->isEmpty() || $customerCart->getStatusCode() === 400){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product in cart'
                    ],400);
                }
                foreach ($customerCart->original['data'] as $product => $productData ){
                    $finalPriceProduct = $productData['productDetail'][0]['product']['price'] - (($productData['productDetail'][0]['product']['price']*$productData['productDetail'][0]['product']['salePercent'])/100);
                    $total += $productData->quantity * $finalPriceProduct;
                }
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'success',
                    'data'=>$customerCart->original['data'],
                    'totalPayment'=>$total
                ],200);
            } 
            else {
                // Without login
                $sessionCustomerCartId = [];
                $customerCart = [];
                $sessionCart = $request->session()->get('cart');
                if (empty($sessionCart)){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product in cart'
                    ],400);
                } else {
                    foreach ($sessionCart as $sessionIdProduct => $sessionDataProduct) {
                        $sessionCustomerCartId[] = Cart::create([
                            'productDetailId' => $sessionIdProduct,
                            'quantity' => $sessionDataProduct['quantity']
                        ])->id;
                    }
                    foreach ($sessionCustomerCartId as $sessionCustomerCartId){
                        $customerCart[] = Cart::where('id', $sessionCustomerCartId)->with('ProductDetail.Product')->get();           
                    }
                    foreach ($customerCart as $product => $productData ){
                        $finalPriceProduct = $productData[0]['productDetail'][0]['product']['price'] - (($productData[0]['productDetail'][0]['product']['price']*$productData[0]['productDetail'][0]['product']['salePercent'])/100);
                        $total += $productData[0]->quantity * $finalPriceProduct;
                    }
                    return response()->json([
                        'errCode'=>200,
                        'errMess'=>'success',
                        'data'=>$customerCart, 
                        'totalPayment'=>$total
                    ],200);
                }
            }
        } catch (\Exception $e){
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage()
            ], 500);
        }
        
    }

    public function createInvoice(Request $request){
        try {
            $rawPaymentData = $this->getPaymentInfo($request);
            if ($rawPaymentData->getStatusCode() === 400 || $rawPaymentData->getStatusCode() === 500) {
                return $rawPaymentData;
            }
            $paymentData = json_decode(explode("\r\n\r\n", $rawPaymentData, 2)[1]);
            $salePercentInvoice = $request->salePercent ? $request->salePercent : 0;
            $finalTotalInvoice = $paymentData->totalPayment - (($paymentData->totalPayment*$salePercentInvoice)/100);
            // For Login 
            if (Auth::check()){
                $invoice = Invoice::create([
                    'customerId'=>Auth::user()->id,
                    'products'=>json_encode($paymentData->data),
                    'total'=>$finalTotalInvoice,
                    'salePercent'=>$salePercentInvoice,
                ]);
                $invoiceDetail = InvoiceDetail::create([
                    'firstName'=>$request->firstName,
                    'lastName'=>$request->lastName,
                    'shippingAddress'=>$request->shippingAddress,
                    'phone'=>$request->phone,
                    'invoiceId'=>$invoice->id
                ]);
                if ($invoice && $invoiceDetail){
                    // Clean cart and Recalculate stock after payment
                    $carts = Cart::where('customerId',Auth::user()->id)->get();
                    foreach($carts as $cart){
                        $productDetail = ProductDetail::where('productDetailId',$cart->productDetailId)->first();
                        $productDetail->stock -= $cart->quantity;
                        $productDetail->update();
                        $cart->delete();
                    }
                }

                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Create invoice succesfully',
                    'invoiceData'=>$invoice,
                    'invoiceDetailShippingData'=>$invoiceDetail
                ]);
            }
            else {
                // Without Login
    
                $invoice = Invoice::create([
                    'products'=>json_encode($paymentData->data),
                    'total'=>$finalTotalInvoice,
                    'salePercent'=>$salePercentInvoice,
                ]);
                $invoiceDetail = InvoiceDetail::create([
                    'firstName'=>$request->firstName,
                    'lastName'=>$request->lastName,
                    'shippingAddress'=>$request->shippingAddress,
                    'phone'=>$request->phone,
                    'invoiceId'=>$invoice->id
                ]);
                // Clean cart db and cart session after payment , Recalculate stock 
                if ($invoice && $invoiceDetail){
                    foreach($paymentData->data as $idCart => $data){
                        $cart = Cart::where('id',$data[0]->id)->first();
                        $productDetail = ProductDetail::where('productDetailId',$cart->productDetailId)->first();
                        $productDetail->stock -= $cart->quantity;
                        $productDetail->update();
                        $cart->delete();
                    }
                    $request->session()->forget('cart');
                }
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Create invoice succesfully',
                    'invoiceData'=>$invoice,
                    'invoiceDetailShippingData'=>$invoiceDetail
                ]);
            }
        } catch (\Exception $e){
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage()
            ], 500);
        }
        
    }
}
