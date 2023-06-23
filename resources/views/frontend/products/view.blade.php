@extends('layouts.front')

@section('title', $products->name)


@section('content')

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{('shop')}}">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$products->name}}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('/add-rating') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{$products->name}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rating-css">
                                <div class="star-icon">
                                    @if($user_rating)
                                        @for($i =1; $i<= $user_rating->stars_rated; $i++)
                                            <input type="radio" value="{{$i}}" name="product_rating" checked
                                                   id="rating{{$i}}">
                                            <label for="rating{{$i}}" class="fa fa-star"></label>
                                        @endfor
                                        @for($j = $user_rating->stars_rated+1; $j <=5; $j++)
                                            <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                            <label for="rating{{$j}}" class="fa fa-star"></label>
                                        @endfor
                                    @else
                                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                                        <label for="rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                        <label for="rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                        <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                        <label for="rating5" class="fa fa-star"></label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Đánh giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="product-details-top mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery">
                                <figure class="product-main-image">
                                    <img id="product-zoom"
                                         src="{{ asset('assets/uploads/products/'.$products->image) }}"
                                         alt="product image" class="w-100">
                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->
                        <div class="col-md-6 product_data">
                            <div class="product-details">
                                <h1 class="product-title">{{ $products->name }}</h1><!-- End .product-title -->
                                @php $ratenum = number_format($rating_value) @endphp
                                <div class="ratings-container">
                                    @for($i =1; $i<= $ratenum; $i++)
                                        <i class="material-icons checked">star</i>
                                    @endfor
                                    @for($j = $ratenum+1; $j <=5; $j++)
                                        <i class="material-icons">star</i>
                                    @endfor
                                    <span>
                                    @if($ratings->count() > 0)
                                            <a class="ratings-text">({{$ratings->count()}} lượt đánh giá)</a>
                                        @else
                                            Chưa có đánh giá
                                        @endif
                            </span>
                                </div><!-- End .rating-container -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                    Đánh giá sản phẩm
                                </button>

                                <div class="details-filter-row details-row-size">

                                </div><!-- End .details-filter-row -->
                                <div class="product-price">
                                    <span class="new-price">${{ $products->selling_price }}</span>
                                    <span class="old-price">${{ $products->original_price }}</span>
                                </div><!-- End .product-price -->

                                @if($products->qty >0)
                                    <label class="badge bg-success">Còn hàng</label>
                                @else
                                    <label class="badge bg-danger">Hết hàng</label>
                                @endif

                                <div class="product-content">
                                    {!! $products->small_description !!}
                                </div><!-- End .product-content -->
                                <div class="details-filter-row details-row-size">
                                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                    <label for="Quantity">Số lượng</label>
                                    <div class="input-group text-center mb-3 mt-3 col-md-3">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity " value="1"
                                               class="form-control qty-input text-center"/>
                                        <button class="input-group-text increment-btn">+</button>
                                        {{--                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>--}}
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    @if($products->qty >0)
                                        <a href="#"
                                           class="btn-product btn-cart addToCartBtn"><span>Thêm vào giỏ hàng</span></a>
                                    @endif
                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist addToWishlist"
                                           title="Wishlist"><span>Thêm vào mong muốn</span></a>
                                        <a href="#" class="btn-product btn-compare"
                                           title="Compare"><span>So sánh</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Danh Mục:</span>
                                        <a href="{{ $products->category->slug}}}">{{$products->category->name}}</a>
                                    </div><!-- End .product-cat -->
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->
            </div><!-- End .container -->

            <div class="product-details-tab product-details-extended">
                <div class="container">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                               role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                               role="tab" aria-controls="product-info-tab" aria-selected="false">Thông tin </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                               href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                               aria-selected="false">Vận chuyển</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                               role="tab" aria-controls="product-review-tab" aria-selected="false">Các đánh giá
                                ({{$reviews->count()}})</a>
                        </li>
                    </ul>
                </div><!-- End .container -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                         aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <div class="product-desc-row bg-image"
                                 style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
                                <div class="container">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-11 ">
                                            <h1>{{$products->description}}</h1>
                                        </div><!-- End .col-lg-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .container -->
                            </div><!-- End .product-desc-row -->
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                         aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <div class="container">
                                <h3>Thông tin sản phẩm</h3>
                                <p>{{$products->meta_description}}</p>
                            </div><!-- End .container -->
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                         aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <div class="container">
                                <h3>Vận chuyển</h3>
                                <p>Của hàng chúng tôi vận chuyển đến khắp nơi. Để biết thêm thông tin chi tiết, xin hãy liên hệ với chúng tôi.
                                Chúng tôi mong các bạn sẽ yêu thích và hài lòng khi mua sắm online tại cửa hàng của chúng tôi</p>
                            </div><!-- End .container -->
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                         aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div class="container">
                                <h3>Các đánh giá về sản phẩm </h3>
                                <a href="{{ url('add-review/'.$products->slug.'/userreview') }}"
                                   class="btn btn-primary ">
                                    Đánh giá sản phẩm
                                </a>
                                @foreach($reviews as $item)
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{ $item->user->name .' '.$item->user->lname }}</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span
                                                    class="review-date">{{ $item->created_at->format('d M Y') }}</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <div class="review-content">
                                                    <p>{{ $item->user_review }}</p>
                                                </div><!-- End .review-content -->
                                                <div class="review-action">
                                                    @if($item->user_id == Auth::id())
                                                        <a href="{{ url('edit-review/'.$products->slug.'/userreview') }}"><i
                                                                class="icon-thumbs-up"></i>edit</a>
                                                    @endif
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-
                                @endforeach
                            </div><!-- End .container -->
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
