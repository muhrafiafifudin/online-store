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

        return view('pages.account-order-detail', [
            'orders' => $orders,
        ]);
    }

    public function address()
    {
        return view('pages.account-address');
    }
}
