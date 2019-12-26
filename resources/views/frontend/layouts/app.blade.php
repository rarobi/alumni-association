<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>CSTE Alumni Association</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('frontend/img/icon/nstu.ico')}}">

    <!-- Core Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('frontend/css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" rel="stylesheet">

</head>

<body>
<!-- Preloader Start -->
<div id="preloader">
    <div class="loader">
        <span class="inner1"></span>
        <span class="inner2"></span>
        <span class="inner3"></span>
    </div>
</div>

<!-- Search Form Area -->
<div class="fancy-search-form d-flex align-items-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Close Btn -->
                <div class="search-close-btn" id="closeBtn">
                    <i class="ti-close" aria-hidden="true"></i>
                </div>
                <!-- Form -->
                <form action="#" method="get">
                    <input type="search" name="fancySearch" id="search" placeholder="| Enter Your Search...">
                    <input type="submit" class="d-none" value="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ***** Header Area Start ***** -->
@include('frontend.partial.nav')
<!-- ***** Header Area End ***** -->

@yield('content')

<!-- ***** Footer Area Start ***** -->
@include('frontend.partial.footer')
<!-- ***** Footer Area End ***** -->

<!-- jQuery-2.2.4 js -->
<script src="{{ asset('frontend/js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('frontend/js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap-4 js -->
<script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ asset('frontend/js/others/plugins.js') }}"></script>
<!-- Active JS -->
<script src="{{ asset('frontend/js/active.js') }}"></script>

<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>
