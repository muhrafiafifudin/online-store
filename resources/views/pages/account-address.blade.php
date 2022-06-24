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
                                <form action="{{ url('account/user-account/' . Auth::id()) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <label>Full Name</label>
                                    <input type="text" class="form-control name" value="{{ Auth::user()->name }}" name="name" placeholder="Enter Your Full Name ...">

                                    <label>Email address</label>
                                    <input type="email" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Your Email ...">

                                    <label>Street address</label>
                                    <input type="text" class="form-control street_address" value="{{ Auth::user()->street_address }}" name="street_address" placeholder="Street address etc ...">
                                    <input type="text" class="form-control home_address" value="{{ Auth::user()->home_address }}" name="house_address" placeholder="House number etc ...">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Province</label>
                                            <select name="province" id="province" class="form-control">
                                                <option selected="selected">Choose Your Province</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}" {{ $province->id == Auth::user()->provinces_id ? 'selected' : '' }}>{{ $province->name }}</option>>
                                                @endforeach
                                            </select>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Town / City</label>
                                            <select name="city" id="city" class="form-control cities">
                                                @foreach ($users as $user)
                                                    <option value="{{ Auth::user()->cities_id == NULL ? 0 : $user->regencies->id }}" selected >{{ Auth::user()->cities_id == NULL ? 'Choose Your City' : $user->regencies->name }}</option>
                                                @endforeach

                                            </select>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>District</label>
                                            <select name="district" id="district" class="form-control districts">
                                                @foreach ($users as $user)
                                                    <option value="{{ Auth::user()->districts_id == NULL ? 0 : $user->districts->id }}" selected >{{ Auth::user()->districts_id == NULL ? 'Choose Your District' : $user->districts->name }}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Village</label>
                                            <select name="village" id="village" class="form-control villages">
                                                @foreach ($users as $user)
                                                    <option value="{{ Auth::user()->villages_id == NULL ? 0 : $user->villages->id }}" selected >{{ Auth::user()->villages_id == NULL ? 'Choose Your Village' : $user->villages->name }}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode</label>
                                            <input type="text" class="form-control postcode" value="{{ Auth::user()->postcode }}" name="postcode" placeholder="Enter Post Code ...">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone</label>
                                            <input type="text" class="form-control phone_number" value="{{ Auth::user()->phone_number }}" name="phone_number" placeholder="Enter Phone Number ...">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <button type="submit" class="btn btn-outline-primary-2 mt-2">
                                        <span>UPDATE CHANGES</span>
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
