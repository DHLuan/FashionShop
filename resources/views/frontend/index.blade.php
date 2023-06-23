@extends('layouts.front')

@section('title')
    Welcome to L-Shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Sản Phẩm Nổi Bật</h2><!-- End .title -->

                </div><!-- End .heading -->
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $prod)
                        <div class="product product-11 text-center product_data">
                            <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                            <figure class="product-media">
                                <a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}">
                                    <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image" class="product-image" style="height: 350px" >
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist addToWishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}">{{ $prod->name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">${{ $prod->selling_price }}</span>
                                    <span class="old-price">So với {{ $prod->original_price }}</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart addToCartBtn1"><span>Thêm vào giỏ hàng</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rocket"></i>
                            </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Giao hàng nhanh chóng</h3><!-- End .icon-box-title -->
                        <p>Dịch vụ giao hàng nhanh chóng</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rotate-left"></i>
                            </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Đổi mới</h3><!-- End .icon-box-title -->
                        <p>Đổi mới nếu sản phẩm hư trong quá trình vận chuyển</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-life-ring"></i>
                            </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Chăm sóc tận tình</h3><!-- End .icon-box-title -->
                        <p>Phản hồi trực tuyến 24/7</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->

        <div class="mb-2"></div><!-- End .mb-2 -->
    </div><!-- End .container -->


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
