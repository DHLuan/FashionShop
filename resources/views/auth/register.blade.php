@extends('layouts.app')
@section('title')
    Register
@endsection
@section('content')
    <div class="w3layoutscontaineragileits">
            <h1 class="card">
                <h1>{{ __('Register') }}</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-sub-w3ls">
                            <label for="name" class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input placeholder="User Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="icon-agile">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-sub-w3ls">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div class="icon-agile">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-sub-w3ls">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="icon-agile">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-sub-w3ls">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Confirm Password') }}</label>
                            <div class="icon-agile">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="submit-w3l">
                            <input type="submit" value="{{ __('Register') }}">
                        </div>
                    </form>
                </div>
            </div>
    </div>

@endsection
