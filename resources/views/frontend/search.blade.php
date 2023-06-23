@extends('layouts.front')

@section('title')
    {{ $search }}
@endsection

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container-fluid">
                <h1 class="page-title">Sản Phẩm<span>Mua sắm</span></h1>
            </div><!-- End .container-fluid -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{'/'}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="">{{ $search }}</a></li>
                </ol>
            </div><!-- End .container-fluid -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container-fluid">
                <div class="toolbox">
                    <div class="toolbox-left">

                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-center">
                        <div class="toolbox-info">
                            <h1>{{ $search }}</h1>
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-center -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Sắp xếp:</label>
                            <div class="select-custom">
                                <select name="sortby" id="sortby" class="form-control">
                                    <option value="popularity" selected="selected">Nổi bật nhất</option>
                                    <option value="rating">Đánh giá cao nhất</option>
                                    <option value="date">Ngày</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products">
                    <div class="row">
                        @foreach($products as $prod)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                                <div class="product product_data">
                                    <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                                    <figure class="product-media">
                                        <a href="{{  url('category/'.$prod->category->slug.'/'.$prod->slug) }}">
                                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image" class="product-image" style="height: 350px">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist addToWishlist btn-expandable"><span>Thêm vào mong muốn</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action action-icon-top">
                                            <a href="#" class="btn-product btn-cart addToCartBtn1"><span>Thêm vào giỏ hàng</span></a>
                                            {{--                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>--}}
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">

                                        <h3 class="product-title"><a href="#">{{ $prod->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">${{ $prod->selling_price }}</span>
                                            <span class="old-price">${{ $prod->original_price }}</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                        @endforeach
@endsection
