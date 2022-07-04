<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield('title') </title>
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
        @include('includes.header')

        @yield('content')

        @include('includes.footer')
    </div><!-- End .page-wrapper -->

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @stack('scripts')

    @include('includes.script')
</body>
</html>
