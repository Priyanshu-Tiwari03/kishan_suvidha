<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Agriculture Dashboard</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <style>
          #eventCarousel img {
              width: 100%;
              height: 50vh;
              object-fit: cover;
          }
          #eventCarousel {
              width: 100%;
              height: 50vh;
          }
          .feature-card {
              text-align: center;
              padding: 20px;
              border-radius: 10px;
              box-shadow: 0 0 10px rgba(0,0,0,0.1);
          }
      </style>
   </head>
   <body class="bg-light">
        <nav class="navbar navbar-expand-md bg-success shadow-lg text-white">
            <div class="container">
                <a class="navbar-brand text-white" href="#">
                   <strong>Agriculture Dashboard</strong>
                </a>
                <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5.5 0 0 1 .5-.5h10a.5.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu border-0 shadow" aria-labelledby="accountDropdown">                          
                                <li>
                                    <a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        
        <!-- Image Slider -->
        <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/slider1.jpg') }}" class="d-block w-100" alt="Event 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider2.jpg') }}" class="d-block w-100" alt="Event 2">
                </div>
                <div class="carousel-item">
                    <img src="event3.jpg" class="d-block w-100" alt="Event 3">
                </div>
                <div class="carousel-item">
                    <img src="event4.jpg" class="d-block w-100" alt="Event 4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card bg-success text-white">
                        <h4>Crop Monitoring</h4>
                        <p>Track your crops with real-time insights.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card bg-warning text-white">
                        <h4>Weather Forecast</h4>
                        <p>Get accurate weather updates for farming.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card bg-info text-white">
                        <h4>Market Prices</h4>
                        <p>Stay updated on current market prices.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
