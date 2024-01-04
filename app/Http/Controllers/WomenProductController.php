<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;


class WomenProductController extends Controller
{

    public function index(Request $request)
    {
        $categories = [Category::getCategoryBanner('new arrivals', 'women'), Category::getCategoryBanner('top', 'women'), Category::getCategoryBanner('bottom', 'women'), Category::getCategoryBanner('socks', 'women')];
        $banner = Banner::getByType('women');
        $sort = $request->query('sort');
        $product = ProductDetail::GetAllProductDetail('women', $sort);
        if ($request->ajax()) {
            return response()->json($product);
        }
        $newarrival = ProductDetail::GetNewArrival('women');
        $underwear = ProductDetail::GetByCategory('underwear');
        $iconcrew = ProductDetail::GetByCategory('icon crew');
        $product = ProductDetail::GetAllProductDetail('women', $sort);
        return view('womenproduct', ['banner' => $banner, 'categories' => $categories, 'newarrival' => $newarrival, 'underwear' => $underwear, 'iconcrew' => $iconcrew, 'product' => $product]);
    }
}