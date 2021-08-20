<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <link href="/css/form.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <title>View Suspects</title>
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

<<<<<<< HEAD
    <header class="site-navbar" role="banner">
=======
<header class="site-navbar" role="banner">
>>>>>>> 106715e40abb7e237a6e8a6aa3554998b44d5d20
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
    
    <div class="container">
         <div class="row">
            <div class="col-md-offset-3">
                   <hr>
                   <table class="table table-dark table-striped table-hover" id="tbl_suspects">
                       <thead>
                           <tr>
                               <th>Photo</th>
                               <th>First Name</th>
                               <th>Last Name</th>
                               <th>ID Number</th>
                               <th>Gender</th>
                               <th scope="col">Arresting Officer</th>
                               <th>Reason of Arrest</th>
                               <th>Place of Arrest</th>
                               <th>Time of Booking</th>
                               <th>To be presented to court before</th>
                               <th>Status</th>
                               <th>Update</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($suspects as $suspect)
                           <tr>
                               <td><img src="{{ asset('uploads/suspect/' . $suspect->photo) }}" width="100px" height="100px" alt="Photo"></td>
                               <td>{{ $suspect->first_name}}</td>
                               <td>{{ $suspect->last_name}}</td>
                               <td>{{ $suspect->IDnumber}}</td>
                               <td>{{ $suspect->gender}}</td>
                               <td>{{ $suspect->officer}}</td>
                               <td>{{ $suspect->crime}}</td>
                               <td>{{ $suspect->place}}</td>
                               <td>{{ \Carbon\Carbon::parse($suspect->created_at)->toDayDateTimeString() }}</td>
                               <td>{{ \Carbon\Carbon::parse($suspect->present)->toDayDateTimeString() }}</td>
                               <td>{{ $suspect->status}}</td>
                               <td>
                                   <a class="btn btn-outline-warning" href="#" data-toggle="modal" data-target="#ModalEdit">{{ __('Edit') }}</a>
                               </td>                               
                           </tr>
                           @endforeach
                       </tbody>
                   </table>     
            </div>
         </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        $(document).ready( function () {
            $('#tbl_suspects').DataTable();
        });
    </script>
</body>
    
</html>