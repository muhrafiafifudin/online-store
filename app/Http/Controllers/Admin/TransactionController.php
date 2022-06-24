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
            ->where('payments.transaction_status', 'settlement')
            ->get();

        return view('admin.pages.transaction.transaction', compact('transactions'));
    }
}
