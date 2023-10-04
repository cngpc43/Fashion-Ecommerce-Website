<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function getAllProducts(){
        $products = Product::all();
        if (!$products){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'There no product in db!',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Success!',
                'data'=>$products
            ],200);
        }
    }

    public function findProduct(Request $request){
        $product = Product::where('id',$request->query('id'))->first();
        if (!$product){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'There no product has this id!',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Success!',
                'data'=>$product
            ],200);
        }
    }

    public function createNewProduct(Request $request){
        $product = Product::create([
            'name'=>$request->name,
            'size'=>$request->size,
            'type'=>$request->type,
            'color'=>$request->color,
            'price'=>$request->price,
            'description'=>$request->description,
            'spec'=>$request->spec,
            'salePercent'=>$request->salePercent
        ]);
        if (!$product){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'Cannot create product',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Ok !',
                'data'=>$product
            ],200);
        }
    }

    public function updateProduct(Request $request)
    {
        $product = Product::where('id', $request->query('id'))->first();


        if (!$product) {
            return response()->json([
                'errCode' => 400,
                'errMess' => 'Product not found',
            ], 400);
        }

        $product->name = $request->name;
        $product->type = $request->type;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->spec = $request->spec;
        $product->salePercent = $request->salePercent;
        $product->size = $request->size;

        if (!$product->save()) {
            return response()->json([
                'errCode' => 400,
                'errMess' => 'Cannot update product',
            ], 400);
        }

        return response()->json([
            'errCode' => 200,
            'errMess' => 'Product updated successfully',
            'data' => $product,
        ], 200);
    }

    public function deleteProduct(Request $request){
        $product = Product::find($request->query('id'));
        if(!$product){
            return response()->json([
                'errCode'=>'400',
                'errMess'=>'Cannot find this product in db'
            ],400);
        }
        else {
            $product->delete();
            return response()->json([
                'errCode'=>'200',
                'errMess'=>'Delete successfully'
            ],200);
        }
    }
}
