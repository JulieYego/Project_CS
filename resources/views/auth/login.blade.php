@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center wrapper">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Login to your Account') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-wrapper">
                            <label for="email" class="col-md-7 col-form-label text-md-right">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row check">
                            <div class="col-md-6 offset-md-1 rem">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="link" href="{{ route('password.request') }}">
                                {{ __('Forgot your Password?') }}
                            </a>
                        @endif

                        <a class="link" style="margin-left: 60px;" href="{{ route('register') }}">
                                {{ __('Create an Account') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
