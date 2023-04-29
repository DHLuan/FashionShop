@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        @if($cartItems->count() >0)
            <div class="page-content">
            <div class="cart cartitems">
                <div class="container product_data ">
                        <div class="row">
{{--                            @php $total = 0; @endphp--}}
                        <div class="col-lg-9 ">
                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
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
{{--                                                @php $total += $item->products->selling_price * $item->prod_qty ; @endphp--}}
                                        @php
                                            $subtotal = $cartItem->products->selling_price * $cartItem->prod_qty;
                                        @endphp
                                    <td class="total-col">${{ $subtotal }}</td>
                                            @else
                                                <h6>Out of Stock</h6>
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
                                                <option value="">Select a coupon</option>
                                                    @foreach($Coupon as $item)
                                                        <option value="{{ $item->code }}" >{{ $item->code }}</option>
                                                    @endforeach
                                            </select>
{{--                                            <input type="text" class="form-control" name="coupon_code" required placeholder="coupon code">--}}
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
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{$Total}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$0.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$10.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Express:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$20.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{ $Total }}</td>
                                    </tr><!-- End .summary-total -->
                                    @if ($discountedAmount > 0)
                                        <tr class="summary-discount">
                                            <td>Discount:</td>
                                            <td>-${{ $discountedAmount }}</td>
                                        </tr><!-- End .summary-discount -->
                                        <tr class="summary-total">
                                            <td>Total after discount:</td>
                                            <td>${{ $Total - $discountedAmount }}</td>
                                        </tr><!-- End .summary-total -->
                                    @endif
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block " style="border-color: #c96; padding: 10px">PROCEED TO CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="{{ url('category') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
        @else
            <div class="card-body text-center">
                <h2>Your <i class="material-icons">favorite</i> Cart is empty </h2>
                <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>
        @endif
    </main><!-- End .main -->

{{--    <div class="py-3 mb-4 shadow-sm bg-warning border-top">--}}
{{--        <div class="container">--}}
{{--            <h6 class="mb-0">--}}
{{--                <a href="{{ url('/') }}">--}}
{{--                    Home--}}
{{--                </a> /--}}
{{--                <a href="{{ url('cart') }}">--}}
{{--                    Cart--}}
{{--                </a>--}}
{{--            </h6>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="container my-5">--}}
{{--        <div class="card shadow cartitems">--}}
{{--            @if($cartitems->count() >0)--}}
{{--                <div class="card-body">--}}
{{--                    @php $total = 0; @endphp--}}
{{--                    @foreach($cartitems as $item)--}}
{{--                        <div class="row product_data">--}}
{{--                            <div class="col-md-2 my-auto">--}}
{{--                                <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="Image here">--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3 my-auto">--}}
{{--                                <h6>{{ $item->products->name }}</h6>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-2 my-auto">--}}
{{--                                <h6> Rs {{ $item->products->selling_price }}</h6>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3 my-auto">--}}
{{--                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">--}}
{{--                                @if( $item->products->qty >= $item->prod_qty)--}}
{{--                                    <label for="Quantity">Quantity</label>--}}
{{--                                    <div class="input-group text-center mb-3" style="width: 130px;">--}}
{{--                                        <button class="input-group-text changeQuantity decrement-btn">-</button>--}}
{{--                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">--}}
{{--                                        <button class="input-group-text changeQuantity increment-btn">+</button>--}}
{{--                                    </div>--}}
{{--                                    @php $total += $item->products->selling_price * $item->prod_qty ; @endphp--}}
{{--                                @else--}}
{{--                                    <h6>Out of Stock</h6>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="col-md-2 my-auto">--}}
{{--                                <button class="btn btn-danger delete-cart-item">   <i class="material-icons">remove_shopping_cart</i> Delete</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    <h6>Total Price : {{ $total }}--}}

{{--                        <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>--}}
{{--                    </h6>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="card-body text-center">--}}
{{--                    <h2>Your <i class="material-icons">favorite</i> Cart is empty </h2>--}}
{{--                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection


