<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;


class MenProductController extends Controller
{

    public function index(Request $request)
    {
        $categories = [Category::getByName('socks'), Category::getByName('underwear'), Category::getByName('APPAREL'), Category::getByName('HATS & BEANIES')];
        $banner = Banner::getByType('men');
        $sort = $request->query('sort');
        $product = ProductDetail::GetAllProductDetail('men', $sort);
        if ($request->ajax()) {
            return response()->json($product);
        }
        $newarrival = ProductDetail::GetNewArrival('men');
        $underwear = ProductDetail::GetByCategory('underwear');
        $iconcrew = ProductDetail::GetByCategory('icon crew');
        return view('menproduct', ['banner' => $banner, 'categories' => $categories, 'newarrival' => $newarrival, 'underwear' => $underwear, 'iconcrew' => $iconcrew, 'product' => $product]);

    }
}