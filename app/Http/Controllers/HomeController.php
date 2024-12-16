<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function welcome()
    {
        $featuredProducts = Product::where('is_featured', '=', true)->limit(5)->latest()->get();
        // shuffle $featuredProducts to take one randomly
        $frontProduct = $featuredProducts->random(1)->first();
        $featuredProducts = $featuredProducts->filter(fn($product) => $product->id != $frontProduct->id);
        return view('welcome', compact('featuredProducts', 'frontProduct'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


}
