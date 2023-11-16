<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Banner;
use App\Http\Controllers\CategoryController;
use App\Models\ProductDetail;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::getByType('home');
        $first = ProductDetail::GetProductDetailByCollection(Collection::getFirstBannerName());
        $second = ProductDetail::GetProductDetailByCollection(Collection::getSecondBannerName());
        $collection = Collection::getFeaturedCollection();
        $categories = [Category::getByName('socks'), Category::getByName('underwear'), Category::getByName('APPAREL'), Category::getByName('HATS & BEANIES')];
        return view('welcome', ['collection' => $collection, 'categories' => $categories, 'banner' => $banner, 'first' => $first, 'second' => $second]);
    }
}
