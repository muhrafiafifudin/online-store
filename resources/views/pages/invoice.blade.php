@extends('layouts.home')

@section('title')
    Checkout
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
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
        <div class="invoice">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-10">
                                <div class="col-lg-6">
                                    <div class="summary">
                                        <h3 class="summary-title">Shipping Address</h3><!-- End .summary-title -->

                                        <table class="table table-summary-invoice">
                                            <tbody>
                                                <tr>
                                                    <td class="invoice-form">Full Name</td>
                                                    <td class="invoice-bridge">: &nbsp;</td>
                                                    <td class="invoice-data"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Province</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>District</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Village</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Post Code</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone Number</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Note</td>
                                                    <td>:</td>
                                                    <td>$160.00</td>
                                                </tr>
                                            </tbody>
                                        </table><!-- End .table table-summary -->
                                    </div><!-- End .summary -->
                                </div><!-- End .col-lg-3 -->
                                <div class="col-lg-6">
                                    <div class="summary">
                                        <h3 class="summary-title">Products Order</h3><!-- End .summary-title -->

                                        <table class="table table-summary-invoice">
                                            <tbody>
                                                <tr >
                                                    <td>Beige knitted elastic runner  &nbsp;<span class="summary-bold">x5</span></td>
                                                    <td>IDR 105.000.000</td>
                                                </tr>
                                                <tr>
                                                    <td>Blue utility pinafore denimdress &nbsp;<span class="summary-bold">x5</span></td>
                                                    <td>$76,00</td>
                                                </tr>
                                                <tr class="summary-subtotal">
                                                    <td>Total:</td>
                                                    <td>$160.00</td>
                                                </tr><!-- End .summary-total -->
                                            </tbody>
                                        </table><!-- End .table table-summary -->

                                        <button class="btn btn-outline-primary-2 btn-order btn-block" id="pay-button">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-hover-text">Proceed to Checkout</span>
                                        </button>
                                    </div><!-- End .summary -->
                                </div><!-- End .col-lg-3 -->
                            </div>
                        </div>
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection