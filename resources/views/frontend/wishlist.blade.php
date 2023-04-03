@extends('layouts.front')

@section('title')
    My WistList
@endsection

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Wishlist<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
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
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Stock Status</th>
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

                                            <td class="stock-col"><span class="in-stock">In stock</span></td>
                                        @else
                                            <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                                        @endif
                                        @if($item->products->qty > 0)
                                            <td class="action-col">
                                                <button type="button" class="btn btn-block btn-outline-primary-2  me-3 addToCartBtn1"><i class="icon-cart-plus"></i>Add to Cart</button>
                                            </td>
                                        @else
                                            <td class="action-col">
                                                <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                                            </td>
                                        @endif
                                        <td ><button class=" btn-remove btn-danger remove-wishlist-item"><i class="icon-close"></i></button></td>
                                    </tr>
{{--                        <tr>--}}
{{--                            <td class="product-col">--}}
{{--                                <div class="product">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="#">--}}
{{--                                            <img src="assets/images/products/table/product-2.jpg" alt="Product image">--}}
{{--                                        </a>--}}
{{--                                    </figure>--}}

{{--                                    <h3 class="product-title">--}}
{{--                                        <a href="#">Blue utility pinafore denim dress</a>--}}
{{--                                    </h3><!-- End .product-title -->--}}
{{--                                </div><!-- End .product -->--}}
{{--                            </td>--}}
{{--                            <td class="price-col">$76.00</td>--}}
{{--                            <td class="stock-col"><span class="in-stock">In stock</span></td>--}}
{{--                            <td class="action-col">--}}
{{--                                <button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</button>--}}
{{--                            </td>--}}
{{--                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="product-col">--}}
{{--                                <div class="product">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="#">--}}
{{--                                            <img src="assets/images/products/table/product-3.jpg" alt="Product image">--}}
{{--                                        </a>--}}
{{--                                    </figure>--}}

{{--                                    <h3 class="product-title">--}}
{{--                                        <a href="#">Orange saddle lock front chain cross body bag</a>--}}
{{--                                    </h3><!-- End .product-title -->--}}
{{--                                </div><!-- End .product -->--}}
{{--                            </td>--}}
{{--                            <td class="price-col">$52.00</td>--}}
{{--                            <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>--}}
{{--                            <td class="action-col">--}}
{{--                                <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>--}}
{{--                            </td>--}}
{{--                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table><!-- End .table table-wishlist -->
                        </div>
                    @endforeach
                @else
                    <h4>There are no product in your Wishlist</h4>
                @endif
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Share on:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

{{--    <div class="py-3 mb-4 shadow-sm bg-warning border-top">--}}
{{--        <div class="container">--}}
{{--            <h6 class="mb-0">--}}
{{--                <a href="{{ url('/') }}">--}}
{{--                    Home--}}
{{--                </a> /--}}
{{--                <a href="{{ url('wishlist') }}">--}}
{{--                    Wishlist--}}
{{--                </a>--}}
{{--            </h6>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="container my-5">--}}
{{--        <div class="card shadow wishlistitems">--}}
{{--            <div class="card-body">--}}
{{--                @if($wishlist->count() > 0)--}}
{{--                        @foreach($wishlist as $item)--}}
{{--                            <div class="row product_data">--}}
{{--                                <div class="col-md-2 my-auto">--}}
{{--                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="Image here">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3 my-auto">--}}
{{--                                    <h6>{{ $item->products->name }}</h6>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-1 my-auto">--}}
{{--                                    <h6> Rs {{ $item->products->selling_price }}</h6>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 my-auto">--}}
{{--                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">--}}
{{--                                    @if( $item->products->qty >= $item->prod_qty)--}}
{{--                                        <label for="Quantity">Quantity</label>--}}
{{--                                        <div class="input-group text-center mb-3" style="width: 130px;">--}}
{{--                                            <button class="input-group-text  decrement-btn">-</button>--}}
{{--                                            <input type="text" name="quantity" class="form-control qty-input text-center" value="1">--}}
{{--                                            <button class="input-group-text  increment-btn">+</button>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <h6>Out of Stock</h6>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 my-auto">--}}
{{--                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="material-icons">add_shopping_cart</i> </button>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 my-auto">--}}
{{--                                    <button class="btn btn-danger remove-wishlist-item ">   <i class="material-icons">remove_shopping_cart</i> Delete</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                @else--}}
{{--                    <h4>There are no product in your Wishlist</h4>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection


