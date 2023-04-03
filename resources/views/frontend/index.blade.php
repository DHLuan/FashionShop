@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Trendy Products</h2><!-- End .title -->

                </div><!-- End .heading -->
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $prod)
                        <div class="product product-11 text-center product_data">
                            <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                            <figure class="product-media">
                                <a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}">
                                    <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image" class="product-image" >
{{--                                    <img src="assets/images/demos/demo-2/products/product-1-2.jpg" alt="Product image" class="product-image-hover">--}}
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist addToWishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}">{{ $prod->name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">${{ $prod->selling_price }}</span>
                                    <span class="old-price">Was {{ $prod->original_price }}</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart addToCartBtn1"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container categories pt-6">
        <h2 class="title-lg text-center mb-4">Shop by Categories</h2><!-- End .title-lg text-center -->

        <div class="row">
            <div class="col-6 col-lg-4">
                <div class="banner banner-display banner-link-anim">
                    <a href="#">
                        <img src="{{asset('user/assets/images/banners/home/a.jpg')}}" alt="Banner">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="#">LapTop</a></h3><!-- End .banner-title -->
                        <a href="#" class="btn btn-outline-white banner-link" style="color: white; border-color: white">Shop Now<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-sm-6 col-lg-3 -->
            <div class="col-6 col-lg-4 order-lg-last">
                <div class="banner banner-display banner-link-anim">
                    <a href="#">
                        <img src="{{asset('user/assets/images/banners/home/b.jpg')}}" alt="Banner">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="#">PC</a></h3><!-- End .banner-title -->
                        <a href="#" class="btn btn-outline-white banner-link" style="color: white; border-color: white">Shop Now<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-sm-6 col-lg-3 -->
            <div class="col-sm-12 col-lg-4 banners-sm">
                <div class="row">
                    <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                        <a href="#">
                            <img src="{{asset('user/assets/images/banners/home/c.jpg')}}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Chair Gaming</a></h3><!-- End .banner-title -->
                            <a href="#" class="btn btn-outline-white banner-link" style="color: white; border-color: white">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->

                    <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                        <a href="#">
                            <img src="{{asset('user/assets/images/banners/home/d.jpg')}}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">computer components</a></h3><!-- End .banner-title -->
                            <a href="#" class="btn btn-outline-white banner-link" style="color: white; border-color: white;">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div>
            </div><!-- End .col-sm-6 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="container">
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rocket"></i>
                            </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                        <p>Free shipping for orders over $50</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rotate-left"></i>
                            </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                        <p>Free 100% money back guarantee</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-life-ring"></i>
                            </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                        <p>Alway online feedback 24/7</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->

        <div class="mb-2"></div><!-- End .mb-2 -->
    </div><!-- End .container -->

