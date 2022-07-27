<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $payments = 0;

        $users = User::count();
        $products = Product::count();
        $transactions = DB::table('transactions')
            ->rightJoin('payments', 'transactions.id', '=', 'payments.transactions_id')
            ->where('payments.transaction_status', 'paid')
            ->get();

        foreach ($transactions as $transaction) {
            $payments += $transaction->gross_amount;
        }

        $incomes = $payments;

        return view('admin.pages.dashboard', [
            'users' => $users,
            'products' => $products,
            'incomes' => $incomes
        ]);
    }
}
