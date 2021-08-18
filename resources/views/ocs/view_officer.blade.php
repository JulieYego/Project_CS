<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <link href="/css/form.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />
    <title>View Officers</title>
</head>

<style>
    h4{
        color:white;
    }

    img {
    height: 80px;
}
</style>
<body>
<div class ="container-fluid">
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
                            <li><a href="{{ route('create_officer') }}"><span>Add Officer</span></a></li>
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

        <form class="d-flex search" method="GET" action="{{ url('/search')}}" role="search">
            @csrf
            <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>

        
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3">
                    <hr>
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                
                                <th>Officer Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email Address</th>
                                <th>Gender</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($officers as $officer)
                            <tr>
                                <td>{{ $officer->o_number}}</td>
                                <td>{{ $officer->first_name}}</td>
                                <td>{{ $officer->last_name}}</td>
                                <td>{{ $officer->email}}</td>
                                <td>{{ $officer->gender}}</td>                              
                                <td>
                                    <!--take to update_officer and call function edit-->
                                    <a href="{{route('edit',$officer->id)}}"  class="btn btn-outline-warning">Edit</a>
                                </td>
                                <td>

                                    <!--Return id and delete using that link-->
                                    <a href="{{route('delete',$officer->id)}}" class ="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>     
                </div>
            </div>
                   
        </div>
    </div> 
  
</div>
</body>
    
</html>