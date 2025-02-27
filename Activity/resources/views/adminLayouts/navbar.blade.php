<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Panel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('adminpage//assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('adminpage/assets/plugins/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('adminpage/monster-html/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@csrf
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>


<section class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="blogControl">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{asset('adminpage/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />

                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{asset('adminpage/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />

                        </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
               href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto mt-md-0 ">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

                <li class="nav-item hidden-sm-down">
                    <form class="app-search ps-3">
                        <input type="text" class="form-control" placeholder="Search for..."> <a
                            class="srh-btn"><i class="ti-search"></i></a>
                    </form>
                </li>
            </ul>

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu show" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</section>

<script src="{{asset('adminpage/assets/plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('adminpage/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('adminpage/monster-html/js/app-style-switcher.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('adminpage/monster-html/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('adminpage/monster-html/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('adminpage/monster-html/js/custom.js')}}"></script>
<!--This page JavaScript -->
<!--flot chart-->
<script src="{{asset('adminpage/assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('adminage/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('adminpage/monster-html/js/pages/dashboards/dashboard1.js')}}"></script>
</body>
</html>
