<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Transactions</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('user/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('user/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('user/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('user/assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('user/assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('user/assets/images/icons/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('user/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    @include('includes.style')
</head>

<body>
    <div class="page-wrapper">
        <main class="main mt-15">
            <div class="text-center">
                <div class="container">
                    <h1 class="error-title">Success</h1><!-- End .error-title -->
                    <p>Thank you for your transactions. Come back again</p>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary-2 btn-minwidth-lg mt-3">
                        <span>BACK TO HOMEPAGE</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .container -->
            </div><!-- End .error-content text-center -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->

    @include('includes.script')
</body>
</html>
