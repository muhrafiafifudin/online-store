<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class ContactUsController extends Controller
{
    public function index()
    {
        $stores = Store::all()->first();

        return view('pages.contact-us', compact('stores'));
    }
}
