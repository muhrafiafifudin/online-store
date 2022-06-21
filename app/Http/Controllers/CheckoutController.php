<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
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
        $order = new Order();
        $order->users_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->street_address = $request->input('street_address');
        $order->house_address = $request->input('house_address');
        $order->provinces_id = $request->input('province');
        $order->cities_id = $request->input('city');
        $order->districts_id = $request->input('district');
        $order->villages_id = $request->input('village');
        $order->postcode = $request->input('postcode');
        $order->phone_number = $request->input('phone_number');
        $order->note = $request->input('note');

        // To Calculate the Gross Amount
        $gross_amount = 0;
        $cartItems_total = Cart::where('users_id', Auth::id())->get();

        foreach ($cartItems_total as $data) {
            $gross_amount += $data->products->price * $data->products_qty;
        }

        $order->gross_amount = $gross_amount;
        $order->order_id = 'order-'.rand(1111, 9999);
        $order->save();

        $cartItems = Cart::where('users_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'orders_id' => $order->id,
                'products_id' => $item->products_id,
                'qty' => $item->products_qty,
                'price' => $item->products->price * $item->products_qty
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

        return redirect('/')->with('success', 'Order Placed Successfully');
    }

    public function callback(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-UotwAE5oBWVH47THXMwwB4Kv';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => 'order-'.rand(),
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    'id' => 'a01',
                    'price' => 8000,
                    'quantity' => 4,
                    'name' => 'Apple'
                ],
                [
                    'id' => 'a01',
                    'price' => 8000,
                    'quantity' => 4,
                    'name' => 'Apple'
                ],
            ),
            'customer_details' => array(
                'first_name' => $request->get('name'),
                'last_name' => '',
                'email' => 'nama@gmail.com',
                'phone' => '12345',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.invoice', ['snapToken' => $snapToken]);
    }
}
