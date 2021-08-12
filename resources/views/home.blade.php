@extends('layouts.app')

@section('content')
<header class="header-area overlay">
        <nav class="navbar navbar-expand-md navbar-dark">
		    <div class="container">
                <img src="/images/logo.png" class="navbar-brand" alt="Kenyan Logo">	
                <a class="navbar-brand" href="#">Welcome Ocs {{ Auth::user()->o_number }}</a>
			        <div id="main-nav" class="collapse navbar-collapse">
				        <ul class="navbar-nav ml-auto">
					        <li>
                                <a href="{{ route('officer_landing_page') }}" class="nav-item nav-link active">Home</a>
                            </li>
					        <li>
                                <a href="{{ route('view_suspect') }}" class="nav-item nav-link">View suspects</a>
                            </li>
					        <li>
						        <a href="{{ route('book_suspect') }}" class="nav-item nav-link">Book suspects</a>
					        </li>
					        <li>
                                <a href="{{ route('view_profile') }}" class="nav-item nav-link ">View profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
				        </ul>
			        </div>
		    </div>
	    </nav>
    </header>

    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
