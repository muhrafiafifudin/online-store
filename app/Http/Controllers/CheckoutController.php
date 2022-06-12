<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $provinces = Province::all();

        $oldCart = Cart::where('users_id', Auth::id())->get();
        foreach ($oldCart as $item) {
            if (!Product::where('id', $item->products_id)->where('qty', '>=', $item->products_qty)->exists()) {
                $removeItem = Cart::where('users_id', Auth::id())->where('products_id', $item->products_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('users_id', Auth::id())->get();

        return view('pages.checkout', compact('cartItems', 'provinces',));
    }

    public function getCity(Request $request)
    {
        $province_id = $request->province_id;
        $city = Regency::where('province_id', $province_id)->get();

        foreach ($city as $data) {
            echo "<option value='$data->id'>$data->name</option>";
        }
    }

    public function getDistrict(Request $request)
    {
        $city_id = $request->city_id;
        $district = District::where('regency_id', $city_id)->get();

        foreach ($district as $data) {
            echo "<option value='$data->id'>$data->name</option>";
        }
    }

    public function getVillage(Request $request)
    {
        $district_id = $request->district_id;
        $village = Village::where('district_id', $district_id)->get();

        foreach ($village as $data) {
            echo "<option value='$data->id'>$data->name</option>";
        }
    }
}
