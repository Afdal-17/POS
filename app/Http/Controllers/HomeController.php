<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
        public function index(){
        return view('home');
    }

    public function testing() {
        $category = category::get();
        $product = Product::with('category')->get();
        dd($product);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');

    }
}
