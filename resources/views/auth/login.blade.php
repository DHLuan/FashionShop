@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="w3layoutscontaineragileits">
        <h2>{{ __('Login') }}</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email" class="col-md-4 col-form-label text-md-end" style="color: white;size: 55px">{{ __('Email Address') }}</label>
            <div>
                <input id="email" type="email" name="email" class=" @error('email') is-invalid @enderror" placeholder="EMAIL" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <label for="password" class="col-md-4 col-form-label text-md-end" style="color: white;size: 55px">{{ __('Password') }}</label>
            <div>
                <input id="password" type="password" name="password" class=" @error('password') is-invalid @enderror" placeholder="PASSWORD" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <ul class="agileinfotickwthree">
                <li>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember"><span></span>{{ __('Remember Me') }}</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </li>
            </ul>
            <div class="aitssendbuttonw3ls">
                <input type="submit" value="{{ __('Login') }}">
                <p> To register new account <span>→</span> <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }}</a></p>
                <div class="clear"></div>
            </div>
        </form>
    </div>

@endsection
