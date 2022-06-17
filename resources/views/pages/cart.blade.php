@extends('layouts.home')

@section('title')
    Cart
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    
    <div class="page-content">
        <div class="cart">
            <div class="container">
                @if ($cartItems->count() > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th class="column-cart">Product</th>
                                        <th class="column-cart">Price</th>
                                        <th class="column-cart">Quantity</th>
                                        <th class="column-cart">Total</th>
                                        <th class="column-cart"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $total = 0; $totalItem = 0; @endphp
                                    @foreach ($cartItems as $data)
                                        <tr class="product_data">
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="/admin/assets/images/{{ $data->products->photos }}" alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{ $data->products->name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">IDR. {{ number_format($data->products->price, 2, ',', '.') }}</td>
                                            <td class="quantity-col">
                                                <input type="hidden" class="prod_id" value="{{ $data->products_id }}">
                                                
                                                @if ($data->products->qty >= $data->products_qty)
                                                    <div class="cart-product-quantity">
                                                        <input type="number" class="form-control" value="{{ $data->products_qty }}" min="1" max="10" step="1" data-decimals="0" required>
                                                    </div><!-- End .cart-product-quantity -->

                                                    @php 
                                                        $totalItem = $data->products->price * $data->products_qty;
                                                        $total += $data->products->price * $data->products_qty; 
                                                    @endphp
                                                @else
                                                    <span class="product-label-detail label-out">Out of Stock</span>
                                                    
                                                    @php $totalItem = $data->products->price * 0; @endphp
                                                @endif
                                            </td>
                                            <td class="total-col">IDR. {{ number_format($totalItem, 2, ',', '.') }}</td>
                                            <td class="remove-col">
                                                <button class="btn-remove delete-cart-item">
                                                <i class="icon-close"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-subtotal">
                                    <button class="btn btn-outline-dark-2-cart">SUBTOTAL : &nbsp; <span class="idr-subtotal">IDR. {{ number_format($total, 2, ',', '.') }}</span></button>
                                </div><!-- End .cart-discount -->

                                <a href="{{ route('product.index') }}" class="btn btn-outline-dark-2"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                                <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2"><span>PROCEED TO ORDER</span></a>
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                @else
                    <div class="reply text-center">
                        <h3 class="title">Cart is Empty</h3><!-- End .title -->
                        <p class="title-desc">Please, continue shopping and come back here</p>
                        <a href="{{ route('product.index') }}" class="btn btn-outline-dark-2 mt-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </div><!-- End .reply -->
                @endif
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection