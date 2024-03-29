@extends('users.layouts.app')

@section('title')
    Diva Metal Mandiri | Product
@endsection

@section('content')
<main class="main">
<div class="page-header text-center" style="background-image: url('user/assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Product<span>Pages</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="toolbox">
            <div class="toolbox-left">
                <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
            </div><!-- End .toolbox-left -->

            <div class="toolbox-center">
                <div class="toolbox-info">
                    Showing <span>12 of 56</span> Products
                </div><!-- End .toolbox-info -->
            </div><!-- End .toolbox-center -->

            <div class="toolbox-right">
                <div class="toolbox-sort">
                    <label for="sortby">Sort by:</label>
                    <div class="select-custom">
                        <select name="sortby" id="sortby" class="form-control">
                            <option value="popularity" selected="selected">Most Popular</option>
                            <option value="rating">Most Rated</option>
                            <option value="date">Date</option>
                        </select>
                    </div>
                </div><!-- End .toolbox-sort -->
            </div><!-- End .toolbox-right -->
        </div><!-- End .toolbox -->

        <div class="products">
            <div class="row">

                @foreach ($products as $data)
                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="product">
                        <figure class="product-media">
                            <a href="{{ url('product/' . $data->slug) }}">
                                <img src="../admin/assets/images/{{ $data->photos }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>ADD TO CART</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ url('product/' . $data->slug) }}">{{ $data->category->category }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{ url('product/' . $data->slug) }}">{{ $data->name }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                IDR. {{ number_format($data->price, 2, ',', '.') }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                @endforeach
            </div><!-- End .row -->
        </div><!-- End .products -->

    </div><!-- End .container -->
</div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
