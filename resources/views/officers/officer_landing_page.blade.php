<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />
    <title>Officer Landing Page</title>
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
    <header class="header-area overlay">
        <nav class="navbar navbar-expand-md navbar-dark">
		    <div class="container">
                <img src="/images/logo.png" class="navbar-brand" alt="Kenyan Logo">	
                <a class="navbar-brand" href="#">Welcome Officer {{ Auth::user()->o_number }}</a>
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
                                <a href="{{ route('officer_landing_page') }}" class="nav-item nav-link ">View profile</a>
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
                                <h2 class="fs-4 fw-bold">Book new arrested person</h2>
                                <a class="btn btn-primary btn-lg" href="book_suspect">Book suspect </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-card-heading"></i></div>
                                <h2 class="fs-4 fw-bold">View Suspect Records</h2>
                                <a class="btn btn-primary btn-lg" href="view_suspect">View</a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; N&J</p></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>