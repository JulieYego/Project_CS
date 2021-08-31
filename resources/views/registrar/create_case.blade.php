@extends('layouts.app')

@section('content')

<style>
    .save{
        position: relative;
        top:-0px;
        margin-left: 50px;
    }
    img {
    height: 80px;
    }
</style>

<header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center"> 
                <div class="col-11 col-xl-2">
                    <img src="/images/logo.png" class="navbar-brand" alt="Kenyan Logo">	
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav ml-auto d-none d-lg-block justify-content-end">
                            <li><a href="{{ route('registrar_landing_page') }}"><span>Home</span></a></li>
                            <li><a href="{{ route('schedule_case') }}"><span>Schedule Case</span></a></li>
                            <li><a href="{{ route('view_cases') }}"><span>View Cases</span></a></li>
                            <li><a href="{{ route('track_case') }}"><span>Track Cases</span></a></li>
                            <li><a href="#"><span>View my Profile</span></a></li>
                            <li class="active">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-white">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="width: 32rem; height:61rem">
                <div class="card-header">
                    <h3>{{ __('New Case') }}</h3>
                </div>

                @if(Session::get('success'))
                    <div class ="alert alert-success">
                            {{Session::get('success')}}
                    </div>
                @endif

                @if(Session::get('fail'))
                    <div class ="alert alert-danger">
                            {{Session::get('fail')}}
                    </div>
                @endif    

                <div class="card-body">
                    <form action="add"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-wrapper">
                            <label for="c_number" class="">{{ __('Case Number') }}</label>
                            <input id="c_number" type="text" class="form-control @error('c_number') is-invalid @enderror" name="c_number" value="{{ old('c_number') }}" required autocomplete="c_number" autofocus>
                            @error('c_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> 

                        <div class="form-wrapper">
                            <label for="suspect_name" class="">{{ __('Suspect Name') }}</label>
                            <input id="suspect_name" type="text" class="form-control @error('suspect_name') is-invalid @enderror" name="suspect_name" value="{{ old('suspect_name') }}" required autocomplete="suspect_name" autofocus>
                            @error('suspect_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> 

                        <div class="form-wrapper">
                            <label for="case_judge" class="">{{ __('Case Judge') }}</label>
                            <input id="case_judge" type="text" class="form-control @error('case_judge') is-invalid @enderror" name="case_judge" value="{{ old('case_judge') }}" required autocomplete="case_judge" autofocus>
                            @error('case_judge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="courtroom">{{ __('Courtroom') }}</label>
                            <input id="courtroom" type="text" style="width: 450px;" class="form-control @error('courtroom') is-invalid @enderror" name="courtroom" value="{{ old('courtroom') }}" required autocomplete="courtroom" autofocus>
                                @error('courtroom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="date" class="">{{ __('Case date') }}</label>
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="time" class="">{{ __('Case time') }}</label>
                                <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-wrapper">
                            <label for="type" class="">{{ __('Case type') }}</label>
                                <select name="type" style="width: 450px;" id="activity" class="form-control" required>
                                    <option value="Select Case Type">Select Case Type</option>
                                    <option value="civil">Civil</option>
                                    <option value="criminal">Criminal</option>
                                    <option value="claims">Claims</option>
                                    <option value="appeals">Appeals</option>
                                    <option value="family">Family</option>
                                </select>
                                @error('activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="case_description">{{ __('Case Description') }}</label>
                            <textarea class="form-control"  type="text" style="width: 450px;" class="form-control @error('case_description') is-invalid @enderror" name="case_description" value="{{ old('case_description') }}" required autocomplete="case_description" autofocus></textarea>
                                @error('case_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="plea">{{ __('Case plea') }}</label>
                            <select name="plea" style="width: 450px;" id="plea" class="form-control" required>
                                    <option value="Select Case Plea">Select Case Plea</option>
                                    <option value="Guilty">Guilty</option>
                                    <option value="Not guilty">Not guilty</option>
                            </select>                               
                                @error('plea')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="outcome">{{ __('Case Outcome') }}</label>
                            <textarea class="form-control"  type="text" style="width: 450px;" class="form-control @error('outcome') is-invalid @enderror" name="outcome" value="{{ old('outcome') }}" required autocomplete="outcome" autofocus></textarea>
                                @error('outcome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                                         
                        <div class="form-wrapper">
                            <label for="case_notes">{{ __('Case Notes') }}</label>
                            <textarea class="form-control"  type="text" style="width: 450px;" class="form-control @error('case_notes') is-invalid @enderror" name="case_notes" value="{{ old('case_notes') }}" required autocomplete="case_notes" autofocus></textarea>
                                @error('case_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="hidden">
                            <input type="hidden" id="activity" name="activity" value="Mention" style="width: 1px;" class="">
                                @if ($errors->has('activity'))
                                    <div class="error">{{ $errors->first('activity') }}</div>
                                @endif
                        </div>

                            <!--<div class="back">
                                <button onclick="back()">{{ __('BACK') }}</button>
                            </div>-->
                            <div class="save">
                                <button type="submit" >
                                    {{ __('SAVE') }}
                                </button>    
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection