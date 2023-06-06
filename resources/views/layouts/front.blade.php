<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            @yield('title')
        </title>
        <meta name="keywords" content="HTML5 Template">
        <meta name="description" content="Molla - Bootstrap eCommerce Template">
        <meta name="author" content="p-themes">

        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('user/assets/images/icons/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('user/assets/images/icons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('user/assets/images/icons/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('user/assets/images/icons/site.html')}}">
        <link rel="mask-icon" href="{{asset('user/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
        <link rel="shortcut icon" href="{{asset('user/assets/images/icons/favicon.ico')}}">
        <meta name="apple-mobile-web-app-title" content="Molla">
        <meta name="application-name" content="Molla">
        <meta name="msapplication-TileColor" content="#cc9966">
        <meta name="msapplication-config" content="{{asset('user/assets/images/icons/browserconfig.xml')}}">
        <meta name="theme-color" content="#ffffff">

        <!-- Plugins CSS File -->
        <link rel="stylesheet" href="{{asset('user/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('user/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('user/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{asset('user/assets/css/style.css')}}">

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

        <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

        <link href="{{ asset('frontend/css/fontawesome.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


        <!-- Font awesome -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
              integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
        <style>
            a {
                text-decoration: none !important;
            }
        </style>
    </head>
    <body>

        @include('layouts.inc.usernavbar')

        <div class="content">
            @yield('content')
        </div>

        @include('layouts.inc.userfooter')

        <div class="whatsapp-chat">
            <a href="https://wa.me/15551234567?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
                <img src="{{ asset('assets/images/whatsapp-icon.png') }}" alt="whatsapp-logo" height="80px" width="80px">
            </a>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('frontend/js/jquery-3.6.3.min.js') }}"></script>
        <script src="{{ asset('frontend/js/custom.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/js/checkout.js') }}"></script>


        <script src="{{asset('user/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('user/assets/js/jquery.hoverIntent.min.js')}}"></script>
        <script src="{{asset('user/assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('user/assets/js/superfish.min.js')}}"></script>
        <script src="{{asset('user/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('user/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Main JS File -->
        <script src="{{asset('user/assets/js/main.js')}}"></script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/63fe509a31ebfa0fe7efdf46/1gqcmlmsv';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>

            var availableTags = [];
            $.ajax({
                method: "GET",
                url: "/product-list",
                success: function (response) {
                    startAutoComplete(response);
                }
            });

            function startAutoComplete(availableTags) {
                $("#search_product").autocomplete({
                    source: availableTags
                });
            }


        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('status'))
            <script>
                swal("{{session('status')}}");
            </script>
        @endif
        @yield('scripts')
    </body>
</html>
