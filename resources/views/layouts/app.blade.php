<!DOCTYPE html>
<html>
<!-- Head -->
<head>
    <title>
        @yield('title')
    </title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords"
          content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //Meta-Tags -->
    <link href="{{asset('auth/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all">

    <link href="{{asset('auth/css/style.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- //Fonts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

</head>
<!-- //Head -->

<!-- Body -->
<body>

<h1>Molla-Shop FORM</h1>

<main class="py-4">
    @yield('content')
</main>


<script type="text/javascript" src="{{asset('auth/js/jquery-2.1.4.min.js')}}"></script>

<!-- pop-up-box-js-file -->
<script src="{{asset('auth/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
<!--//pop-up-box-js-file -->


<script>
    $(document).ready(function () {
        $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>

</body>
<!-- //Body -->

</html>
