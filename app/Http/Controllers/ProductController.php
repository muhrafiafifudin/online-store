<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();

        return view('pages.product', compact('product'));
    }

    public function login()
    {
        return view('pages.login');
    }

    public function product_detail()
    {
        return view('pages.product-detail');
    }
}
