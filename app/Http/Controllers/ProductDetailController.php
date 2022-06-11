<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($slug)
    {
        if (Product::where('slug', $slug)->exists()) {
            $products = Product::where('slug', $slug)->first();

            return view('pages.product-detail', compact('products'));
        } else {
            return redirect('/product')->with('view', 'The link was broken');
        }
    }
}
