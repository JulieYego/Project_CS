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
                            <li><a href="{{ route('ocs_landing_page') }}"><span>Home</span></a></li>
                            <li><a href="{{ route('create_officer') }}"><span>Add Officers</span></a></li>
                            <li><a href="{{ route('view_officer') }}"><span>View Officers</span></a></li>
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
            <div class="card" style="width: 32rem; height:65rem">
                <div class="card-header">
                    <h3>{{ __('Schedule a Case') }}</h3>
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
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="suspect_name" class="">{{ __('Suspect Name') }}</label>
                                <input id="suspect_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="suspect_name" value="{{ old('suspect_name') }}" required autocomplete="suspect_name" autofocus>
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

                        <div class="form-wrapper">
                            <label for="time">{{ __('Time') }}</label>
                            <input id="time" type="text" style="width: 450px;" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="activity" class="">{{ __('Activity') }}</label>
                                <select name="activity" style="width: 450px;" id="activity" class="form-control" required>
                                    <option value="Select Case Activity">Select Case Activity</option>
                                    <option value="Mention">Mention</option>
                                    <option value="Hearing">Hearing</option>
                                    <option value="Ruling">Ruling</option>
                                </select>
                                @error('activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="outcome">{{ __('Outcome') }}</label>
                            <input id="outcome" type="text" style="width: 450px;" class="form-control @error('outcome') is-invalid @enderror" name="outcome" value="{{ old('outcome') }}" required autocomplete="outcome" autofocus>
                                @error('outcome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="type" class="">{{ __('Type') }}</label>
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
 
                        <div class="mb-3">
                            <label for="photo" class="form-label">Case Attachments</label>
                            <input class="form-control" type="file" name="photo" id="photo">
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
                            <label for="case_notes">{{ __('Case Notes') }}</label>
                            <textarea class="form-control"  type="text" style="width: 450px;" class="form-control @error('case_notes') is-invalid @enderror" name="case_notes" value="{{ old('case_notes') }}" required autocomplete="case_notes" autofocus></textarea>
                                @error('case_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="sibs">
                            <!--<div class="back">
                                <button onclick="back()">{{ __('BACK') }}</button>
                            </div>-->
                            <div class="save">
                                <button type="submit" >
                                    {{ __('SAVE') }}
                                </button>    
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection