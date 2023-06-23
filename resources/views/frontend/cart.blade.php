@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Giỏ hàng<span>Sản phẩm</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        @if($cartItems->count() >0)
            <div class="page-content">
            <div class="cart cartitems">
                <div class="container product_data ">
                        <div class="row">
                        <div class="col-lg-9 ">
                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @foreach($cartItems as $cartItem)
                                <tbody>
                                <tr>
                                    <td class="product-col ">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ asset('assets/uploads/products/'.$cartItem->products->image) }}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{ $cartItem->products->name }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">${{ $cartItem->products->selling_price }}</td>
                                    <td class="quantity-col product_data ">
                                        <div class="cart-product-quantity">
                                            @if( $cartItem->products->qty >= $cartItem->prod_qty)
                                                <div class="input-group text-center mb-3 " style="width: 100px;">
                                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                                    <input type="hidden" class="prod_id" value="{{ $cartItem->prod_id }}">
                                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $cartItem->prod_qty }}">
                                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                                </div>
                                    <td class="total-col ">${{ $cartItem->products->selling_price * $cartItem->prod_qty }} </td>
                                            @else
                                                <h6>Hết hàng</h6>
                                            @endif
                                        </div><!-- End .cart-product-quantity -->

                                    </td>
                                    <td class="remove-col"><button class="btn-remove btn-danger delete-cart-item"><i class="icon-close"></i></button></td>
                                </tr>
                                </tbody>
                            @endforeach
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="{{ url('apply-coupon') }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <select class="form-control" name="coupon_code">
                                                <option value="">Chọn mã giảm giá</option>
                                                    @foreach($Coupon as $item)
                                                        <option value="{{ $item->code }}" >{{ $item->code }}</option>
                                                    @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->

                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Tổng tiền giỏ hàng</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Tổng tiền:</td>
                                        <td>${{$Total}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Phí vận chuyển:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Miễn phí vận chuyển</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$0.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-total">
                                        <td>Tổng tiền:</td>
                                        <td>${{ $Total }}</td>
                                    </tr><!-- End .summary-total -->
                                    @if ($discountedAmount > 0)
                                        <tr class="summary-discount">
                                            <td>Giảm giá:</td>
                                            <td>-${{ $discountedAmount }}</td>
                                        </tr><!-- End .summary-discount -->
                                        <tr class="summary-total">
                                            <td>Tổng tiền sau khi giảm giá:</td>
                                            <td>${{ $Total - $discountedAmount }}</td>
                                        </tr><!-- End .summary-total -->
                                    @endif
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block " style="border-color: #c96; padding: 10px">Xác nhận thanh toán</a>
                            </div><!-- End .summary -->

                            <a href="{{ url('shop') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>Tiếp tục mua sắm</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
        @else
            <div class="card-body text-center">
                <h2>Giỏ hàng của bạn đang trống <i class="material-icons">favorite</i> </h2>
                <a href="{{ url('shop') }}" class="btn btn-outline-primary float-end">Tiếp tục mua sắm</a>
            </div>
        @endif
    </main><!-- End .main -->


@endsection


