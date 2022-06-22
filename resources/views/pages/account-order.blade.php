@extends('layouts.home')

@section('title')
    Account
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Order</span></h1>
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
                    @include('includes.header-account')

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <table class="table table-order">
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->order_id }}</td>
                                                <td class="text-center">IDR. {{ number_format($order->gross_amount, 2, ',', '.') }}</td>
                                                <td class="text-center">{{ $order->status }}</td>
                                                <td class="text-center">{{ $order->created_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('account/order/order-' . $order->id) }}" class="btn btn-outline-primary mr-3">View Orders</a>

                                                    @if ($order->status == 'waiting')
                                                        <a href="{{ url('account/order/' . $order->id) }}" class="btn btn-outline-primary-2">Pay</a>
                                                    @else
                                                        <button class="btn btn-outline-primary-paid">Pay</button>
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
