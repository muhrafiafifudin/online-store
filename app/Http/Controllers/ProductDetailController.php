<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index()
    {
        $product_detail = Product::get();

        return view('pages.product-detail', compact('product_detail'));
    }

    public function cart()
    {
        return view('pages.login');
    }
}
