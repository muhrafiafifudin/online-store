<header class="header">

<div class="header-middle sticky-header">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>

            <a href="index.html" class="logo">
                <img src="user/assets/images/logo.png" alt="Molla Logo" width="105" height="25">
            </a>

            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/shop') }}">Shop</a>
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

        <div class="header-right">
            <div class="header-search">
                <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                <form action="#" method="get">
                    <div class="header-search-wrapper">
                        <label for="q" class="sr-only">Search</label>
                        <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->

            <div class="sign-up">
                <button type="submit" class="btn btn-outline-primary-2 ml-4">
                    <span>SIGN UP</span>
                </button>
            </div>
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->
</header><!-- End .header -->