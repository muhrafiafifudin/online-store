@extends('users.layouts.app')

@section('title')
    Account
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Transactions</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('users.includes.header-account')

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <table class="table table-order">
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->order_number }}</td>
                                                <td class="text-center">IDR. {{ number_format($transaction->gross_amount, 2, ',', '.') }}</td>
                                                <td class="text-center">{{ $transaction->status }}</td>
                                                <td class="text-center">{{ $transaction->created_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('account/transaction/transaction-' . $transaction->id) }}" class="btn btn-outline-primary mr-3">Details</a>

                                                    @if ($transaction->transactions_id->num_rows() > 0)
                                                    <button class="btn btn-outline-primary-paid">Pay</button>
                                                    @else
                                                    <a href="{{ url('account/transaction/' . $transaction->id) }}" class="btn btn-outline-primary-2">Pay</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><!-- End .table table-wishlist -->
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@if (session('success'))
    <script>alert("{{ session('success') }}")</script>
@endif

@endsection
