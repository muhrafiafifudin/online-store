<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function dashboard()
    {
        return view('pages.account-dashboard');
    }

    public function order()
    {
        $orders = Order::where('users_id', Auth::id())->get();

        return view('pages.account-order', compact('orders'));
    }

    public function orderDetail($id)
    {
        $orders = Order::where('id', $id)->where('users_id', Auth::id())->first();

        return view('pages.account-order-detail', compact('orders'));
    }

    public function paymentDetail($id)
    {
        $orders = Order::where('id', $id)->where('users_id', Auth::id())->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');

        $params = array(
            'transaction_details' => array(
                'order_id' => $orders->order_id,
                'gross_amount' => $orders->gross_amount,
            ),
            'customer_details' => array(
                'first_name' => $orders->name,
                'last_name' => '',
                'email' => $orders->email,
                'phone' => $orders->phone_number,
            ),
            'shipping_address' => array(
                'first_name' => $orders->name,
                'last_name' => '',
                'email' => $orders->email,
                'phone' => $orders->phone_number,
                'address' => $orders->street_address . $orders->home_address,
                'city' => $orders->regencies->name,
                'postal_code' => $orders->postcode,
                'country_code' => 'IDN'
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.account-payment-detail', [
            'orders' => $orders,
            'snapToken' => $snapToken
        ]);
    }

    public function paymentPost(Request $request)
    {
        $json = json_decode($request->get('json'));
        $order = Order::where('order_id', $json->order_id)->first();
        $order->status = $json->transaction_status;
        $order->transaction_id = $json->transaction_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;

        return $order->update() ? redirect(url('/'))->with('alert-success', 'Order Berhasil Dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi Kesalahan');
    }

    public function address()
    {
        return view('pages.account-address');
    }
}
