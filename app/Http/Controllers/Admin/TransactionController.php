<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = DB::table('transactions')
            ->rightJoin('payments', 'transactions.id', '=', 'payments.transactions_id')
            ->where('transactions.process', '=', 0)
            ->where('payments.transaction_status', 'paid')
            ->get();

        return view('admin.pages.transaction.transaction-order', compact('transactions'));
    }

    public function transactionProcess()
    {
        $transactions = DB::table('transactions')
            ->rightJoin('payments', 'transactions.id', '=', 'payments.transactions_id')
            ->where('transactions.process', '=', 1)
            ->where('payments.transaction_status', 'paid')
            ->get();

        return view('admin.pages.transaction.transaction-process', compact('transactions'));
    }

    public function transactionDelivery()
    {
        $transactions = DB::table('transactions')
            ->rightJoin('payments', 'transactions.id', '=', 'payments.transactions_id')
            ->where('transactions.process', '=', 2)
            ->where('payments.transaction_status', 'paid')
            ->get();

        return view('admin.pages.transaction.transaction-delivery', compact('transactions'));
    }

    public function transactionFinish()
    {
        $transactions = DB::table('transactions')
            ->rightJoin('payments', 'transactions.id', '=', 'payments.transactions_id')
            ->where('transactions.process', '=', 3)
            ->where('payments.transaction_status', 'paid')
            ->get();

        return view('admin.pages.transaction.transaction-finish', compact('transactions'));
    }

    public function updateProcess($id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->process = 1;
        $transactions->update();

        return redirect()->route('admin.transaction.index');
    }

    public function updateDelivery(Request $request, $id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->process = 2;
        $transactions->resi = $request->resi;
        $transactions->update();

        return redirect()->route('admin.transaction.process');
    }
}
