<!-- <!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Dashboard</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <style>
          .sidebar {
              position: fixed;
              top: 0;
              left: -250px;
              width: 250px;
              height: 100%;
              background-color: #f8f9fa;
              padding-top: 20px;
              box-shadow: 2px 0 5px rgba(0,0,0,0.1);
              transition: left 0.3s ease-in-out;
              z-index: 1000;
          }
          .sidebar.active {
              left: 0;
          }
          .sidebar .nav-link {
              padding: 10px 20px;
              display: block;
              color: #333;
              text-decoration: none;
          }
          .sidebar .nav-link:hover {
              background-color: #e9ecef;
          }
          .content {
              margin-left: 0;
              padding: 20px;
          }
          .menu-toggle {
              background: none;
              border: none;
              font-size: 24px;
              cursor: pointer;
          }
          .navbar {
              display: flex;
              align-items: center;
              justify-content: space-between;
              padding: 10px 20px;
          }
      </style>
   </head>
   <body class="bg-light">
        <nav class="navbar navbar-expand-md bg-white shadow-lg">
            <div class="container-fluid">
                <button class="menu-toggle" onclick="toggleMenu()">&#9776;</button>
                <a class="navbar-brand" href="#">
                   <strong>Admin Dashboard</strong>
                </a>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ Auth::guard('admin')->user()->name }}</a>
                            <ul class="dropdown-menu border-0 shadow" aria-labelledby="accountDropdown">                          
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="sidebar" id="sidebar">
            <h5 class="text-center">Menu</h5>
            <ul class="nav flex-column">
                 <li class="nav-item">
                <a  class="nav-link" href="{{ route('admin.categories.index') }}">Category</a>
                </li> 
                <li class ="nav-item">
                    <a  class="nav-link" href="{{ route('admin.Sub-categories.index') }}">SubCategory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">User</a>
                </li>   

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">Order</a>
                </li>   
                

                <li class ="nav-item">
                    <a  class="nav-link" href="{{ route('schemes.index') }}">Schemes</a>
                </li>

            </ul>
        </div> -->
        @extends('layouts.admin')

@section('content')
    <!-- MAIN-CONTENT -->

    <!-- Page Header -->
    <div class="page-header">
        
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <button type="button" class="btn btn-white btn-icon-text my-2 me-2">
                    <i class="fe fe-download me-2"></i> Import
                </button>
                <button type="button" class="btn btn-white btn-icon-text my-2 me-2">
                    <i class="fe fe-filter me-2"></i> Filter
                </button>
                <button type="button" class="btn btn-primary my-2 btn-icon-text">
                    <i class="fe fe-download-cloud me-2"></i> Download Report
                </button>
            </div>
        </div>
    </div>
        <div class="content">
            <div class="container">
               <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow text-center p-3">
                            <h5>Total Products</h5>
                            <h3>{{ $totalProducts }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow text-center p-3">
                            <h5>Total Users</h5>
                            <h3>{{ $totalUsers }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow text-center p-3">
                            <h5>Other Info</h5>
                            <h3>---</h3>
                        </div>
                    </div>
               </div>
            </div>
        </div>
      
      <script>
          function toggleMenu() {
              document.getElementById('sidebar').classList.toggle('active');
          }
      </script>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      @endsection
