<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <title>Ocs Landing Page</title>
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
                            <li><a href="{{ route('ocs_landing_page') }}"><span>Home</span></a></li>
                            <li><a href="{{ route('book_suspect') }}"><span>Book Suspect</span></a></li>
                            <li><a href="{{ route('view_suspect') }}"><span>View Suspects</span></a></li>
                            <li><a href="{{ route('create_officer') }}"><span>View my Profile</span></a></li>
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

    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h2 class="display-5 fw-bold">The National Government Of Kenya</h2>
                    <img src="/images/logo.png" alt="Kenyan Logo">
                    <p class="fs-4">The National Police Force in conjuction with The Judiciary</p>
                </div>
            </div>
        </div>
    </header>

    <section class="pt-4">
        <div class="container px-lg-5">
            <div class="row gx-lg-5">
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-bootstrap"></i></div>
                                <h2 class="fs-4 fw-bold">Create new Officer</h2>
                                <a class="btn btn-primary btn-lg" href="create_officer">Create Officer </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-card-heading"></i></div>
                                <h2 class="fs-4 fw-bold">View Officer Records</h2>
                                <a class="btn btn-primary btn-lg" href="view_officer">View</a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>

    <!--<footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy;</p></div>
    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

<!--
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



-->