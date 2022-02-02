<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('site_assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('site_assets/css/responsive.css') }}">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="{{ route('frontend') }}" class="navbar-brand logo-sticky-none"><img src="{{ asset('site_assets/img/logo/logo.png') }}" alt="Logo"></a>
                                    <a href="{{ route('frontend') }}" class="navbar-brand s-logo-none"><img src="{{ asset('site_assets/img/logo/s_logo.png') }}" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        @yield('mainContent')

        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->
        
        
        
        
        
        <!-- JS here -->
        <script src="{{ asset('site_assets/js/vendor/jquery-1.12.4.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/popper.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/bootstrap.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/isotope.pkgd.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/one-page-nav-min.js') }} "></script>
        <script src="{{ asset('site_assets/js/slick.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/ajax-form.js') }} "></script>
        <script src="{{ asset('site_assets/js/wow.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/aos.js') }} "></script>
        <script src="{{ asset('site_assets/js/jquery.waypoints.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/jquery.counterup.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/jquery.scrollUp.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/imagesloaded.pkgd.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/jquery.magnific-popup.min.js') }} "></script>
        <script src="{{ asset('site_assets/js/plugins.js') }} "></script>
        <script src="{{ asset('site_assets/js/main.js') }} "></script>
       
        </body>
        
        <!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
        </html>
        