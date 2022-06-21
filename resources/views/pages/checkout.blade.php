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
                        <div class="col-lg-7">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->

                            <label>Full Name *</label>
                            <input type="text" class="form-control name" value="{{ Auth::user()->name }}" name="name" placeholder="Enter Your Full Name ..." required>

                            <label>Email address *</label>
                            <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Your Email ..." required>

                            <label>Street address *</label>
                            <input type="text" class="form-control street_address" value="{{ Auth::user()->street_address }}" name="street_address" placeholder="Street address etc ..." required etc ..." required>
                            <input type="text" class="form-control home_address" value="{{ Auth::user()->home_address }}" name="house_address" placeholder="House number etc ...">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Province *</label>
                                    <select name="province" id="province" class="form-control" required>
                                        <option selected="selected">Choose Your Province</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" {{ $province->id == Auth::user()->provinces_id ? 'selected' : '' }}>{{ $province->name }}</option>>
                                        @endforeach
                                    </select>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <select name="city" id="city" class="form-control cities">
                                        @foreach ($users as $user)
                                            <option value="{{ Auth::user()->cities_id == NULL ? 0 : $user->regencies->id }}" selected >{{ Auth::user()->cities_id == NULL ? 'Choose Your City' : $user->regencies->name }}</option>
                                        @endforeach

                                    </select>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>District *</label>
                                    <select name="district" id="district" class="form-control districts">
                                        @foreach ($users as $user)
                                            <option value="{{ Auth::user()->districts_id == NULL ? 0 : $user->districts->id }}" selected >{{ Auth::user()->districts_id == NULL ? 'Choose Your District' : $user->districts->name }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Village *</label>
                                    <select name="village" id="village" class="form-control villages">
                                        @foreach ($users as $user)
                                            <option value="{{ Auth::user()->villages_id == NULL ? 0 : $user->villages->id }}" selected >{{ Auth::user()->villages_id == NULL ? 'Choose Your Village' : $user->villages->name }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

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
                        <aside class="col-lg-5">
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
                                            <td>Shipping Price</td>
                                            <td>Free shipping</td>
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
