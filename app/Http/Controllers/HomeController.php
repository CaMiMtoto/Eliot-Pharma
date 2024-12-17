<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        $featuredCategories = Category::query()
            ->whereHas('products')
            ->where('is_featured', '=', true)
            ->with('products')
            ->limit(2)->latest()->get();
        return view('welcome', compact('featuredProducts', 'frontProduct', 'featuredCategories'));
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
