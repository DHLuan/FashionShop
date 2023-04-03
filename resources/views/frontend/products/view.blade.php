@extends('layouts.front')

@section('title', $products->name)


@section('content')

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{('shop')}}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$products->name}}</li>
                </ol>

{{--                <nav class="product-pager ml-auto" aria-label="Product">--}}
{{--                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">--}}
{{--                        <i class="icon-angle-left"></i>--}}
{{--                        <span>Prev</span>--}}
{{--                    </a>--}}

{{--                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">--}}
{{--                        <span>Next</span>--}}
{{--                        <i class="icon-angle-right"></i>--}}
{{--                    </a>--}}
{{--                </nav><!-- End .pager-nav -->--}}
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
                                            <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                                    <img id="product-zoom" src="{{ asset('assets/uploads/products/'.$products->image) }}"  alt="product image" class="w-100">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

{{--                                <div id="product-zoom-gallery" class="product-main-image">--}}
{{--                                    <a class="product-gallery-item" href="#" data-image="assets/images/products/single/extended/1.jpg" data-zoom-image="assets/images/products/single/extended/1-big.jpg">--}}
{{--                                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="product side">--}}
{{--                                    </a>--}}

{{--                                    <a class="product-gallery-item" href="#" data-image="assets/images/products/single/extended/2.jpg" data-zoom-image="assets/images/products/single/extended/2-big.jpg">--}}
{{--                                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="product cross">--}}
{{--                                    </a>--}}

{{--                                    <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/extended/3.jpg" data-zoom-image="assets/images/products/single/extended/3-big.jpg">--}}
{{--                                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="product with model">--}}
{{--                                    </a>--}}

{{--                                    <a class="product-gallery-item" href="#" data-image="assets/images/products/single/extended/4.jpg" data-zoom-image="assets/images/products/single/extended/4-big.jpg">--}}
{{--                                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="product back">--}}
{{--                                    </a>--}}

{{--                                </div><!-- End .product-image-gallery -->--}}
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6 product_data">
                            <div class="product-details">
                                <h1 class="product-title">{{ $products->name }}</h1><!-- End .product-title -->
                                @php $ratenum = number_format($rating_value) @endphp
                                <div class="ratings-container">
{{--                                    <div class="ratings">--}}
{{--                                        <div class="" style="width: 80%;"></div><!-- End .ratings-val -->--}}

{{--                                    </div><!-- End .ratings -->--}}
                                    @for($i =1; $i<= $ratenum; $i++)
                                        <i class="material-icons checked">star</i>
                                    @endfor
                                    @for($j = $ratenum+1; $j <=5; $j++)
                                        <i class="material-icons">star</i>
                                    @endfor
                                    <span>
                                    @if($ratings->count() > 0)
                                            <a class="ratings-text">({{$ratings->count()}} Ratings)</a>
                                    @else
                                        No Rating
                                    @endif
                            </span>

{{--                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>--}}
                                </div><!-- End .rating-container -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Rate this product
                                </button>

                                <div class="details-filter-row details-row-size">

                                </div><!-- End .details-filter-row -->
                                <div class="product-price">
                                    <span class="new-price">${{ $products->selling_price }}</span>
                                    <span class="old-price">${{ $products->original_price }}</span>
                                </div><!-- End .product-price -->

                                @if($products->qty >0)
                                    <label class="badge bg-success">In stock</label>
                                @else
                                    <label class="badge bg-danger">Out of stock</label>
                                @endif

                                <div class="product-content">
                                    {!! $products->small_description !!}
                                </div><!-- End .product-content -->

{{--                                <div class="details-filter-row details-row-size">--}}
{{--                                    <label>Color:</label>--}}

{{--                                    <div class="product-nav product-nav-dots">--}}
{{--                                        <a href="#" class="active" style="background: #eab656;"><span class="sr-only">Color name</span></a>--}}
{{--                                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>--}}
{{--                                        <a href="#" style="background: #3a588b;"><span class="sr-only">Color name</span></a>--}}
{{--                                        <a href="#" style="background: #caab97;"><span class="sr-only">Color name</span></a>--}}
{{--                                    </div><!-- End .product-nav -->--}}
{{--                                </div><!-- End .details-filter-row -->--}}

{{--                                <div class="details-filter-row details-row-size">--}}
{{--                                    <label for="size">Size:</label>--}}
{{--                                    <div class="select-custom">--}}
{{--                                        <select name="size" id="size" class="form-control">--}}
{{--                                            <option value="#" selected="selected">Select a size</option>--}}
{{--                                            <option value="s">Small</option>--}}
{{--                                            <option value="m">Medium</option>--}}
{{--                                            <option value="l">Large</option>--}}
{{--                                            <option value="xl">Extra Large</option>--}}
{{--                                        </select>--}}
{{--                                    </div><!-- End .select-custom -->--}}

{{--                                    <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>--}}
{{--                                </div><!-- End .details-filter-row -->--}}

                                <div class="details-filter-row details-row-size">
                                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3 mt-3 col-md-3">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity " value="1" class="form-control qty-input text-center" />
                                        <button class="input-group-text increment-btn">+</button>
{{--                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>--}}
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    @if($products->qty >0)
                                        <a href="#" class="btn-product btn-cart addToCartBtn"><span>add to cart</span></a>
                                    @endif
                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist addToWishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="{{ $products->category->slug}}}">{{$products->category->name}}</a>,
                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
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
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ({{$reviews->count()}})</a>
                        </li>
                    </ul>
                </div><!-- End .container -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <div class="product-desc-row bg-image"  style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
                                <div class="container">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-11 ">
                                            <h1>{{$products->description}}</h1>
                                        </div><!-- End .col-lg-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .container -->
                            </div><!-- End .product-desc-row -->

{{--                            <div class="product-desc-row bg-image text-white"  style="background-image: url('assets/images/products/single/extended/bg-2.jpg')">--}}
{{--                                <div class="container">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <h2>Design</h2>--}}
{{--                                            <p>The perfect choice for the summer months. These wedges are perfect for holidays and home, with the thick cross-over strap design and heel strap with an adjustable buckle fastening. Featuring chunky soles with an espadrille and cork-style wedge. </p>--}}
{{--                                        </div><!-- End .col-md-6 -->--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <h2>Fabric & care</h2>--}}
{{--                                            <p>As part of our Forever Comfort collection, these wedges have ultimate cushioning with soft padding and flexi soles. Perfect for strolls into the old town on holiday or a casual wander into the village.</p>--}}
{{--                                        </div><!-- End .col-md-6 -->--}}
{{--                                    </div><!-- End .row -->--}}

{{--                                    <div class="mb-5"></div><!-- End .mb-3 -->--}}

{{--                                    <img src="assets/images/products/single/extended/sign.png" alt="" class="ml-auto mr-auto">--}}
{{--                                </div><!-- End .container -->--}}
{{--                            </div><!-- End .product-desc-row -->--}}

{{--                            <div class="product-desc-row bg-image"  style="background-image: url('assets/images/products/single/extended/bg-3.jpg')">--}}
{{--                                <div class="container">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-5">--}}
{{--                                            <blockquote>--}}
{{--                                                <p>“ Everything is important - <br>that success is in the details. ”</p>--}}

{{--                                                <cite>– Steve Jobs</cite>--}}
{{--                                            </blockquote>--}}
{{--                                            <p>Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. </p>--}}
{{--                                        </div><!-- End .col-lg-5 -->--}}
{{--                                    </div><!-- End .row -->--}}
{{--                                </div><!-- End .container -->--}}
{{--                            </div><!-- End .product-desc-row -->--}}
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <div class="container">
                                <h3>Information</h3>
                                <p>{{$products->meta_description}}</p>


                            </div><!-- End .container -->
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <div class="container">
                                <h3>Delivery & returns</h3>
                                <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our </p>
                            </div><!-- End .container -->
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div class="container">
                                <h3>Reviews </h3>
                                @foreach($reviews as $item)
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{ $item->user->name .' '.$item->user->lname }}</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">{{ $item->created_at->format('d M Y') }}</span>
                                            </div><!-- End .col -->
                                            <div class="col">


                                                <div class="review-content">
                                                    <p>{{ $item->user_review }}</p>
                                                </div><!-- End .review-content -->

                                                <div class="review-action">
                                                    @if($item->user_id == Auth::id())
                                                        <a href="{{ url('edit-review/'.$products->slug.'/userreview') }}"><i class="icon-thumbs-up"></i>edit</a>
                                                    @endif
{{--                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>--}}
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                        <a href="{{ url('add-review/'.$products->slug.'/userreview') }}" class="btn btn-primary " >
                                            Write a review
                                        </a>
                                    </div><!-
{{--                                    <div class="user-review">--}}
{{--                                        <label for="">{{ $item->user->name .' '.$item->user->lname }}</label>--}}
{{--                                        @if($item->user_id == Auth::id())--}}
{{--                                            <a href="{{ url('edit-review/'.$products->slug.'/userreview') }}">edit</a>--}}
{{--                                        @endif--}}
{{--                                        <br>--}}
{{--                                        @php--}}

{{--                                            $rating = App\Models\Rating::where('prod_id',$products->id)->where('user_id',$item->user->id)->first();--}}

{{--                                        @endphp--}}
{{--                                        @if($rating)--}}
{{--                                            @php $user_rated = $rating->stars_rated @endphp--}}
{{--                                            @for($i =1; $i<= $user_rated; $i++)--}}
{{--                                                <i class="material-icons checked">star</i>--}}
{{--                                            @endfor--}}
{{--                                            @for($j = $user_rated+1; $j <=5; $j++)--}}
{{--                                                <i class="material-icons">star</i>--}}
{{--                                            @endfor--}}
{{--                                        @endif--}}
{{--                                        <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>--}}
{{--                                        <p>--}}
{{--                                            {{ $item->user_review }}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
                                @endforeach
{{--                                <div class="review">--}}
{{--                                    <div class="row no-gutters">--}}
{{--                                        <div class="col-auto">--}}
{{--                                            <h4><a href="#">Samanta J.</a></h4>--}}
{{--                                            <div class="ratings-container">--}}
{{--                                                <div class="ratings">--}}
{{--                                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->--}}
{{--                                                </div><!-- End .ratings -->--}}
{{--                                            </div><!-- End .rating-container -->--}}
{{--                                            <span class="review-date">6 days ago</span>--}}
{{--                                        </div><!-- End .col -->--}}
{{--                                        <div class="col">--}}
{{--                                            <h4>Good, perfect size</h4>--}}

{{--                                            <div class="review-content">--}}
{{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>--}}
{{--                                            </div><!-- End .review-content -->--}}

{{--                                            <div class="review-action">--}}
{{--                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>--}}
{{--                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>--}}
{{--                                            </div><!-- End .review-action -->--}}
{{--                                        </div><!-- End .col-auto -->--}}
{{--                                    </div><!-- End .row -->--}}
{{--                                </div><!-- End .review -->--}}

{{--                                <div class="review">--}}
{{--                                    <div class="row no-gutters">--}}
{{--                                        <div class="col-auto">--}}
{{--                                            <h4><a href="#">John Doe</a></h4>--}}
{{--                                            <div class="ratings-container">--}}
{{--                                                <div class="ratings">--}}
{{--                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->--}}
{{--                                                </div><!-- End .ratings -->--}}
{{--                                            </div><!-- End .rating-container -->--}}
{{--                                            <span class="review-date">5 days ago</span>--}}
{{--                                        </div><!-- End .col -->--}}
{{--                                        <div class="col">--}}
{{--                                            <h4>Very good</h4>--}}

{{--                                            <div class="review-content">--}}
{{--                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>--}}
{{--                                            </div><!-- End .review-content -->--}}

{{--                                            <div class="review-action">--}}
{{--                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>--}}
{{--                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>--}}
{{--                                            </div><!-- End .review-action -->--}}
{{--                                        </div><!-- End .col-auto -->--}}
{{--                                    </div><!-- End .row -->--}}
{{--                                </div><!-- End .review -->--}}
                            </div><!-- End .container -->
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->

            </div><!-- End .product-details-tab -->

{{--            <div class="container">--}}
{{--                <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->--}}
{{--                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"--}}
{{--                     data-owl-options='{--}}
{{--                            "nav": false,--}}
{{--                            "dots": true,--}}
{{--                            "margin": 20,--}}
{{--                            "loop": false,--}}
{{--                            "responsive": {--}}
{{--                                "0": {--}}
{{--                                    "items":1--}}
{{--                                },--}}
{{--                                "480": {--}}
{{--                                    "items":2--}}
{{--                                },--}}
{{--                                "768": {--}}
{{--                                    "items":3--}}
{{--                                },--}}
{{--                                "992": {--}}
{{--                                    "items":4--}}
{{--                                },--}}
{{--                                "1200": {--}}
{{--                                    "items":4,--}}
{{--                                    "nav": true,--}}
{{--                                    "dots": false--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }'>--}}
{{--                    <div class="product product-7">--}}
{{--                        <figure class="product-media">--}}
{{--                            <span class="product-label label-new">New</span>--}}
{{--                            <a href="product.html">--}}
{{--                                <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">--}}
{{--                            </a>--}}

{{--                            <div class="product-action-vertical">--}}
{{--                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>--}}
{{--                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>--}}
{{--                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>--}}
{{--                            </div><!-- End .product-action-vertical -->--}}

{{--                            <div class="product-action">--}}
{{--                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>--}}
{{--                            </div><!-- End .product-action -->--}}
{{--                        </figure><!-- End .product-media -->--}}

{{--                        <div class="product-body">--}}
{{--                            <div class="product-cat">--}}
{{--                                <a href="#">Women</a>--}}
{{--                            </div><!-- End .product-cat -->--}}
{{--                            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3><!-- End .product-title -->--}}
{{--                            <div class="product-price">--}}
{{--                                $60.00--}}
{{--                            </div><!-- End .product-price -->--}}
{{--                            <div class="ratings-container">--}}
{{--                                <div class="ratings">--}}
{{--                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->--}}
{{--                                </div><!-- End .ratings -->--}}
{{--                                <span class="ratings-text">( 2 Reviews )</span>--}}
{{--                            </div><!-- End .rating-container -->--}}

{{--                            <div class="product-nav product-nav-dots">--}}
{{--                                <a href="#" class="active" style="background: #cc9966;"><span class="sr-only">Color name</span></a>--}}
{{--                                <a href="#" style="background: #7fc5ed;"><span class="sr-only">Color name</span></a>--}}
{{--                                <a href="#" style="background: #e8c97a;"><span class="sr-only">Color name</span></a>--}}
{{--                            </div><!-- End .product-nav -->--}}
{{--                        </div><!-- End .product-body -->--}}
{{--                    </div><!-- End .product -->--}}

{{--                    <div class="product product-7">--}}
{{--                        <figure class="product-media">--}}
{{--                            <span class="product-label label-out">Out of Stock</span>--}}
{{--                            <a href="product.html">--}}
{{--                                <img src="assets/images/products/product-6.jpg" alt="Product image" class="product-image">--}}
{{--                            </a>--}}

{{--                            <div class="product-action-vertical">--}}
{{--                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>--}}
{{--                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>--}}
{{--                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>--}}
{{--                            </div><!-- End .product-action-vertical -->--}}

{{--                            <div class="product-action">--}}
{{--                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>--}}
{{--                            </div><!-- End .product-action -->--}}
{{--                        </figure><!-- End .product-media -->--}}

{{--                        <div class="product-body">--}}
{{--                            <div class="product-cat">--}}
{{--                                <a href="#">Jackets</a>--}}
{{--                            </div><!-- End .product-cat -->--}}
{{--                            <h3 class="product-title"><a href="product.html">Khaki utility boiler jumpsuit</a></h3><!-- End .product-title -->--}}
{{--                            <div class="product-price">--}}
{{--                                <span class="out-price">$120.00</span>--}}
{{--                            </div><!-- End .product-price -->--}}
{{--                            <div class="ratings-container">--}}
{{--                                <div class="ratings">--}}
{{--                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->--}}
{{--                                </div><!-- End .ratings -->--}}
{{--                                <span class="ratings-text">( 6 Reviews )</span>--}}
{{--                            </div><!-- End .rating-container -->--}}
{{--                        </div><!-- End .product-body -->--}}
{{--                    </div><!-- End .product -->--}}

{{--                    <div class="product product-7">--}}
{{--                        <figure class="product-media">--}}
{{--                            <span class="product-label label-top">Top</span>--}}
{{--                            <a href="product.html">--}}
{{--                                <img src="assets/images/products/product-11.jpg" alt="Product image" class="product-image">--}}
{{--                            </a>--}}

{{--                            <div class="product-action-vertical">--}}
{{--                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>--}}
{{--                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>--}}
{{--                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>--}}
{{--                            </div><!-- End .product-action-vertical -->--}}

{{--                            <div class="product-action">--}}
{{--                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>--}}
{{--                            </div><!-- End .product-action -->--}}
{{--                        </figure><!-- End .product-media -->--}}

{{--                        <div class="product-body">--}}
{{--                            <div class="product-cat">--}}
{{--                                <a href="#">Shoes</a>--}}
{{--                            </div><!-- End .product-cat -->--}}
{{--                            <h3 class="product-title"><a href="product.html">Light brown studded Wide fit wedges</a></h3><!-- End .product-title -->--}}
{{--                            <div class="product-price">--}}
{{--                                $110.00--}}
{{--                            </div><!-- End .product-price -->--}}
{{--                            <div class="ratings-container">--}}
{{--                                <div class="ratings">--}}
{{--                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->--}}
{{--                                </div><!-- End .ratings -->--}}
{{--                                <span class="ratings-text">( 1 Reviews )</span>--}}
{{--                            </div><!-- End .rating-container -->--}}

{{--                            <div class="product-nav product-nav-dots">--}}
{{--                                <a href="#" class="active" style="background: #8b513d;"><span class="sr-only">Color name</span></a>--}}
{{--                                <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>--}}
{{--                                <a href="#" style="background: #d2b99a;"><span class="sr-only">Color name</span></a>--}}
{{--                            </div><!-- End .product-nav -->--}}
{{--                        </div><!-- End .product-body -->--}}
{{--                    </div><!-- End .product -->--}}

{{--                    <div class="product product-7">--}}
{{--                        <figure class="product-media">--}}
{{--                            <a href="product.html">--}}
{{--                                <img src="assets/images/products/product-10.jpg" alt="Product image" class="product-image">--}}
{{--                            </a>--}}

{{--                            <div class="product-action-vertical">--}}
{{--                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>--}}
{{--                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>--}}
{{--                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>--}}
{{--                            </div><!-- End .product-action-vertical -->--}}

{{--                            <div class="product-action">--}}
{{--                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>--}}
{{--                            </div><!-- End .product-action -->--}}
{{--                        </figure><!-- End .product-media -->--}}

{{--                        <div class="product-body">--}}
{{--                            <div class="product-cat">--}}
{{--                                <a href="#">Jumpers</a>--}}
{{--                            </div><!-- End .product-cat -->--}}
{{--                            <h3 class="product-title"><a href="product.html">Yellow button front tea top</a></h3><!-- End .product-title -->--}}
{{--                            <div class="product-price">--}}
{{--                                $56.00--}}
{{--                            </div><!-- End .product-price -->--}}
{{--                            <div class="ratings-container">--}}
{{--                                <div class="ratings">--}}
{{--                                    <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->--}}
{{--                                </div><!-- End .ratings -->--}}
{{--                                <span class="ratings-text">( 0 Reviews )</span>--}}
{{--                            </div><!-- End .rating-container -->--}}
{{--                        </div><!-- End .product-body -->--}}
{{--                    </div><!-- End .product -->--}}

{{--                    <div class="product product-7">--}}
{{--                        <figure class="product-media">--}}
{{--                            <a href="product.html">--}}
{{--                                <img src="assets/images/products/product-7.jpg" alt="Product image" class="product-image">--}}
{{--                            </a>--}}

{{--                            <div class="product-action-vertical">--}}
{{--                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>--}}
{{--                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>--}}
{{--                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>--}}
{{--                            </div><!-- End .product-action-vertical -->--}}

{{--                            <div class="product-action">--}}
{{--                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>--}}
{{--                            </div><!-- End .product-action -->--}}
{{--                        </figure><!-- End .product-media -->--}}

{{--                        <div class="product-body">--}}
{{--                            <div class="product-cat">--}}
{{--                                <a href="#">Jeans</a>--}}
{{--                            </div><!-- End .product-cat -->--}}
{{--                            <h3 class="product-title"><a href="product.html">Blue utility pinafore denim dress</a></h3><!-- End .product-title -->--}}
{{--                            <div class="product-price">--}}
{{--                                $76.00--}}
{{--                            </div><!-- End .product-price -->--}}
{{--                            <div class="ratings-container">--}}
{{--                                <div class="ratings">--}}
{{--                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->--}}
{{--                                </div><!-- End .ratings -->--}}
{{--                                <span class="ratings-text">( 2 Reviews )</span>--}}
{{--                            </div><!-- End .rating-container -->--}}
{{--                        </div><!-- End .product-body -->--}}
{{--                    </div><!-- End .product -->--}}
{{--                </div><!-- End .owl-carousel -->--}}
{{--            </div><!-- End .container -->--}}
        </div><!-- End .page-content -->
    </main><!-- End .main -->


{{--    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <form action="{{ url('/add-rating') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="product_id" value="{{ $products->id }}">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{$products->name}}</h1>--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="rating-css">--}}
{{--                            <div class="star-icon">--}}
{{--                                @if($user_rating)--}}
{{--                                    @for($i =1; $i<= $user_rating->stars_rated; $i++)--}}
{{--                                        <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">--}}
{{--                                        <label for="rating{{$i}}" class="fa fa-star"></label>--}}
{{--                                    @endfor--}}
{{--                                    @for($j = $user_rating->stars_rated+1; $j <=5; $j++)--}}
{{--                                        <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">--}}
{{--                                        <label for="rating{{$j}}" class="fa fa-star"></label>--}}
{{--                                    @endfor--}}
{{--                                @else--}}
{{--                                    <input type="radio" value="1" name="product_rating" checked id="rating1">--}}
{{--                                    <label for="rating1" class="fa fa-star"></label>--}}
{{--                                    <input type="radio" value="2" name="product_rating" id="rating2">--}}
{{--                                    <label for="rating2" class="fa fa-star"></label>--}}
{{--                                    <input type="radio" value="3" name="product_rating" id="rating3">--}}
{{--                                    <label for="rating3" class="fa fa-star"></label>--}}
{{--                                    <input type="radio" value="4" name="product_rating" id="rating4">--}}
{{--                                    <label for="rating4" class="fa fa-star"></label>--}}
{{--                                    <input type="radio" value="5" name="product_rating" id="rating5">--}}
{{--                                    <label for="rating5" class="fa fa-star"></label>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                        <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="py-3 mb-4 shadow-sm bg-warning border-top">--}}
{{--        <div class="container">--}}
{{--            <h6 class="mb-0">--}}
{{--                <a href="{{ url('category') }}">--}}
{{--                    Collection--}}
{{--                </a> /--}}
{{--                <a href="{{ url('category/'.$products->category->slug) }}">--}}
{{--                    {{ $products->category->name }}--}}
{{--                </a> /--}}
{{--                <a href="{{ url('category/'.$products->category->slug.'/'.$products->slug) }}">--}}
{{--                    {{ $products->name }}--}}
{{--                </a>--}}
{{--            </h6>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="container pb-5">--}}
{{--        <div class=" product_data">--}}
{{--            <div class="">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 border-right">--}}
{{--                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h2 class="mb-0">--}}
{{--                            {{ $products->name }}--}}
{{--                            @if($products->trending == '1')--}}
{{--                                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag"> Trending </label>--}}
{{--                            @endif--}}
{{--                        </h2>--}}
{{--                        <hr>--}}
{{--                        <label class="me-3">Original Price : <s> Rs {{ $products->original_price }}</s></label>--}}
{{--                        <label class="fw-bold">Selling Price : Rs {{ $products->selling_price}}</label>--}}
{{--                        @php $ratenum = number_format($rating_value) @endphp--}}
{{--                        <div class="rating">--}}
{{--                            @for($i =1; $i<= $ratenum; $i++)--}}
{{--                                <i class="material-icons checked">star</i>--}}
{{--                            @endfor--}}
{{--                            @for($j = $ratenum+1; $j <=5; $j++)--}}
{{--                                    <i class="material-icons">star</i>--}}
{{--                            @endfor--}}
{{--                            <span>--}}
{{--                                @if($ratings->count() > 0)--}}
{{--                                    {{$ratings->count()}} Ratings--}}
{{--                                @else--}}
{{--                                    No Rating--}}
{{--                                @endif--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <p class="mt-3">--}}
{{--                            {!! $products->small_description !!}--}}
{{--                        </p>--}}
{{--                        <hr>--}}
{{--                        @if($products->qty >0)--}}
{{--                            <label class="badge bg-success">In stock</label>--}}
{{--                        @else--}}
{{--                            <label class="badge bg-danger">Out of stock</label>--}}
{{--                        @endif--}}
{{--                        <div class="row mt-2">--}}
{{--                            <div class="col-md-3">--}}
{{--                                <input type="hidden" value="{{ $products->id }}" class="prod_id">--}}
{{--                                    <label for="Quantity">Quantity</label>--}}
{{--                                    <div class="input-group text-center mb-3">--}}
{{--                                        <button class="input-group-text decrement-btn">-</button>--}}
{{--                                        <input type="text" name="quantity " value="1" class="form-control qty-input text-center"/>--}}
{{--                                        <button class="input-group-text increment-btn">+</button>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-10">--}}
{{--                                <br/>--}}
{{--                                @if($products->qty >0)--}}
{{--                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="material-icons">add_shopping_cart</i> </button>--}}
{{--                                @endif--}}
{{--                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <i class="material-icons">favorite</i> </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <hr>--}}
{{--                        <h3>Description</h3>--}}
{{--                        <p class="mt-3">--}}
{{--                            {!! $products->description !!}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                            Rate this product--}}
{{--                        </button>--}}
{{--                        <a href="{{ url('add-review/'.$products->slug.'/userreview') }}" class="btn btn-primary" >--}}
{{--                            Write a review--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        @foreach($reviews as $item)--}}
{{--                            <div class="user-review">--}}
{{--                                <label for="">{{ $item->user->name .' '.$item->user->lname }}</label>--}}
{{--                                @if($item->user_id == Auth::id())--}}
{{--                                    <a href="{{ url('edit-review/'.$products->slug.'/userreview') }}">edit</a>--}}
{{--                                @endif--}}
{{--                                <br>--}}
{{--                                @php--}}

{{--                                    $rating = App\Models\Rating::where('prod_id',$products->id)->where('user_id',$item->user->id)->first();--}}

{{--                                @endphp--}}
{{--                                @if($rating)--}}
{{--                                    @php $user_rated = $rating->stars_rated @endphp--}}
{{--                                    @for($i =1; $i<= $user_rated; $i++)--}}
{{--                                        <i class="material-icons checked">star</i>--}}
{{--                                    @endfor--}}
{{--                                    @for($j = $user_rated+1; $j <=5; $j++)--}}
{{--                                        <i class="material-icons">star</i>--}}
{{--                                    @endfor--}}
{{--                                @endif--}}
{{--                                <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>--}}
{{--                                <p>--}}
{{--                                    {{ $item->user_review }}--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
