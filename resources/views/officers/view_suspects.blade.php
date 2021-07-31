<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <title>Landing Page</title>
</head>
<body>
<body>
    
    <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
                   <h4>View Suspects</h4><hr>
                   <table class="table table-hover">
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
                               <th>Edit</th>
                               <th>
                                   <a href="" class="btn btn-warning"></a>
                               </th>
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
                               <td>{{ $suspect->created_at}}</td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>     
            </div>
         </div>
    </div>
</body>
    
</body>
</html>