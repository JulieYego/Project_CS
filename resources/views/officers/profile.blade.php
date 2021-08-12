<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <link href="/css/profile.css" rel="stylesheet" />
    <link href="/css/form.css" rel="stylesheet" />
    <title>Profile</title>
</head>
<style>
    h6,p{
        color:white;
    }
    h4{
        color:white;
    }

    img {
    height: 80px;
}
</style>
<body>
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center"> 
                <div class="col-11 col-xl-2">
                    <img src="/images/logo.png" class="navbar-brand" alt="Kenyan Logo">	
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav ml-auto d-none d-lg-block justify-content-end">
                            <li><a href="{{ route('officer_landing_page') }}"><span>Home</span></a></li>
                            <li><a href="{{ route('book_suspect') }}"><span>Book Suspect</span></a></li>
                            <li><a href="{{ route('view_suspect') }}"><span>View Suspects</span></a></li>
                            <li><a href="{{ route('view_profile') }}"><span>View my Profile</span></a></li>
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
    
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h6 class="f-w-600">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->first_name }}} {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->last_name }}} </h6>
                                    <p>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->o_number }}}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Officer Number</p>
                                            <h6 class="text-muted f-w-400">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->o_number }}}</h6>
                                        </div>
                                        <div class="col-sm-8">
                                            <p class="m-b-10 f-w-600">First Name</p>
                                            <h6 class="text-muted f-w-400">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->first_name }}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Last Name</p>
                                            <h6 class="text-muted f-w-400">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->last_name }}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email Address</p>
                                            <h6 class="text-muted f-w-400">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Gender</p>
                                            <h6 class="text-muted f-w-400">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->gender }}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                        <a href="{{ route('password.request') }}" class="btn btn-outline-warning">Change Password</a>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>