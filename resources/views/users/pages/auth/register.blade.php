@extends('users.layouts.app')

@section('title')
    Login / Register
@endsection

@section('content')
<main class="main">
    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('user/assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="{{ route('login') }}" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="{{ route('register') }}" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form method="post" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Your name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="email">Your email address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm password *</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
@endsection
