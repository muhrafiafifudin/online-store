<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function paymentHandler(Request $request)
    {
        $json = json_decode($request->getContent());
        $signature_key = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if($signature_key != $json->signature_key){
            return abort(404);
        }

        // Status Berhasil
        $transaction = Transaction::where('order_number', $json->order_id)->first();

        $payment = Payment::where('transactions_id', $transaction->id)->first();
        return $payment->update([
            'transaction_status' => $json->transaction_status,
            'status_code' => $json->status_code
        ]);
    }
}
