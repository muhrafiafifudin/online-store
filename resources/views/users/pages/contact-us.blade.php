@extends('users.layouts.app')

@section('title')
    Diva Metal Mandiri | Contact Us
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Contact us<span>Pages</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div id="map" class="mb-5">
            <iframe src="{{ $stores->maps }}" width="1500" height="492" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End #map -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Office</h3>

                        <address>{{ $stores->address }}, <br>{{ $address['city_name'] }}, {{ $address['province'] }}, {{ $stores->postcode }}</address>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Contact</h3>

                        <div><a href="mailto:#">{{ $stores->email }}</a></div>
                        <div><a href="tel:#">{{ $stores->phone_number }}</a></div>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Social</h3>

                        <div class="social-icons social-icons-color justify-content-center">
                            <a href="#" class="social-icon social-facebook" title="Facebook"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-instagram" title="Instagram"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon social-youtube" title="Youtube"><i class="icon-youtube"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest"><i class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->

        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
