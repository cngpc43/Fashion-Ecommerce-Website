<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;


class MenProductController extends Controller
{

    public function index()
    {
        $categories = [Category::getByName('socks'), Category::getByName('underwear'), Category::getByName('APPAREL'), Category::getByName('HATS & BEANIES')];
        $banner = Banner::getByType('men');
        $newarrival = ProductDetail::GetNewArrival();
        $underwear = ProductDetail::GetByCategory('underwear');
        $iconcrew = ProductDetail::GetByCategory('icon crew');
        $product = ProductDetail::GetAllProductDetail();
        // $detail11 = ProductDetail::GetDetailByID('11');
        return view('menproduct', ['banner' => $banner, 'categories' => $categories, 'newarrival' => $newarrival, 'underwear' => $underwear, 'iconcrew' => $iconcrew, 'product' => $product);
    }
}