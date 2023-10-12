<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CartController;

class InvoiceController extends Controller
{
    public function getAllInvoices(){
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
    }
    public function getPaymentInfo(Request $request){
        $total = 0;
        if (Auth::check()){
            $customerCart = (new CartController)->getCustomerCart(Auth::user()->id);
            foreach ($customerCart->original['data'] as $product => $productData ){
                $finalPriceProduct = $productData['product'][0]['price'] - (($productData['product'][0]['salePercent']*$productData['product'][0]['price'])/100);
                $total += $productData->quantity * $finalPriceProduct;
            }      
            return response()->json([
                'errCode'=>200,
                'errMess'=>'success',
                'data'=>$customerCart->original['data'],
                'totalPayment'=>$total
            ],200);
        } else {
            // Without login
            // $sessionCart = $request->session()->get('cart');
            // $productData = [];
            // foreach($sessionCart as $sessionIdProduct => $sessionDataProduct){
            //     $product = Product::where('id',$sessionIdProduct)->first();
            //     // Append product Data to show
            //     array_push($productData,$product);
            //     $finalPriceProduct = $product['price'] - (($product['price']*$product['salePercent'])/100);
            //     $total += $sessionDataProduct['quantity'] * $finalPriceProduct;
            // }
            
            // // echo json_encode($sessionCart);
            // return response()->json([
            //     'errCode'=>200,
            //     'errMess'=>'success',
            //     // 'dataCart'=>$sessionCart->original['data'],
            //     'dataProduct'=>$productData, 
            //     'totalPayment'=>$total
            // ],200);
        }
    }

    public function createInvoice(Request $request){
        // For account 
        if (Auth::check()){
            $rawPaymentData = $this->getPaymentInfo($request);
            $paymentData = json_decode(explode("\r\n\r\n", $rawPaymentData, 2)[1]);
            // echo $paymentData->totalPayment;
            $salePercentInvoice = $request->salePercent ? $request->salePercent : 0;
            $finalTotalInvoice = $paymentData->totalPayment - (($paymentData->totalPayment*$salePercentInvoice)/100);
            $invoice = Invoice::create([
                'customerId'=>Auth::user()->id,
                'products'=>json_encode($paymentData->data),
                'total'=>$finalTotalInvoice,
                'salePercent'=>$salePercentInvoice,
            ]);
            $invoiceDetail = InvoiceDetail::create([
                'invoiceId'=>$invoice->id,
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'shippingAddress'=>$request->shippingAddress,
                'phone'=>$request->phone,
            ]);

            if ($invoice && $invoiceDetail){
                $carts = Cart::where('customerId',Auth::user()->id)->get();
                foreach($carts as $cart){
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
            echo 'no';
        }
        // For no login [SESSION]
    }
}
