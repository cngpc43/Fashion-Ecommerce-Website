<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;

class MenProductController extends Controller
{

    public function index()
    {
        $categories = [Category::getByName('socks'), Category::getByName('underwear'), Category::getByName('APPAREL'), Category::getByName('HATS & BEANIES')];
        $banner = Banner::getByType('men');
        return view('menproduct', ['banner' => $banner, 'categories' => $categories]);
    }
}