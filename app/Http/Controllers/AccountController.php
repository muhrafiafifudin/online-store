<?php

namespace App\Http\Controllers;

use Midtrans;
use App\Models\User;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class AccountController extends Controller
{
    public function dashboard()
    {
        return view('users.pages.account-dashboard');
    }

    public function transaction()
    {
        $transactions = Transaction::where('users_id', Auth::id())->get();
        // $transactions = DB::table('transactions')
        //         ->rightJoin('payments', 'transactions.id', '=', 'payments.transactions_id')
        //         ->where('transactions.users_id', Auth::id())
        //         ->where('transactions.id', 'payments.transactions_id')
        //         ->get();
        // dd($transactions);

        return view('users.pages.account-transaction', compact('transactions'));
    }

    public function transactionDetail($id)
    {
        $transactions = Transaction::where('id', $id)->where('users_id', Auth::id())->first();
        $address = RajaOngkir::kota()->dariProvinsi($transactions->provinces_id)->find($transactions->cities_id);

        return view('users.pages.account-transaction-detail', compact('transactions', 'address'));
    }

    public function paymentDetail($id)
    {
        $transactions = Transaction::where('id', $id)->where('users_id', Auth::id())->first();
        $address = RajaOngkir::kota()->dariProvinsi($transactions->provinces_id)->find($transactions->cities_id);

        foreach ($transactions->transactiondetails as $item) {
            $item_details[] =  array(
                'id' => $item->products_id,
                'price' => $item->products->price,
                'quantity' => $item->qty,
                'name' => $item->products->name
            );
        }

        $shipping = array(
            'id' => 'shipping',
            'price' => $transactions->shipping,
            'quantity' => 1,
            'name' => 'Shipping Price'
        );

        $item_details[] = $shipping;

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
                'order_id' => $transactions->id . '-' . rand(),
                'gross_amount' => $transactions->gross_amount,
            ),
            'item_details' => $item_details,
            'customer_details' => array(
                'first_name' => $transactions->name,
                'last_name' => '',
                'email' => $transactions->email,
                'phone' => $transactions->phone_number,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('users.pages.account-payment-detail', compact('transactions',  'snapToken', 'address'));
    }

    public function paymentPost(Request $request)
    {
        $json = json_decode($request->get('json'));
        $payment = new Payment();
        $payment->transactions_id = $request->id;
        $payment->order_id = $json->order_id;
        $payment->transaction_id = $json->transaction_id;
        $payment->gross_amount = $json->gross_amount;
        $payment->payment_type = $json->payment_type;
        $payment->status_code = $json->status_code;
        $payment->transaction_time = $json->transaction_time;

        $transaction_status = $json->transaction_status;
        $fraud = $json->fraud_status;

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $payment->transaction_status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $payment->transaction_status = 'paid';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $payment->transaction_status = 'failed';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $payment->transaction_status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $payment->transaction_status = 'failed';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $payment->transaction_status = 'paid';
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $payment->transaction_status = 'pending';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $payment->transaction_status = 'failed';
        }

        return $payment->save() ? redirect(url('/account/transaction-success'))->with('alert-success', 'Order Berhasil Dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi Kesalahan');
    }

    public function transactionSuccess()
    {
        return view('users.pages.transaction-success');
    }

    public function address()
    {
        $users = Auth::user();
        $address = RajaOngkir::kota()->dariProvinsi($users->provinces_id)->find($users->cities_id);

        return view('users.pages.account-address', compact('users', 'address'));
    }

    public function addressUpdate(Request $request)
    {
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

        return redirect()->route('account.user');
    }

    public function updateFinish(Request $request, $id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->process = 3;
        $transactions->update();

        return redirect('account/transaction/transaction-' . $id);
    }
}
