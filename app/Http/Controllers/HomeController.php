<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Http\Controllers\CategoryController;

class HomeController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $quarterheight = Collection::getByName('QUARTER HEIGHT');
        $amongsthestar = Collection::getByName('AMONGST THE STARS');

        $socks = Category::getByName('socks');
        $underwear = Category::getByName('underwear');
        $apparel = Category::getByName('APPAREL');
        $hats = Category::getByName('HATS & BEANIES');
        $collection = [$quarterheight, $amongsthestar];
        $categories = [$socks, $underwear, $apparel, $hats];
        return view('welcome', ['collection' => $collection, 'categories' => $categories]);
    }
}
