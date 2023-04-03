@extends('layouts.app')

@section('content')

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

{{--        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url({{asset('user/assets/images/backgrounds/login-bg.jpg')}})">--}}
{{--            <div class="container">--}}
{{--                <div class="form-box">--}}
{{--                    <div class="form-tab">--}}
{{--                        <ul class="nav nav-pills nav-fill" role="tablist">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="tab-content">--}}
{{--                            <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">--}}
{{--                                <form method="POST" action="{{ route('login') }}">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="singin-email">{{ __('Email Address') }}</label>--}}
{{--                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control" id="singin-email-2" name="singin-email" required>--}}
{{--                                        @error('email')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div><!-- End .form-group -->--}}

{{--                                    <div class="form-group">--}}
{{--                                        <label for="singin-password-2">Password *</label>--}}
{{--                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                        @error('password')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div><!-- End .form-group -->--}}

{{--                                    <div class="form-footer">--}}
{{--                                        <button type="submit" class="btn btn-outline-primary-2">--}}
{{--                                            <span>{{ __('Login') }}</span>--}}
{{--                                            <i class="icon-long-arrow-right"></i>--}}
{{--                                        </button>--}}

{{--                                        <div class="custom-control custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">--}}
{{--                                            <label class="custom-control-label" for="signin-remember-2">Remember Me</label>--}}
{{--                                        </div><!-- End .custom-checkbox -->--}}

{{--                                        <a href="#" class="forgot-link">Forgot Your Password?</a>--}}
{{--                                    </div><!-- End .form-footer -->--}}
{{--                                </form>--}}
{{--                                <div class="form-choice">--}}
{{--                                    <p class="text-center">or sign in with</p>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <a href="#" class="btn btn-login btn-g">--}}
{{--                                                <i class="icon-google"></i>--}}
{{--                                                Login With Google--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .col-6 -->--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <a href="#" class="btn btn-login btn-f">--}}
{{--                                                <i class="icon-facebook-f"></i>--}}
{{--                                                Login With Facebook--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .col-6 -->--}}
{{--                                    </div><!-- End .row -->--}}
{{--                                </div><!-- End .form-choice -->--}}
{{--                            </div><!-- .End .tab-pane -->--}}
{{--                            <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">--}}
{{--                                <form action="#">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="register-email-2">Your email address *</label>--}}
{{--                                        <input type="email" class="form-control" id="register-email-2" name="register-email" required>--}}
{{--                                    </div><!-- End .form-group -->--}}

{{--                                    <div class="form-group">--}}
{{--                                        <label for="register-password-2">Password *</label>--}}
{{--                                        <input type="password" class="form-control" id="register-password-2" name="register-password" required>--}}
{{--                                    </div><!-- End .form-group -->--}}

{{--                                    <div class="form-footer">--}}
{{--                                        <button type="submit" class="btn btn-outline-primary-2">--}}
{{--                                            <span>SIGN UP</span>--}}
{{--                                            <i class="icon-long-arrow-right"></i>--}}
{{--                                        </button>--}}

{{--                                        <div class="custom-control custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>--}}
{{--                                            <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>--}}
{{--                                        </div><!-- End .custom-checkbox -->--}}
{{--                                    </div><!-- End .form-footer -->--}}
{{--                                </form>--}}
{{--                                <div class="form-choice">--}}
{{--                                    <p class="text-center">or sign in with</p>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <a href="#" class="btn btn-login btn-g">--}}
{{--                                                <i class="icon-google"></i>--}}
{{--                                                Login With Google--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .col-6 -->--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <a href="#" class="btn btn-login  btn-f">--}}
{{--                                                <i class="icon-facebook-f"></i>--}}
{{--                                                Login With Facebook--}}
{{--                                            </a>--}}
{{--                                        </div><!-- End .col-6 -->--}}
{{--                                    </div><!-- End .row -->--}}
{{--                                </div><!-- End .form-choice -->--}}
{{--                            </div><!-- .End .tab-pane -->--}}
{{--                        </div><!-- End .tab-content -->--}}
{{--                    </div><!-- End .form-tab -->--}}
{{--                </div><!-- End .form-box -->--}}
{{--            </div><!-- End .container -->--}}
{{--        </div><!-- End .login-page section-bg -->--}}
    </main><!-- End .main -->


    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card col-md-12 row mb-6">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3 mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
