@extends('layouts.home')

@section('title')
    Account
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Address</span></h1>
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
                            <div class="tab-pane fade show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Display Name *</label>
                                    <input type="text" class="form-control" required>
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required>

                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control mb-2">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection