<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">Usd</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Eur</a></li>
                            <li><a href="#">Usd</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->

                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                            <li><a href="{{ url('wishlist') }}"><i class="icon-heart-o"></i>My Wishlist <span class="badge badge-pill bg-success wishlist-count">0</span></a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
{{--                            <li><a href="{{_('Login')}}" data-toggle="modal"><i class="icon-user"></i>Login</a></li>--}}
                        @guest
                            @if(Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{_('Login')}}</a>
                                </li>
                            @endif

                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{_('Register')}}</a>
                                </li>
                            @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-user"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                My Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{_('logout')}}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{asset('user/assets/images/logo.png')}}" alt="Molla Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{ url('/') }}" >Home</a>

                        </li>
                        <li>
                            <a href="{{ url('category') }}" class="sf-with-ul">Category</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @foreach($categories as $cate)
                                                        <div class="menu-title">{{ $cate->name }}</div><!-- End .menu-title -->
                                                        @foreach($cate->children as $category)
                                                            <ul>
                                                                <li><a href="category-list.html" value="{{ $category->id }}">{{ $category->name }}</a></li>
        {{--                                                        <li><a href="category-2cols.html">Aser</a></li>--}}
        {{--                                                        <li><a href="category.html">MSI</a></li>--}}
        {{--                                                        <li><a href="category-4cols.html">lENOVO</a></li>--}}
        {{--                                                        <li><a href="category-market.html">HP</a></li>--}}
        {{--                                                        <li><a href="category-market.html">DELL</a></li>--}}
        {{--                                                        <li><a href="category-market.html">Apple</a></li>--}}
                                                            </ul>
                                                        @endforeach
                                                    @endforeach

                                                    <div class="menu-title">Ghế bàn</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="cart.html">Ghế Gaming</a></li>
                                                        <li><a href="checkout.html">bàn Gaming</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="menu-title">Linh kiện PC</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="product-category-boxed.html">VGA</a></li>
                                                        <li><a href="product-category-fullwidth.html">CPU</a></li>
                                                        <li><a href="product-category-fullwidth.html">MainBoard</a></li>
                                                        <li><a href="product-category-fullwidth.html">Ram</a></li>
                                                        <li><a href="product-category-fullwidth.html">SSD-HDD</a></li>
                                                        <li><a href="product-category-fullwidth.html">Case</a></li>
                                                        <li><a href="product-category-fullwidth.html">PSU</a></li>

                                                    </ul>

                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->

                                    <div class="col-md-4">
                                        <div class="banner banner-overlay">
                                            <a href="category.html" class="banner banner-menu">
                                                <img src="{{asset('user/assets/images/menu/a1.jpg')}}" alt="Banner">

                                                <div class="banner-content banner-content-top">
                                                    <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner banner-overlay -->
                                    </div><!-- End .col-md-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>

                        <li>
                            <a href="#" class="sf-with-ul">Pages</a>

                            <ul>
                                <li>
                                    <a href="about.html" >About</a>

                                </li>
                                <li>
                                    <a href="contact.html" >Contact</a>

                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('shop') }}" >shop</a>

                        </li>

                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="{{ url('searchproduct') }}" method="POST">
                        @csrf
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" id="search_product" name="product_name"   placeholder="Search in..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="dropdown cart-dropdown">
                    <a href="{{ url('cart') }}" class="dropdown-toggle" role="button" {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"--}}>
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>

{{--                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                        <div class="dropdown-cart-products">--}}
{{--                            <div class="product">--}}
{{--                                <div class="product-cart-details">--}}
{{--                                    <h4 class="product-title">--}}
{{--                                        <a href="product.html">Beige knitted elastic runner shoes</a>--}}
{{--                                    </h4>--}}

{{--                                    <span class="cart-product-info">--}}
{{--                                                <span class="cart-product-qty">1</span>--}}
{{--                                                x $84.00--}}
{{--                                            </span>--}}
{{--                                </div><!-- End .product-cart-details -->--}}

{{--                                <figure class="product-image-container">--}}
{{--                                    <a href="product.html" class="product-image">--}}
{{--                                        <img src="assets/images/products/cart/product-1.jpg" alt="product">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>--}}
{{--                            </div><!-- End .product -->--}}

{{--                            <div class="product">--}}
{{--                                <div class="product-cart-details">--}}
{{--                                    <h4 class="product-title">--}}
{{--                                        <a href="product.html">Blue utility pinafore denim dress</a>--}}
{{--                                    </h4>--}}

{{--                                    <span class="cart-product-info">--}}
{{--                                                <span class="cart-product-qty">1</span>--}}
{{--                                                x $76.00--}}
{{--                                            </span>--}}
{{--                                </div><!-- End .product-cart-details -->--}}

{{--                                <figure class="product-image-container">--}}
{{--                                    <a href="product.html" class="product-image">--}}
{{--                                        <img src="assets/images/products/cart/product-2.jpg" alt="product">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>--}}
{{--                            </div><!-- End .product -->--}}
{{--                        </div><!-- End .cart-product -->--}}

{{--                        <div class="dropdown-cart-total">--}}
{{--                            <span>Total</span>--}}

{{--                            <span class="cart-total-price">$160.00</span>--}}
{{--                        </div><!-- End .dropdown-cart-total -->--}}

{{--                        <div class="dropdown-cart-action">--}}
{{--                            <a href="cart.html" class="btn btn-primary">View Cart</a>--}}
{{--                            <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>--}}
{{--                        </div><!-- End .dropdown-cart-total -->--}}
{{--                    </div><!-- End .dropdown-menu -->--}}
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->
