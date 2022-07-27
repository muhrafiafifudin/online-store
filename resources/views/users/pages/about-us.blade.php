@extends('users.layouts.app')

@section('title')
Diva Metal Mandiri | About Us
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">About us<span>Pages</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content pb-3 mt-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="about-text text-center">
                        <h2 class="title text-center mb-2">Who We Are</h2><!-- End .title text-center mb-2 -->
                        <p>PT. Diva Metal Mandiri is a furniture store such as kitchen sets, tables, TV backdrops, tables, doors, shoe racks, under stair, etc. Founded in 2006 under the company name Az-zahra, because Az-zahra still uses wood and iron, there are still some weaknesses, namely if you use wood it becomes more brittle, while using iron it will get rusty.</p><br>
                        <p>Therefore, in 2008 Az-zahra changed its name to Diva Metal Interior by using a new one, namely all frames already use aluminum, there are many advantages of using this aluminum frame, one of which is that the item is very light and strong. The raw material is replaced by using ACP (Aluminum Composite Panel) using a layer called HPL (High Pressure Laminate).</p><br>
                        <p>PT. Diva Metal Mandiri has its head office located in Padurenan, Mustikajaya, RT003/RW002 Padurenan, Kec. Mustikajaya, Bekasi, West Java. For its own branch PT. Diva Metal Mandiri has 2 branches and 1 head office, for branch offices in Jogja and Solo.</p>
                        <img src="user/assets/images/about/about-us.jpg" alt="image" class="mx-auto mb-6 mt-3">
                    </div><!-- End .about-text -->
                </div><!-- End .col-lg-10 offset-1 -->
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-puzzle-piece"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Design Quality</h3><!-- End .icon-box-title -->
                            <p>Materials are made of ACP and HPL.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-heart-o"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Professional Support</h3><!-- End .icon-box-title -->
                            <p>Customer service support for 24 hours.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Fast Delivery</h3><!-- End .icon-box-title -->
                            <p>Delivery using a fast and reliable courier.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
