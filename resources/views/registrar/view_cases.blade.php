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
    <title>View Cases</title>
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
         <div class="row">
            <div class="col-md-offset-3">
                   <hr>
                   <table class="table table-dark table-striped table-hover" id="tbl_suspects">
                       <thead>
                           <tr>
                               <th>Case Number</th>
                               <th>Suspect Name</th>
                               <th>Courtroom</th>
                               <th>Date</th>
                               <th>Time</th>
                               <th>Activity</th>
                               <th>Case Outcome</th>
                               <th>Case Type</th>
                               <th>Case Description</th>
                               <th>Case Notes</th>
                               <th>Plea Taken</th>
                               <th>Case Status</th>
                               <th>Update</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($Cases as $Case)
                           <tr>
                               <td>{{ $Case->id}}</td>
                               <td>{{ $Case->suspect_name}}</td>
                               <td>{{ $Case->courtroom}}</td>
                               <td>{{ $Case->date}}</td>
                               <td>{{ $Case->time}}</td>
                               <td>{{ $Case->activity}}</td>
                               <td>{{ $Case->outcome}}</td>
                               <td>{{ $Case->type}}</td>
                               <td>{{ $Case->case_description}}</td>
                               <td>{{ $Case->case_notes}}</td>
                               <td>{{ $Case->plea}}</td>
                               <td>{{ $Case->case_status}}</td>
                               <td>
                                   <a href="#" class="btn btn-outline-warning">{{ __('Edit') }}</a>
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
</body>
    
</html>