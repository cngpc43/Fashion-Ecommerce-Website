<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public static function getCategorybyName(Request $request)
    {
        $category = Category::where('name', $request->query('name'))->first();
        if (!$category) {
            return response()->json([
                'errCode' => 400,
                'errMess' => 'There no product has this id!',
            ], 400);
        } else {
            return response()->json([
                'errCode' => 200,
                'errMess' => 'Success!',
                'data' => $category
            ], 200);
        }
    }

}
