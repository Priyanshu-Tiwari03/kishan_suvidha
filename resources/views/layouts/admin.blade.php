@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.spruko.com/spruha/spruha/pages/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2023 07:38:21 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Spruha - PHP Admin Panel Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="php dashboard, php template, admin dashboard bootstrap, bootstrap admin theme, admin, php admin panel, bootstrap admin template, admin dashboard template, admin template bootstrap, php admin dashboard, dashboard template, dashboard template bootstrap, bootstrap admin, admin panel template, dashboard">

    <!-- TITLE -->
    <title>Kisan Suvidha - Admin</title>

    <!-- FAVICON -->
    {{--
    <link rel="icon" href="https://php.spruko.com/spruha/spruha/assets/img/brand/favicon.ico"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/logos/favicon - Copy.png') }}">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin-assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('admin-assets/plugins/web-fonts/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/web-fonts/plugin.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/plugins.css') }}" rel="stylesheet">

    <!-- SWITCHER CSS -->
    <link href="{{ asset('admin-assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/switcher/demo.css') }}" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- custom -->
    <style>
        .nav-sub-link {
            text-decoration: none;
        }

        .main-sidebar-hide .side-menu .main-logo .icon-logo {
            display: block;
            margin-left: 17px;
            padding-top: 10px
        }
    </style>

</head>

<body class="ltr main-body leftmenu">

    <!-- SWITCHER -->


    <!-- LOADEAR -->
    <div id="global-loader">
        <img src="https://php.spruko.com/spruha/spruha/assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- END LOADEAR -->

    <!-- PAGE -->
    <div class="page">

        <!-- HEADER -->

        <div class="main-header side-header sticky">
            <div class="main-container container-fluid">
                <div class="main-header-left">
                    <a class="main-header-menu-icon" href="javascript:void(0);" id="mainSidebarToggle"><span></span></a>
                    <div class="hor-logo">
                        <a class="main-logo" href="">
                           <img src="{{ asset('img/login-image.jpg') }}" 
                                class="header-brand-img desktop-logo" alt="logo">
                             <img src="login-image.jpg" height="40" class="header-brand-img desktop-logo-dark" alt="logo"> 
                        </a>
                    </div>
                </div>
                <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="">
                            <img src="{{ asset('img/login-image.jpg') }}" class="mx-2 mobile-logo"
                                alt="logo"></a>
                        <a href=""><img src="{{ asset('img/login-image.jpg') }}" height="40"
                                class="mobile-logo-dark" alt="logo"></a>
                    </div>
                   
                </div>
                <div class="main-header-right">
                    <button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                    </button><!-- Navresponsive closed -->
                    <!-- Theme-Layout -->
                    <div class="dropdown d-flex main-header-theme">
                        <a class="nav-link icon layout-setting">
                            <span class="dark-layout">
                                <i class="fe fe-sun header-icons"></i>
                            </span>
                            <span class="light-layout">
                                <i class="fe fe-moon header-icons"></i>
                            </span>
                        </a>
                    </div>
                    
                    <!-- Full screen -->
                    <div class="dropdown ">
                        <a class="nav-link icon full-screen-link">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                    <!-- Full screen -->
                    <!-- Notification -->

                    <!-- Notification -->
                    <!-- Messages -->

                    <!-- Messages -->
                    <!-- Profile -->
                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="javascript:void(0);">
                            <span class="main-img-user">
                                <img src="{{ asset('uploads/profile/' . auth()->user()->profile_photo) }}" alt="avatar" />


                               
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                </h6>
                            </div>
                            <a class="dropdown-item border-top" href="profile.php">
                                <i class="fe fe-user"></i> My Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="fe fe-power"></i> Log Out
                            </a>
                        </div>
                    </div>

                    <!-- Profile -->
                    <!-- Sidebar -->

                    <!-- Sidebar -->
                   
                   
                   
                </div>
            </div>
        </div>
        <!-- END HEADER -->

        <!-- SIDEBAR -->

        <div class="sticky">
            <div class="main-menu main-sidebar main-sidebar-sticky side-menu">
                <div class="main-sidebar-header main-container-1 active">
                    <div class="sidemenu-logo">
                        <a class="main-logo" href="">
                            <img src="{{ asset('img/kslogo.png') }}"
                                                        class="header-brand-img desktop-logo" height="40" alt="logo">
                            <img src="{{ asset('img/kslogo.png') }}" height="40" class="header-brand-img icon-logo"
                                alt="logo">
                            <img src="{{ asset('img/kslogo.png') }}" height="40"
                                class="header-brand-img desktop-logo theme-logo" alt="logo">
                            <img src="{{ asset('img/kslogo.png') }}" height="40"   
                                class="header-brand-img icon-logo theme-logo" alt="logo">
                        </a>
                    </div>

                    <div class="main-sidebar-body main-body-1">
                        <div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>

                        <ul class="menu-nav nav">
                            <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dasboard') }}">
                                    <span class="shape1"></span>
                                    <span class="shape2"></span>
                                    <i class="ti-home sidemenu-icon menu-icon"></i>
                                    <span class="sidemenu-label">Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-header"><span class="nav-label">Forms</span></li>
                            <li class="nav-item">
                                <a class="nav-link with-sub" href="javascript:void(0)">
                                    <span class="shape1"></span>
                                    <span class="shape2"></span>
                                    <!-- <i class="ti-shopping-cart-full sidemenu-icon menu-icon "></i> -->
                                    <i class="uil uil-list-ul sidemenu-icon menu-icon"></i>
                                    <span class="sidemenu-label">Category</span>
                                    <i class="angle fe fe-chevron-right"></i>
                                </a>
                                <ul class="nav-sub">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Category</a></li>
                                    <li class="nav-sub-item"><a class="nav-sub-link"
                                            href="{{ route('admin.categories.index') }}">Add
                                            Category</a></li>
                                    <li class="nav-sub-item"><a class="nav-sub-link"
                                            href="{{ route('admin.Sub-categories.index') }}">Add
                                            SubCategory</a></li>
                                </ul>
                            </li>


                            
                            <li class="nav-item">
                                <a class="nav-link with-sub" href="javascript:void(0)">
                                    <span class="shape1"></span>
                                    <span class="shape2"></span>
                                    <!-- <i class="ti-shopping-cart-full sidemenu-icon menu-icon "></i> -->
                                    <i class="uil uil-list-ul sidemenu-icon menu-icon"></i>
                                    <span class="sidemenu-label">Products</span>
                                    <i class="angle fe fe-chevron-right"></i>
                                </a>
                                <ul class="nav-sub">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Products</a></li>
                                    <li class="nav-sub-item"><a class="nav-sub-link"
                                            href="{{ route('products.create') }}">Add
                                            Products</a></li>
                                    <li class="nav-sub-item"><a class="nav-sub-link"
                                            href="{{ route('products.index') }}">View
                                            Products</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link with-sub" href="javascript:void(0)">
                                    <span class="shape1"></span>
                                    <span class="shape2"></span>
                                    <!-- <i class="ti-shopping-cart-full sidemenu-icon menu-icon "></i> -->
                                    <i class="uil uil-user-square sidemenu-icon menu-icon"></i>
                                    <span class="sidemenu-label">Users</span>
                                    <i class="angle fe fe-chevron-right"></i>
                                </a>
                                <ul class="nav-sub">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Users</a></li>
                                    <li class="nav-sub-item"><a class="nav-sub-link"
                                            href="{{ route('users.index') }}">View
                                            Users</a></li>
                                </ul>
                            </li>

                            

                            <li class="nav-item">
                                <a class="nav-link with-sub" href="javascript:void(0)">
                                    <span class="shape1"></span>
                                    <span class="shape2"></span>
                                    <i class="ti-shopping-cart-full sidemenu-icon menu-icon "></i>
                                    <span class="sidemenu-label">Scheme</span>
                                    <i class="angle fe fe-chevron-right"></i>
                                </a>
                                <ul class="nav-sub">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Scheme</a></li>
                                    <li class="nav-sub-item"><a class="nav-sub-link" href="{{ route('schemes.index') }}">Add
                                            Scheme</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SIDEBAR -->

        <!-- MAIN-CONTENT -->
        <div class="main-content side-content pt-0">
            <div class="main-container container-fluid">
                <div class="inner-body">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- END MAIN-CONTENT -->

        <!-- RIGHT-SIDEBAR -->

        <!-- END RIGHT-SIDEBAR -->

        <!-- FOOTER -->

        <div class="main-footer text-center">
            <div class="container">
                <div class="row row-sm">
                    <div class="col-md-12">
                        <span>Copyright © 2025
                            <!-- <a href="#">Spruha</a> -->. Designed by KisanAdmin.
                            All rights reserved. 💜
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FOOTER -->

    </div>
    <!-- END PAGE -->
    <!-- SCRIPTS -->

    <!-- BACK TO TOP -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- PERFECT SCROLLBAR JS -->
    <script src="{{ asset('admin-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- SIDEMENU JS -->
    <script src="{{ asset('admin-assets/plugins/sidemenu/sidemenu.js') }}" id="leftmenu"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('admin-assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- SELECT2 JS -->
    <script src="{{ asset('admin-assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/select2.js') }}"></script>

    <!-- Internal Chart.Bundle js-->
    <script src="{{ asset('admin-assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Peity js-->
    <script src="{{ asset('admin-assets/plugins/peity/jquery.peity.min.js') }}"></script>

    <!-- Internal Morris js -->
    <script src="{{ asset('admin-assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/morris.js/morris.min.js') }}"></script>

    <!-- Circle Progress js-->
    <script src="{{ asset('admin-assets/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/chart-circle.js') }}"></script>

    <!-- Internal Dashboard js-->
    <script src="{{ asset('admin-assets/js/index.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('admin-assets/js/sticky.js') }}"></script>

    <!-- COLOR THEME JS -->
    <script src="{{ asset('admin-assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin-assets/js/custom.js') }}"></script>

    <!-- SWITCHER JS -->
    <script src="{{ asset('admin-assets/switcher/js/switcher.js') }}"></script>

    <!-- END SCRIPTS -->

    <!-- RIGHT-SIDEBAR -->
    <!-- INTERNAL DATA TABLE JS -->
    <script src="{{ asset('admin-assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/table-data.js') }}"></script>
    <script src="{{ asset('admin-assets/js/select2.js') }}"></script>
    @stack("scripts")
</body>

<!-- Mirrored from php.spruko.com/spruha/spruha/pages/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2023 07:39:39 GMT -->

</html>