<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <link href="/css/form.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

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

    <!-- Update modal  -->
<div class="modal fade mod" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Suspect</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="">
                            <form action="/update" method="post" id="updateForm">
                                @csrf
                                {{ method_field('PUT')}}
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
                                    <label for="officer">{{ __('Arresting Officer') }}</label>
                                    <input id="officer" type="text" style="width: 450px;" class="form-control @error('officer') is-invalid @enderror" name="officer" value="{{ old('officer') }}" required autocomplete="officer" autofocus>
                                        @error('officer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                                <div class="form-wrapper">
                                    <label for="crime">{{ __('Reason of Arrest') }}</label>
                                    <input id="crime" type="text" style="width: 450px;" class="form-control @error('crime') is-invalid @enderror" name="crime" value="{{ old('crime') }}" required autocomplete="crime" autofocus>
                                        @error('crime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                                <div class="form-wrapper">
                                    <label for="place">{{ __('Place of Arrest') }}</label>
                                    <input id="place" type="text" style="width: 450px;" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" required autocomplete="place" autofocus>
                                        @error('place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="status" class="">{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="Select Status">Select Status</option>
                                            <option value="">Not presented</option>
                                            <option value="">Presented</option>
                                            <option value="">Cash bail</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-wrapper">
                                        <label for="time_present" class="">{{ __('Time presented') }}</label>
                                        <input id="time_present" type="text" class="form-control @error('time_present') is-invalid @enderror" name="time_present" value="{{ old('time_present') }}" required autocomplete="time_present" autofocus>
                                            @error('time_present')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="modal-footer">
            <input type="hidden" name="id" id="id" value="" />
                <button type="button" class="" data-bs-dismiss="modal">Close</button>
                <button type="button" class="">Save</button>
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-dark table-striped table-hover data-table">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</body>
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('suspects') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'photo', name: 'photo',
            render:function(data,type,full,meta){
                return "<img src=\"uploads/suspect/" + data + "\" height=\"50\"/>";
            }},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'IDnumber', name: 'IDnumber'},
            {data: 'gender', name: 'gender'},
            {data: 'officer', name: 'officer'},
            {data: 'crime', name: 'crime'},
            {data: 'place', name: 'dddd'},
            {data: 'created_at.display', name: 'created_at'},
            {data: 'present.display', name: 'present'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
</html>
columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id'                 , name: 'id'},
            {data: 'suspect_name'       , name: 'suspect_name'},
            {data: 'courtroom'          , name: 'courtroom'},
            {data: 'date'               , name: 'date'},
            {data: 'time'               , name: 'time'},
            {data: 'activity'           , name: 'activity'},
            {data: 'outcome'            , name: 'outcome'},
            {data: 'type'               , name: 'type'},
            {data: 'case_description'   , name: 'case_description'},
            {data: 'case_notes'         , name: 'case_notes'},
            {data: 'plea'               , name: 'plea'},
            {data: 'case_status'        , name: 'status'},
            {data: 'action'             , name: 'action', orderable: false, searchable: false},
        ]
