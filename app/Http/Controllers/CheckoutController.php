<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $users = User::get();

        $oldCart = Cart::where('users_id', Auth::id())->get();
        foreach ($oldCart as $item) {
            if (!Product::where('id', $item->products_id)->where('qty', '>=', $item->products_qty)->exists()) {
                $removeItem = Cart::where('users_id', Auth::id())->where('products_id', $item->products_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('users_id', Auth::id())->get();

        return view('pages.checkout', compact('cartItems', 'provinces', 'users'));
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

    public function placeorder(Request $request)
    {
        $transaction = new Transaction();
        $transaction->users_id = Auth::id();
        $transaction->name = $request->input('name');
        $transaction->email = $request->input('email');
        $transaction->street_address = $request->input('street_address');
        $transaction->house_address = $request->input('house_address');
        $transaction->provinces_id = $request->input('province');
        $transaction->cities_id = $request->input('city');
        $transaction->districts_id = $request->input('district');
        $transaction->villages_id = $request->input('village');
        $transaction->postcode = $request->input('postcode');
        $transaction->phone_number = $request->input('phone_number');
        $transaction->note = $request->input('note');

        // To Calculate the Gross Amount
        $gross_amount = 0;
        $cartItems_total = Cart::where('users_id', Auth::id())->get();

        foreach ($cartItems_total as $data) {
            $gross_amount += $data->products->price * $data->products_qty;
        }

        $transaction->gross_amount = $gross_amount;
        $transaction->order_number = 'order-'.rand(1111, 9999);
        $transaction->save();

        $cartItems = Cart::where('users_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $item->products_id,
                'qty' => $item->products_qty,
                'price' => $item->products->price
            ]);

            $product = Product::where('id', $item->products_id)->first();
            $product->qty = $product->qty - $item->products_qty;
            $product->update();
        }

        if (Auth::user()->street_address == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->street_address = $request->input('street_address');
            $user->house_address = $request->input('house_address');
            $user->provinces_id = $request->input('province');
            $user->cities_id = $request->input('city');
            $user->districts_id = $request->input('district');
            $user->villages_id = $request->input('village');
            $user->postcode = $request->input('postcode');
            $user->phone_number = $request->input('phone_number');
            $user->update();
        }

        $cartItems = Cart::where('users_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/account/transaction')->with('success', 'Order Placed Successfully');
    }
}
