<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Builder;


class SocksViewController extends Controller
{

    public function index(Request $request)
    {
        $categories = [Category::getCategoryBanner('new arrivals', 'socks'), Category::getCategoryBanner('top', 'socks'), Category::getCategoryBanner('bottom', 'socks'), Category::getCategoryBanner('socks', 'socks')];
        $banner = Banner::getByType('socks');
        $sort = $request->query('sort');
        $product = ProductDetail::GetAllProductDetail('socks', $sort);

        if ($request->ajax()) {
            return response()->json($product);
        }
        $newarrival = ProductDetail::GetNewArrival('socks');
        $underwear = ProductDetail::GetByCategory('underwear');
        $iconcrew = ProductDetail::GetByCategory('icon crew');
        $product = ProductDetail::GetAllProductDetail('socks', $sort);
        return view('socks', ['banner' => $banner, 'categories' => $categories, 'newarrival' => $newarrival, 'underwear' => $underwear, 'iconcrew' => $iconcrew, 'product' => $product]);
    }
}