<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('loginpage/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginpage/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('loginpage/images/bg-01.jpg')}}');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

            <div class="logo-container">
                <a href="/">
                    <img src="{{asset('logo.png')}}" alt="Logo">
                </a>
            </div>
            <form class="login100-form validate-form" method="post" action="{{route('signUp.post')}}">
                @csrf
					<span class="login100-form-title p-b-49">
						Register
					</span>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Type your username">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Name</span>s
                    <input class="input100" type="text" name="name" placeholder="Type your name">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Surname is required">
                    <span class="label-input100">Surname</span>s
                    <input class="input100" type="text" name="surname" placeholder="Type your surname">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Email is required">
                    <span class="label-input100">Email</span>s
                    <input class="input100" type="email" name="email" placeholder="Type your email">
                    <span class="focus-input100" data-symbol="&#xf15a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>s
                    <input class="input100" type="password" name="password" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">

                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('loginpage/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginpage/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginpage/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('loginpage/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginpage/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginpage/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('loginpage/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginpage/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginpage/js/main.js')}}"></script>

</body>
</html>
