@extends('users.layouts.app')

@section('title')
    Account Detail
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Invoice<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">

                        <form action="{{ url('account/transaction/' . $transactions->id) }}" id="submit_form" method="POST">
                            @csrf

                            <input type="hidden" name="json" id="json_callback">
                        </form>

                        <h2 class="checkout-title">Order Number : {{ $transactions->order_id }}</h2><!-- End .checkout-title -->

                        <label>Full Name *</label>
                        <input type="text" class="form-control" value="{{ $transactions->name }}" disabled>

                        <label>Email address *</label>
                        <input type="email" class="form-control" value="{{ $transactions->email }}" disabled>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Province *</label>
                                <input type="text" class="form-control" value="{{ $address['province'] }}" disabled>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Town / City *</label>
                                <input type="text" class="form-control" value="{{ $address['city_name'] }}" disabled>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label>Address</label>
                        <textarea class="form-control note" cols="30" rows="4" disabled>{{ $transactions->address }}</textarea>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Postcode *</label>
                                <input type="text" class="form-control postcode" value="{{ $transactions->postcode }}" disabled>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Phone *</label>
                                <input type="text" class="form-control phone_number" value="{{ $transactions->phone_number }}" disabled>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label>Order notes (optional)</label>
                        <textarea class="form-control note" cols="30" rows="4" name="note" disabled></textarea>
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
                                    @foreach ($transactions->transactiondetails as $item)
                                        <tr>
                                            <td>{{ $item->products->name }} <strong>x{{ $item->qty }}</strong></a></td>
                                            <td>IDR. {{ number_format($item->products->price, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach

                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>IDR. {{ number_format($transactions->subtotal, 2, ',', '.') }}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>Weight</td>
                                        <td>{{ $transactions->weight }} gram</td>
                                    </tr>
                                    @if ($transactions->cities_id !== 54)
                                        <tr>
                                            <td>Shipping Price</td>
                                            <td>IDR. {{ number_format($transactions->shipping, 2, ',', '.') }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Shipping Price</td>
                                            <td>Free shipping</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Courier</td>
                                        <td>{{ strtoupper($transactions->courier) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Estimate</td>
                                        <td>{{ $transactions->estimate }}</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>IDR. {{ number_format($transactions->total, 2, ',', '.') }}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <button class="btn btn-outline-primary-2 btn-order btn-block" id="pay-button">
                                <span class="btn-text">Proceed to Checkout</span>
                                <span class="btn-hover-text">Invoice</span>
                            </button>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection

@push('scripts')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                /* You may add your own implementation here */
                alert("payment success!"); console.log(result);
                send_response_to_form(result);
            },
            onPending: function(result){
                /* You may add your own implementation here */
                alert("wating your payment!"); console.log(result);
                send_response_to_form(result);
            },
            onError: function(result){
                /* You may add your own implementation here */
                alert("payment failed!"); console.log(result);
                send_response_to_form(result);
            },
            onClose: function(){
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });

    function send_response_to_form(result)
    {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
    }
</script>
@endpush
