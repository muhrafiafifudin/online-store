<?php

namespace App\Http\Controllers\Admin;

use DB;
use PDF;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = DB::table('transactions')
            ->rightJoin('payments', 'transactions.id', '=', 'payments.transactions_id')
            ->where('payments.transaction_status', 'paid')
            ->get();

        return view('admin.pages.transaction.transaction', compact('transactions'));
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

        return redirect()->route('admin.transaction.index');
    }

    public function reportTransaction()
    {
        return view('admin.pages.report.transaction');
    }

    public function printPdf($fromDate, $toDate, $type)
    {
        $fromDate = $fromDate;
        $toDate = $toDate;

        if ($type == 4) {
            $transactions = Transaction::whereDate('created_at', '>=', $fromDate)
                                ->whereDate('created_at', '<=', $toDate)
                                ->get();
        } else {
            $transactions = Transaction::whereDate('created_at', '>=', $fromDate)
                                ->whereDate('created_at', '<=', $toDate)
                                ->where('process', $type)
                                ->get();
        }

        $pdf = PDF::loadView('admin.pages.report.print-pdf', compact('transactions', 'fromDate', 'toDate'))->setPaper('a4', 'landscape');

        return $pdf->download('Diva Metal.pdf');
    }
}
