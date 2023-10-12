<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function getAllProducts()
    {
        try {
            $products = Product::with('ProductDetail')->get();
            if (!$products) {
                return response()->json([
                    'errCode' => 400,
                    'errMess' => 'There are no products in the database!',
                ], 400);
            } else {
                return response()->json([
                    'errCode' => 200,
                    'errMess' => 'Success!',
                    'data' => $products
                ], 200);
            }
        } catch (\Exception $e) {
            // Exception handling
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage(),
            ], 500);
        }
    }

    public function findProduct(Request $request)
    {
        try {
            $product = Product::with('ProductDetail')->where('productId', $request->query('productId'))->first();
            if (!$product) {
                return response()->json([
                    'errCode' => 400,
                    'errMess' => 'There is no product with this ID!',
                ], 400);
            } else {
                return response()->json([
                    'errCode' => 200,
                    'errMess' => 'Success!',
                    'data' => $product
                ], 200);
            }
        } catch (\Exception $e) {
            // Exception handling
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage(),
            ], 500);
        }
    }

    public function createNewProduct(Request $request){
        try {
            $isProductExist = Product::where('name', $request->name)->first();
            $product =null;
            $productDetail=null;
            // validator
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'size' => 'required',
                'color' => 'required',
                'stock' => 'required',
            ], [
                'name.required' => 'The name field is required.',
                'size.required' => 'The size field is required.',
                'color.required' => 'The color field is required.',
                'stock.required' => 'The stock field is required.',
            ]);
            if ($validator->fails()) {
                return response([
                    'errCode'=>400,
                    'errMess'=>'Missing required parameter'
                ],400);
            }

            // Check for product exist
            if (!$isProductExist){
                $product = Product::create([
                    'name' => $request->name,
                    'type' => $request->type,
                    'price' => $request->price,
                    'description' => $request->description,
                    'spec' => $request->spec,
                    'salePercent' => $request->salePercent ?: 0,
                ]);
                // return response()->json([
                //     'b'=>$product
                // ]);
                $productDetail = ProductDetail::create([
                    'productId'=>$product->id,
                    'size' => $request->size,
                    'color' => $request->color, 
                    'stock' => $request->stock
                ]);
            } else {
                $productDetail = ProductDetail::create([
                    'productId'=>$isProductExist->productId,
                    'size' => $request->size,
                    'color' => $request->color, 
                    'stock' => $request->stock
                ]);
            }
            

            if (!$productDetail) {
                return response()->json([
                    'errCode' => 400,
                    'errMess' => 'Cannot create product',
                ], 400);
            } else {
                return response()->json([
                    'errCode'=>200,
                    'errMess'=>'Create success',
                    'productData'=>$isProductExist ? $isProductExist : $product,
                    'productDetailData'=>$productDetail
                ]);
            }
        } catch (QueryException $exception) {
            // Unique constraint violation
            return response()->json([
                'errCode' => 400,
                'errMess' => 'Product with the same size and color already exists',
                'a'=>$exception->getMessage()
            ], 400);
        }catch (\Exception $e) {
            // Exception handling
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage(),
            ], 500);
        }
    }

    // Update base on productId and size
    public function updateProduct(Request $request)
    {
        try {
            $product = Product::findOrFail($request->productId);
            $productDetail = ProductDetail::where('productId', $request->productId)->where('size', $request->size)->first();

            // Validator
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'size' => 'required',
                'color' => 'required',
                'stock' => 'required',
            ], [
                'name.required' => 'The name field is required.',
                'size.required' => 'The size field is required.',
                'color.required' => 'The color field is required.',
                'stock.required' => 'The stock field is required.',
            ]);

            if ($validator->fails()) {
                return response([
                    'errCode' => 400,
                    'errMess' => 'Missing required parameter'
                ], 400);
            }

            $product->update([
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'description' => $request->description,
                'spec' => $request->spec,
                'salePercent' => $request->salePercent ?: 0,
            ]);

            if ($productDetail) {
                $productDetail->update([
                    'color' => $request->color,
                    'stock' => $request->stock,
                ]);
            } else {
                $productDetail = ProductDetail::create([
                    'productId' => $request->productId,
                    'size' => $request->size,
                    'color' => $request->color,
                    'stock' => $request->stock,
                ]);
            }

            return response()->json([
                'errCode' => 200,
                'errMess' => 'Update success',
                'productData' => $product,
                'productDetailData' => $productDetail,
            ]);
        } catch (QueryException $exception) {
            return response()->json([
                'errCode' => 404,
                'errMess' => 'Product not found',
                'a'=>$exception->getMessage()
            ], 404);
        } catch (\Exception $e) {
            // Exception handling
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage(),
            ], 500);
        }
    }

    public function deleteProduct(Request $request)
    {
        try {
            $product = Product::find($request->query('productId'));
            if (!$product) {
                return response()->json([
                    'errCode' => '400',
                    'errMess' => 'Cannot find this product in the database'
                ], 400);
            } else {
                $product->delete();
                return response()->json([
                    'errCode' => '200',
                    'errMess' => 'Delete successful'
                ], 200);
            }
        } catch (\Exception $e) {
            // Exception handling
            return response()->json([
                'errCode' => 500,
                'errMess' => $e->getMessage(),
            ], 500);
        }
    }
}
