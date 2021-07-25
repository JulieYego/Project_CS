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
                   <h4>Landing Page</h4><hr>
                   <table class="table table-hover">
                      <thead>
                        <th>Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th></th>
                      </thead>
                      <tbody>
                         <tr>
                            <td>{{ $LoggedUserInfo['o_number'] }}</td>
                            <td>{{ $LoggedUserInfo['o_fName'] }}</td>
                            <td>{{ $LoggedUserInfo['o_lName'] }}</td>
                            <td>{{ $LoggedUserInfo['o_email'] }}</td>
                            <td>{{ $LoggedUserInfo['o_phone'] }}</td>
                            <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                         </tr>
                      </tbody>
                   </table>           
            </div>
         </div>
    </div>
</body>
    
</body>
</html>