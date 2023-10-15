<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;

class HomeController extends Controller
{
    public function getTrendingEachCatagory(Request $request){
        try{
            $categories = ['sock', 'top', 'bottom', 'short'];
            $trendingProducts = [];
    
            foreach ($categories as $category) {
                $products = Product::with(['productDetail' => function ($query) {
                    $query->orderBy('created_at', 'asc')->take(1);
                }])
                    ->where('category', $categories)
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();
            
                $trendingProducts[$category] = $products;
            }
            
            if($trendingProducts){
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get trending catagory success',
                    'data'=>$trendingProducts
                ],200);
            } else {
                return response()->json([
                    'errCode'=>400,
                    'errMess'=>'There no product in each catagory',
                ],400);
            }
        } catch (\Exception $e){
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage(),
            ], 500);
        }
        
    }
    public function getSocks(Request $request){
        try{
            $products = Product::with('ProductDetail')->where('category','sock')->get();
            if (!$products){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product in each catagory',
                    ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get socks product success',
                    'data'=>$products
                ],200);
            }
        } 
     catch (\Exception $e){
        return response()->json([
            'errCode' => 500,
            'errMess' => $e->getMessage(),
        ], 500);
    }}
    public function getTops(Request $request){
        try{
            $products = Product::with('ProductDetail')->where('category','top')->get();
            if (!$products){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product in each catagory',
                    ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get top products success',
                    'data'=>$products
                ],200);
            }
        } 
     catch (\Exception $e){
        return response()->json([
            'errCode' => 500,
            'errMess' => $e->getMessage(),
        ], 500);
    }}
    public function getBottoms(Request $request){
        try{
            $products = Product::with('ProductDetail')->where('category','bottom')->get();
            if (!$products){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product in each catagory',
                    ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get bottom product success',
                    'data'=>$products
                ],200);
            }
        } 
     catch (\Exception $e){
        return response()->json([
            'errCode' => 500,
            'errMess' => $e->getMessage(),
        ], 500);
    }}
    public function getHeadwears(Request $request){
        try{
            $products = Product::with('ProductDetail')->where('category','headwear')->get();
            if (!$products){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product in each catagory',
                    ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get headwear products success',
                    'data'=>$products
                ],200);
            }
        } 
     catch (\Exception $e){
        return response()->json([
            'errCode' => 500,
            'errMess' => $e->getMessage(),
        ], 500);
    }}
}
