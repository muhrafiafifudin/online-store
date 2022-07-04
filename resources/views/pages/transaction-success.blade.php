<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diva Metal Mandiri</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('user/assets/images/icons/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

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
