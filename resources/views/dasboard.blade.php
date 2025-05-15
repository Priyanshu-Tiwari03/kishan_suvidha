
     
      @extends('layouts.user')
      @section('content')
    
 
   <div class="bg-light">
        <!-- <nav class="navbar navbar-expand-md bg-success shadow-lg text-white">
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
        </nav>  -->
        
        <!-- Image Slider -->
         <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/slider1.jpg') }}" class="d-block w-100" alt="Event 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider2.jpg') }}" class="d-block w-100" alt="Event 2">
                </div>
                <!-- <div class="carousel-item">
                    <img src="event3.jpg" class="d-block w-100" alt="Event 3">
                </div>
                <div class="carousel-item">
                    <img src="event4.jpg" class="d-block w-100" alt="Event 4">
                </div> -->
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
        <div class="container py-4">
        

   

    @foreach($groupedProducts as $categoryName => $products)
    <div class="container mt-5">
        <h3 class="mb-4">{{ $categoryName }}</h3>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            
            @foreach($products->take(4) as $product)
                <div class="col">
                    <a href="{{ route('product.detail', $product->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('uploads/product/'.$product->image) }}" class="card-img-top product-img" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                @php
                                    $words = explode(' ', $product->description);
                                    $shortDescription = implode(' ', array_slice($words, 0, 7));
                                @endphp
                                <p class="text-muted">
                                    {{ $shortDescription }}
                                    @if(count($words) > 7)
                                        ... <a href="{{ route('product.detail', $product->id) }}">Read more</a>
                                    @endif
                                </p>
                                @if($product->subcategory)
                                    <p class="text-muted">SubCategory:- {{ $product->subcategory->name }}</p>
                                @endif
                                <p class="text-success fw-bold">Price:- ₹{{ $product->price }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <!-- View All Card -->
            <div class="col">
                <a href="{{ route('category.products', ['category' => $categoryName]) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm text-center d-flex justify-content-center align-items-center bg-light">
                        <div class="card-body">
                            <h5 class="text-primary">View All</h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endforeach

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
        
      
        </div>   
        @endsection 

