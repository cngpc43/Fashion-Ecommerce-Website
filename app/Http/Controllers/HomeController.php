<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;

class HomeController extends Controller
{
    public function getTrendingEachCatagory(Request $request){
        try{
            $types = ['sock', 'top', 'bottom', 'short'];
            $trendingProducts = [];
    
            foreach ($types as $type) {
                $products = Product::with(['productDetail' => function ($query) {
                    $query->orderBy('created_at', 'asc')->take(1);
                }])
                    ->where('type', $type)
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();
            
                $trendingProducts[$type] = $products;
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
}
