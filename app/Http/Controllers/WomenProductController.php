<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;


class WomenProductController extends Controller
{

    public function index()
    {
        $categories = [Category::getCategoryBanner('new arrivals', 'women'), Category::getCategoryBanner('top', 'women'), Category::getCategoryBanner('bottom', 'women'), Category::getCategoryBanner('socks', 'women')];
        $banner = Banner::getByType('women');
        $newarrival = ProductDetail::GetNewArrival('women');
        $underwear = ProductDetail::GetByCategory('underwear');
        $iconcrew = ProductDetail::GetByCategory('icon crew');
        $product = ProductDetail::GetAllProductDetail('women');
        return view('womenproduct', ['banner' => $banner, 'categories' => $categories, 'newarrival' => $newarrival, 'underwear' => $underwear, 'iconcrew' => $iconcrew, 'product' => $product]);
    }
}