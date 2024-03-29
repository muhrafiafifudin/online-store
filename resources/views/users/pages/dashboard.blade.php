@extends('users.layouts.app')

@section('title')
    Diva Metal Mandiri
@endsection

@section('content')
<main class="main">
    <div class="intro-section bg-lighter pt-5 pb-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                        <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "responsive": {
                                    "768": {
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="user/assets/images/slider/slide-1-480w.jpg">
                                        <img src="user/assets/images/slider/slide-1.jpg" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">Topsale Collection</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">Living Room<br>Furniture</h1><!-- End .intro-title -->

                                    <a href="category.html" class="btn btn-outline-white">
                                        <span>SHOP NOW</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="user/assets/images/slider/slide-2-480w.jpg">
                                        <img src="user/assets/images/slider/slide-2.jpg" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">News and Inspiration</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">New Arrivals</h1><!-- End .intro-title -->

                                    <a href="category.html" class="btn btn-outline-white">
                                        <span>SHOP NOW</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="user/assets/images/slider/slide-3-480w.jpg">
                                        <img src="user/assets/images/slider/slide-3.jpg" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">Outdoor Furniture</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">Outdoor Dining <br>Furniture</h1><!-- End .intro-title -->

                                    <a href="category.html" class="btn btn-outline-white">
                                        <span>SHOP NOW</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->
                        </div><!-- End .intro-slider owl-carousel owl-simple -->

                        <span class="slider-loader"></span><!-- End .slider-loader -->
                    </div><!-- End .intro-slider-container -->
                </div><!-- End .col-lg-8 -->
                <div class="col-lg-4">
                    <div class="intro-banners">
                        <div class="row row-sm">
                            <div class="col-md-6 col-lg-12">
                                <div class="banner banner-display">
                                    <a href="#">
                                        <img src="user/assets/images/banners/home/intro/banner-1.jpg" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle text-darkwhite"><a href="#">Clearence</a></h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title text-white"><a href="#">Chairs & Chaises <br>Up to 40% off</a></h3><!-- End .banner-title -->
                                        <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-md-6 col-lg-12 -->

                            <div class="col-md-6 col-lg-12">
                                <div class="banner banner-display mb-0">
                                    <a href="#">
                                        <img src="user/assets/images/banners/home/intro/banner-2.jpg" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle text-darkwhite"><a href="#">New in</a></h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title text-white"><a href="#">Best Lighting <br>Collection</a></h3><!-- End .banner-title -->
                                        <a href="#" class="btn btn-outline-white banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-md-6 col-lg-12 -->
                        </div><!-- End .row row-sm -->
                    </div><!-- End .intro-banners -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->

            <div class="mb-6"></div><!-- End .mb-6 -->

            <div class="owl-carousel owl-simple" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": false,
                    "margin": 30,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        }
                    }
                }'>
                <a href="#" class="brand">
                    <img src="user/assets/images/brands/1.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="user/assets/images/brands/2.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="user/assets/images/brands/3.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="user/assets/images/brands/4.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="user/assets/images/brands/5.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="user/assets/images/brands/6.png" alt="Brand Name">
                </a>
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .bg-lighter -->

    <div class="mb-5"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="heading text-center mb-6">
            <h2 class="title">All Products</h2>
            <span>All product is ready in here</span>
        </div>

        <div class="products mb-10">
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-11 mt-v3 text-center">
                            <figure class="product-media">
                                <a href="{{ url('product/' . $product->slug) }}">
                                    <img src="../admin/assets/images/{{ $product->photos }}" alt="Product image" class="product-image">
                                </a>
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title">
                                    <a href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    <strong>IDR. {{ number_format($product->price, 2, ',', '.') }}</strong>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div>
                @endforeach
            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->

</main><!-- End .main -->

@if (session('alert-success'))
    <script>alert("{{ session('alert-success') }}")</script>
@elseif (session('alert-failed'))
    <script>alert("{{ session('alert-failed') }}")</script>
@endif

@endsection