{{--    <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">--}}
{{--        <div class="container">--}}
{{--            <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2><!-- End .title-lg text-center -->--}}

{{--            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"--}}
{{--                 data-owl-options='{--}}
{{--                            "nav": false,--}}
{{--                            "dots": true,--}}
{{--                            "items": 3,--}}
{{--                            "margin": 20,--}}
{{--                            "loop": false,--}}
{{--                            "responsive": {--}}
{{--                                "0": {--}}
{{--                                    "items":1--}}
{{--                                },--}}
{{--                                "600": {--}}
{{--                                    "items":2--}}
{{--                                },--}}
{{--                                "992": {--}}
{{--                                    "items":3--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }'>--}}
{{--                <article class="entry entry-display">--}}
{{--                    <figure class="entry-media">--}}
{{--                        <a href="single.html">--}}
{{--                            <img src="assets/images/blog/home/post-1.jpg" alt="image desc">--}}
{{--                        </a>--}}
{{--                    </figure><!-- End .entry-media -->--}}

{{--                    <div class="entry-body pb-4 text-center">--}}
{{--                        <div class="entry-meta">--}}
{{--                            <a href="#">Nov 22, 2018</a>, 0 Comments--}}
{{--                        </div><!-- End .entry-meta -->--}}

{{--                        <h3 class="entry-title">--}}
{{--                            <a href="single.html">Sed adipiscing ornare.</a>--}}
{{--                        </h3><!-- End .entry-title -->--}}

{{--                        <div class="entry-content">--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.<br>Pelletesque aliquet nibh necurna. </p>--}}
{{--                            <a href="single.html" class="read-more">Read More</a>--}}
{{--                        </div><!-- End .entry-content -->--}}
{{--                    </div><!-- End .entry-body -->--}}
{{--                </article><!-- End .entry -->--}}

{{--                <article class="entry entry-display">--}}
{{--                    <figure class="entry-media">--}}
{{--                        <a href="single.html">--}}
{{--                            <img src="assets/images/blog/home/post-2.jpg" alt="image desc">--}}
{{--                        </a>--}}
{{--                    </figure><!-- End .entry-media -->--}}

{{--                    <div class="entry-body pb-4 text-center">--}}
{{--                        <div class="entry-meta">--}}
{{--                            <a href="#">Dec 12, 2018</a>, 0 Comments--}}
{{--                        </div><!-- End .entry-meta -->--}}

{{--                        <h3 class="entry-title">--}}
{{--                            <a href="single.html">Fusce lacinia arcuet nulla.</a>--}}
{{--                        </h3><!-- End .entry-title -->--}}

{{--                        <div class="entry-content">--}}
{{--                            <p>Sed pretium, ligula sollicitudin laoreet<br>viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis justo. </p>--}}
{{--                            <a href="single.html" class="read-more">Read More</a>--}}
{{--                        </div><!-- End .entry-content -->--}}
{{--                    </div><!-- End .entry-body -->--}}
{{--                </article><!-- End .entry -->--}}

{{--                <article class="entry entry-display">--}}
{{--                    <figure class="entry-media">--}}
{{--                        <a href="single.html">--}}
{{--                            <img src="assets/images/blog/home/post-3.jpg" alt="image desc">--}}
{{--                        </a>--}}
{{--                    </figure><!-- End .entry-media -->--}}

{{--                    <div class="entry-body pb-4 text-center">--}}
{{--                        <div class="entry-meta">--}}
{{--                            <a href="#">Dec 19, 2018</a>, 2 Comments--}}
{{--                        </div><!-- End .entry-meta -->--}}

{{--                        <h3 class="entry-title">--}}
{{--                            <a href="single.html">Quisque volutpat mattis eros.</a>--}}
{{--                        </h3><!-- End .entry-title -->--}}

{{--                        <div class="entry-content">--}}
{{--                            <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. </p>--}}
{{--                            <a href="single.html" class="read-more">Read More</a>--}}
{{--                        </div><!-- End .entry-content -->--}}
{{--                    </div><!-- End .entry-body -->--}}
{{--                </article><!-- End .entry -->--}}
{{--            </div><!-- End .owl-carousel -->--}}
{{--        </div><!-- container -->--}}

{{--        <div class="more-container text-center mb-0 mt-3">--}}
{{--            <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>--}}
{{--        </div><!-- End .more-container -->--}}
{{--    </div>--}}

    <div class="container">
        <hr class="mt-5 mb-4">
        <h2 class="title-lg text-center mb-4">lapTop Gaming</h2><!-- End .text-center -->
    </div><!-- End .container -->

    <div class="video-banner video-banner-bg bg-image text-center" style="background-image: url({{asset('user/assets/images/video/OIP.jpg')}})">
        <div class="container">
            <h3 class="video-banner-title h1 text-white"><span>New Video</span><strong>LapTopGaming</strong></h3><!-- End .video-banner-title -->
            <a href="https://www.youtube.com/watch?v=o58HTzKXjyY" class="btn-video btn-iframe"><i class="icon-play"></i></a>
        </div><!-- End .container -->
    </div><!-- End .video-banner bg-image -->

    <div class="container">
        <hr class="mt-5 mb-4">
        <h2 class="title-lg text-center mb-4">lapTop Office</h2><!-- End .text-center -->
    </div><!-- End .container -->

    <div class="video-banner video-banner-poster text-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h3 class="video-banner-title h3"><span class="text-primary">New Video</span>study and life</h3><!-- End .video-banner-title -->
                    <p>Office laptops are computers with normal configuration and are relatively popular among young people. Office computers have not too high configuration, low cost and are capable of handling work quickly and conveniently.</p>
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="video-poster">
                        <img src="{{asset('user/assets/images/video/ab.jpg')}}" alt="poster">

                        <div class="video-poster-content">
                            <a href="https://www.youtube.com/watch?v=yrOxdh_mfnI" class="btn-video btn-iframe"><i class="icon-play"></i></a>
                        </div><!-- End .video-poster-content -->
                    </div><!-- End .video-poster -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .video-banner -->

    <div class="mt-5 mb-4">

    </div><!-- End .container -->

    <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url({{(asset('user/assets/images/backgrounds/cta/bg-6.jpg'))}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-8">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">Molla presents the best in interior design</p><!-- End .cta-desc -->
                        </div><!-- End .col -->

                        <div class="col-auto">
                            <a href="{{_('Register')}}" class="btn btn-outline-white"><span>SIGN UP</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .col-auto -->
                    </div><!-- End .row no-gutters -->
                </div><!-- End .col-md-10 col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->

@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection
