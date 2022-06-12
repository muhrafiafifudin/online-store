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
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            
                            <label>Full Name *</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="full_name" placeholder="Enter Your Full Name ..." required>

                            <label>Email address *</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Your Email ..." required>

                            <label>Street address *</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->street_address }}" name="street_address" placeholder="Street name etc ..." required>
                            <input type="text" class="form-control" value="{{ Auth::user()->home_address }}" name="house_address" placeholder="House number etc ..." required>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Province *</label>
                                    <select name="province" id="province" class="form-control" required>
                                        <option value="popularity" selected="selected">Choose Your Province</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" {{ $province->id == Auth::user()->provinces_id ? 'selected' : '' }}>{{ $province->name }}</option>>
                                        @endforeach
                                    </select>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <select name="city" id="city" class="form-control" required>
                                        @foreach ($users as $user)
                                            <option value="{{ Auth::user()->cities_id == NULL ? 0 : $user->regencies->id }}" selected >{{ Auth::user()->cities_id == NULL ? 'Choose Your City' : $user->regencies->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>District *</label>
                                    <select name="district" id="district" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ Auth::user()->districts_id == NULL ? 0 : $user->districts->id }}" selected >{{ Auth::user()->districts_id == NULL ? 'Choose Your District' : $user->districts->name }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Village *</label>
                                    <select name="village" id="village" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ Auth::user()->villages_id == NULL ? 0 : $user->villages->id }}" selected >{{ Auth::user()->villages_id == NULL ? 'Choose Your Village' : $user->villages->name }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode *</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->postcode }}" name="postcode" placeholder="Enter Post Code ..." required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->phone_number }}" name="phone_number" placeholder="Enter Phone Number ..." required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Order notes (optional)</label>
                            <textarea class="form-control" cols="30" rows="4" name="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
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
                                        @foreach ($cartItems as $data)
                                            <tr>
                                                <td><a href="#">{{ $data->products->name }}</a></td>
                                                <td>{{ $data->products->total }}</td>
                                            </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                    Direct bank transfer
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                    Check payments
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Cash on delivery
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Credit Card (Stripe)
                                                    <img src="assets/images/payments-summary.png" alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

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