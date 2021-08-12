@extends('layouts.app')

@section('content')

<style>
    .hidden {
        display: inline-block;
        vertical-align: middle;
    }
    .but {
        display: inline-block;
        vertical-align: middle;
        left: -15px;
        position: relative;
        top:-40px;
    }
    .sibs {
        overflow: hidden;
        padding: 15px;
    }
    .login{
        position: relative;
        top:-80px;
        margin-left: 190px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="width: 32rem; height:45rem">
                <div class="card-header">
                    <h3>{{ __('Create an Officer') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="first_name" class="">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="last_name" class="">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-wrapper">
                            <label for="o_number">{{ __('Officer Number') }}</label>
                            <input id="o_number" type="text" style="width: 450px;" class="form-control @error('o_number') is-invalid @enderror" name="o_number" value="{{ old('o_number') }}" required autocomplete="o_number" autofocus>
                                @error('o_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="email" class="">{{ __('Email Address') }}</label>
                            <input id="email" type="email" style="width: 450px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-wrapper" style="margin-left: 20px;">
                            <label for="gender" class="">{{ __('Gender') }}</label>
                                <select name="gender" style="width: 450px;" id="gender" class="form-control" required>
                                    <option value="Select Gender">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-wrapper"  style="margin-left: 20px;">
                                <label for="password" class="">{{ __('Password') }}</label> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> 

                        <div class="sibs">
                            <div class="hidden">
                                    <input type="hidden" id="role_id" name="role_id" value="1" style="width: 1px;" class="">
                                        @if ($errors->has('role_id'))
                                            <div class="error">{{ $errors->first('role_id') }}</div>
                                        @endif
                            </div>
                            <div class="but">
                                <button type="submit" style="margin-left:150px"class="hidden">
                                    {{ __('Save') }}
                                </button>

                            </div>
                        </div>

                        <a class="link login" href="{{ route('login') }}">
                            {{ __('') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection