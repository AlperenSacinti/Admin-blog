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
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('adminpage/assets/images/favicon.png')}}">
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
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<section class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="/blogControl" aria-expanded="false"><i class="me-3 far fa-clock fa-fw"
                                                                                        aria-hidden="true"></i><span class="hide-menu">Blogs</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="/userControl" aria-expanded="false">
                        <i class="me-3 fa fa-user" aria-hidden="true"></i><span
                            class="hide-menu">Users</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="/myBlogs" aria-expanded="false"><i class="me-3 fa fa-table"
                                                                                       aria-hidden="true"></i><span class="hide-menu">My Blogs</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="/adminBlog" aria-expanded="false"><i class="me-3 fa fa-table"
                                                                                              aria-hidden="true"></i><span class="hide-menu">Add Blog</span></a></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
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
