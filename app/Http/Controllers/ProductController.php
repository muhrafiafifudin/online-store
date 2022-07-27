<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('users.pages.product', compact('products'));
    }

    public function login()
    {
        return view('users.pages.login');
    }
}
