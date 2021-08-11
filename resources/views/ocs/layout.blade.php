<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="/css/styles.css" rel="stylesheet" />
    <title>Landing Page</title>
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
<!--<header class="header-area overlay">
        <nav class="navbar navbar-expand-md navbar-dark">
		    <div class="container">
                <img src="/images/logo.png" class="navbar-brand" alt="Kenyan Logo">	
                <a class="navbar-brand" href="#">Welcome Officer</a>
			        <div id="main-nav" class="collapse navbar-collapse">
				        <ul class="navbar-nav ml-auto">
					        <li>
                                <a href="{{ route('ocs_landing_page') }}" class="nav-item nav-link active">Home</a>
                            </li>
					        <li>
                                <a href="{{ route('view_officer') }}" class="nav-item nav-link">View Officers</a>
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
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
                   <h4>OCS Page</h4><hr>
                             
            </div>
         </div>
    </div>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>



