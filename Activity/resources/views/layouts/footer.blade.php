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
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="footer-info">
                    <div class="section-title">
                        <h2>Headquarter</h2>
                    </div>
                    <address>
                        <p>212 Barrington Court <br>New York, ABC 10001</p>
                    </address>

                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>

                    <div class="copyright-text">
                        <p>Copyright &copy; 2020 Company Name</p>
                        <p>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="footer-info">
                    <div class="section-title">
                        <h2>Contact Info</h2>
                    </div>
                    <address>
                        <p>+1 333 4040 5566</p>
                        <p><a href="mailto:contact@company.com">contact@company.com</a></p>
                    </address>

                    <div class="footer_menu">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="terms.html">Terms & Conditions</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="footer-info newsletter-form">
                    <div class="section-title">
                        <h2>Newsletter Signup</h2>
                    </div>
                    <div>
                        <div class="form-group">
                            <form action="#" method="get">
                                <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                            </form>
                            <span><sup>*</sup> Please note - we do not spam your email.</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<!-- SCRIPTS -->
<script src="{{asset('homepage/js/jquery.js')}}"></script>
<script src="{{asset('homepage/js/bootstrap.min.js')}}"></script>
<script src="{{asset('homepage/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('homepage/js/smoothscroll.js')}}"></script>
<script src="{{asset('homepage/js/custom.js')}}"></script>

</body>
</html>
