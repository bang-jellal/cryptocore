<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::published()
            ->orderBy('created_at', 'ASC')
            ->limit(8)
            ->get();

        $categories = Category::all()->random(6);

        return view('home.index', compact('products', 'categories'));
    }
}
