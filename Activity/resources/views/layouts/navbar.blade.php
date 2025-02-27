<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('homepage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('homepage/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('homepage/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('homepage/css/owl.theme.default.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('homepage/css/style.css')}}">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
@csrf

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>


<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <div class="logo-container">
                <a href="/">
                    <img src="{{asset('logo.png')}}" alt="Logo">
                </a>
            </div>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="/">Home</a></li>
                <li><a href="/blogPage">Blog</a></li>


                @guest
                    <li><a href="/login">Login</a></li>
                @else
                    @auth
                        <li>
                            <div class="profile-dropdown">
                                <img src="https://via.placeholder.com/60" alt="Profile" class="profile-icon">
                                <div class="dropdown-content">
                                    <a href="/userAddBlog">Add Blog</a>
                                    <a href="/userEditBlog">Edit Blog</a>
                                    <a href="{{ route('userLogout.post') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('userLogout.post') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endauth

                @endguest

            </ul>
        </div>

    </div>
</section>
<!-- SCRIPTS -->
<script src="{{asset('homepage/js/jquery.js')}}"></script>
<script src="{{asset('homepage/js/bootstrap.min.js')}}"></script>
<script src="{{asset('homepage/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('homepage/js/smoothscroll.js')}}"></script>
<script src="{{asset('homepage/js/custom.js')}}"></script>

</body>
</html>
