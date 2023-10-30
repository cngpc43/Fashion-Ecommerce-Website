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
    public function getProductsByCategoryId(Request $request){
        try{
            $products = Product::with('Category','Collection')->where('categoryId',$request->query('categoryId'))->get();
            if (!$products){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product!',
                    ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get products success',
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
    public function getApperalProducts(Request $request){
        try{

            $products = Product::with('Category','Collection')
                ->whereIn('categoryId',[1,2,3,5])
                ->orderBy('created_at','desc')
                ->take(100)->get();
            if (!$products){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product!',
                    ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get products success',
                    'data'=>$products
                ],200);
            }
        } 
     catch (\Exception $e){
        return response()->json([
            'errCode' => 500,
            'errMess' => $e->getMessage(),
        ], 500);
    }
    }
    public function getProductsByCollectionId(Request $request){
        try{
            $products = Product::with('Category','Collection')->where('collectionId',$request->query('collectionId'))->get();
            if (!$products){
                    return response()->json([
                        'errCode'=>400,
                        'errMess'=>'There no product!',
                    ],400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Get products success',
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
