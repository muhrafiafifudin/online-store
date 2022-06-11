<header class="header">

<div class="header-middle sticky-header">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>

            <a href="index.html" class="logo">
                <img src="{{ asset('user/assets/images/logo.png') }}" alt="Molla Logo" width="105" height="25">
            </a>

            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('product.index') }}">Product</a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('blog') }}">Blog</a>
                    </li> --}}
                    <li>
                        <a href="{{ url('about-us') }}">About Us</a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('contact-us') }}">Contact Us</a>
                    </li> --}}
                </ul><!-- End .menu -->
            </nav><!-- End .main-nav -->
        </div><!-- End .header-left -->

        
            

        @if (Route::has('login'))
            <div class="header-right">
                @auth
                <div class="dropdown cart-dropdown">
                    <a href="{{ url('cart') }}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">2</span>
                    </a>
                </div><!-- End .cart-dropdown -->

                <div class="dropdown compare-dropdown user-login">
                    <a href="#" class="dropdown-toggle name-user-login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                        Hi, {{ Auth::user()->name }}<i class="icon-user"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            <li class="compare-product">
                                <h4 class="compare-product-title"><a href="product.html">Dashboard</a></h4>
                            </li>
                            <li class="compare-product">
                                <h4 class="compare-product-title"><a href="product.html">Setting</a></h4>
                            </li>
                        </ul>

                        <div class="compare-actions">
                            <form method="post" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-outline-primary-2"><span>Logout</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .compare-dropdown -->
                @else
                <div class="sign-up">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary-2 ml-4">SIGN IN</a>
                </div>
                @endauth
            </div><!-- End .header-right -->
        @endif
        
    </div><!-- End .container -->
</div><!-- End .header-middle -->
</header><!-- End .header -->