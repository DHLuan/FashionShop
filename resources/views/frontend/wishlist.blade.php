@extends('layouts.front')

@section('title')
    My WistList
@endsection

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Danh sách mong muốn<span>Sản phẩm</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách mong muốn</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container wishlistitems">
                @if($wishlist->count() > 0)
                    @foreach($wishlist as $item)
                        <div class="row product_data">
                            <table class="table table-wishlist table-mobile">
                                <thead>
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Tình trạng kho</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="Product image" >
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">{{ $item->products->name }}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">${{ $item->products->selling_price }}</td>
                                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                        @if( $item->products->qty > 0)

                                            <td class="stock-col"><span class="in-stock">còn hàng</span></td>
                                        @else
                                            <td class="stock-col"><span class="out-of-stock">Hết hàng</span></td>
                                        @endif
                                        @if($item->products->qty > 0)
                                            <td class="action-col">
                                                <button type="button" class="btn btn-block btn-outline-primary-2  me-3 addToCartBtn1"><i class="icon-cart-plus"></i>Thêm vào giỏ hàng</button>
                                            </td>
                                        @else
                                            <td class="action-col">
                                                <button class="btn btn-block btn-outline-primary-2 disabled">Hết hàng</button>
                                            </td>
                                        @endif
                                        <td ><button class=" btn-remove btn-danger remove-wishlist-item"><i class="icon-close"></i></button></td>
                                    </tr>
                        </tbody>
                    </table><!-- End .table table-wishlist -->
                        </div>
                    @endforeach
                @else
                    <h4>Không có sản phẩm nào trong danh sách mong muốn</h4>
                @endif
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection


