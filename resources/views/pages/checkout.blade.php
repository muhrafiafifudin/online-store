@extends('layouts.home')

@section('title')
    Checkout
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form action="{{ url('place-order') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->

                            <label>Full Name *</label>
                            <input type="text" class="form-control name" value="{{ Auth::user()->name }}" name="name" placeholder="Enter Your Full Name ..." required>

                            <label>Email address *</label>
                            <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Your Email ..." required>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Province *</label>
                                    <select name="province" id="province" class="form-control" required>
                                        @if (Auth::user()->provinces_id == NULL)
                                            <option selected="selected">Choose Your Province</option>
                                        @else
                                            <option selected="selected" value="{{ $address{'province_id'} }}">{{ $address['province'] }}</option>
                                        @endif
                                    </select>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <select name="city" id="city" class="form-control cities">
                                        @if (Auth::user()->cities_id == NULL)
                                            <option selected="selected">Choose Your City</option>
                                        @else
                                            <option selected="selected" value="{{ $address['city_id'] }}">{{ $address['city_name'] }}</option>
                                        @endif
                                    </select>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Address</label>
                            <textarea class="form-control note" cols="30" rows="4" name="address" placeholder="Your street address, district and village ..."></textarea>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode *</label>
                                    <input type="text" class="form-control postcode" value="{{ Auth::user()->postcode }}" name="postcode" placeholder="Enter Post Code ..." required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="text" class="form-control phone_number" value="{{ Auth::user()->phone_number }}" name="phone_number" placeholder="Enter Phone Number ..." required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Order notes (optional)</label>
                            <textarea class="form-control note" cols="30" rows="4" name="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-6">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; $totalItem = 0; @endphp
                                        @foreach ($cartItems as $data)
                                            @php
                                                $totalItem = $data->products->price * $data->products_qty;
                                                $total += $data->products->price * $data->products_qty;
                                            @endphp

                                            <tr>
                                                <td><a href="#">{{ $data->products->name }} <strong>x{{ $data->products_qty }}</strong></a></td>
                                                <td>IDR. {{ number_format($totalItem, 2, ',', '.') }}</td>
                                            </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>IDR. {{ number_format($total, 2, ',', '.') }}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <th colspan="2">
                                                <div class="row mt-2">
                                                    <div class="col-sm-6">
                                                        <label>Weight</label>
                                                        @php $weight = 0; $totalWeight = 0; @endphp
                                                        @foreach ($cartItems as $data)
                                                            @php
                                                                $weight = $data->products->weight * $data->products_qty;
                                                                $totalWeight += $weight;
                                                            @endphp
                                                        @endforeach
                                                        <input type="text" class="form-control" value="{{ $totalWeight }}" name="weight" id="weight" readonly>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Courier *</label>
                                                        <select name="courier" id="courier" class="form-control" required>
                                                            <option selected="selected">Choose Your Courier</option>
                                                        </select>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->

                                                <div class="row mb-2">
                                                    <div class="col-sm-6">
                                                        <label>Package *</label>
                                                        <select name="package" id="package" class="form-control cities">
                                                            <option selected="selected">Choose Your Package</option>
                                                        </select>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Estimate</label>
                                                        <input type="text" class="form-control name" name="estimate" id="estimate" placeholder="Your Estimate ..." readonly>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                            </th>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>IDR. {{ number_format($total, 2, ',', '.') }}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
