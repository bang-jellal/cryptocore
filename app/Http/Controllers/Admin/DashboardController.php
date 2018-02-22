<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'ASC')
            ->limit(8)
            ->get();

        $products = Product::orderBy('created_at', 'ASC')
            ->limit(5)
            ->get();

        return view('admin.dashboard.index', compact('users', 'products'));
    }
}
