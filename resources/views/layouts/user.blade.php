<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kishan Suvidha</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
   /* Dropdown menu background color */
 
.dropdown-menu {
  background-color: #2e7d32; /* or any dark green that fits your theme */
}

/* Dropdown items text color */
.dropdown-menu .dropdown-item {
  color: white; /* Make text visible on dark background */
}

/* Optional: Add a hover effect for better UI */
.dropdown-menu .dropdown-item:hover {
  background-color: #1b5e20;
  color: #fff;
}

.nav-category-bar a:hover,
.nav-category-bar .dropdown-toggle:hover {
  border-bottom: 2px solid white;
  color: white !important;
}


 
    /* .nav-category-bar {
      background-color: #206d37;
    } */
    .nav-category-bar a {
      color: white !important;
      font-weight: 600;
      margin-right: 15px;
    }
    .cart-icon {
      position: relative;
    }
    .cart-count {
      position: absolute;
      top: -8px;
      right: -10px;
      background-color: green;
      color: white;
      font-size: 10px;
      border-radius: 50%;
      padding: 2px 5px;
    }
    .search-input {
      width: 100%;
      max-width: 600px;
    }
    .user-dropdown {
  position: relative;
}
.user-dropdown .dropdown-menu {
  display: none;
  position: absolute;
  right: 0;
  top: 100%;
  min-width: 160px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  border-radius: 6px;
  z-index: 1000;
}
.user-dropdown:hover .dropdown-menu {
  display: block;
}



  </style>
</head>
<body>

<!-- Top Header -->
<nav class="navbar navbar-expand-lg bg-white py-3">
  <div class="container-fluid px-4">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ asset('img/login-image.jpg') }}" alt="Logo" style="height:40px;">
      <span class="ms-2 fw-bold fs-4 text-success">Kishan Suvidha</span>
    </a>

    <!-- Search bar -->
    <form class="d-flex me-3 flex-grow-1" style="max-width: 600px;">
  <input class="form-control me-2 search-input" type="search" placeholder="Search for products">
  <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
</form>


    <!-- Icons -->
    <div class="d-flex align-items-center gap-3">
  <div class="dropdown user-dropdown position-relative">
    <a href="#" class="text-dark" id="userDropdown" role="button">
      <i class="bi bi-person fs-3"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="#">My Profile</a></li>
      <li><a class="dropdown-item" href="#">My Orders</a></li>
      <li><a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a></li>
    </ul>
  </div>
  <div class="cart-icon me-2 position-relative">
    <a href="{{ route('cart.show') }}" class="text-dark">
      <i class="bi bi-bag fs-5"></i>
      <span class="cart-count">{{ $cartCount }}</span>
    </a>
  </div>
  <!-- <span class="fw-bold">₹0.00</span> -->
</div>

    </div>
</nav>

<!-- Navigation Categories -->
<!-- Navigation Categories -->
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container justify-content-center">
    <div class="nav-category-bar py-2">
      <div class="container-fluid px-4 d-flex flex-wrap">

        <a href="{{ route('account.dasboard') }}">HOME</a>
        <a href="#">OFFERS</a>

        @foreach($categories as $category)
          @if($category->subcategories->count() > 0)
            <div class="dropdown">
              <a class="dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                {{ strtoupper($category->name) }}
              </a>
              <ul class="dropdown-menu">
                @foreach($category->subcategories as $subcategory)
                  <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a></li>
                @endforeach
              </ul>
            </div>
          @else
            <a href="#">{{ strtoupper($category->name) }}</a>
          @endif
        @endforeach

      </div>
    </div>
  </div>
</nav>


<!-- Main Blade Content Here -->
<div class="main-content side-content pt-0">
  <div class="main-container container-fluid">
    <div class="inner-body">
      @yield('content')
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-3">
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #45526e"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer
              content. Lorem ipsum dolor sit amet, consectetur adipisicing
              elit.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
            <p>
              <a class="text-white">MDBootstrap</a>
            </p>
            <p>
              <a class="text-white">MDWordPress</a>
            </p>
            <p>
              <a class="text-white">BrandFlow</a>
            </p>
            <p>
              <a class="text-white">Bootstrap Angular</a>
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Useful links
            </h6>
            <p>
              <a class="text-white">Your Account</a>
            </p>
            <p>
              <a class="text-white">Become an Affiliate</a>
            </p>
            <p>
              <a class="text-white">Shipping Rates</a>
            </p>
            <p>
              <a class="text-white">Help</a>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
            <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div class="p-3">
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/"
                 >MDBootstrap.com</a
                >
            </div>
            <!-- Copyright -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- Facebook -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-facebook-f"></i
              ></a>

            <!-- Twitter -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-twitter"></i
              ></a>

            <!-- Google -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-google"></i
              ></a>

            <!-- Instagram -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-instagram"></i
              ></a>
          </div>
          <!-- Grid column -->
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->
</div>
<!-- End of .container -->
</html>
