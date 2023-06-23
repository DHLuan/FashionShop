<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <div class="header-menu">
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
                <div class="header-dropdown">
                    <div class="header-menu">

                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>

                            <li><a href="{{ url('wishlist') }}"><i class="icon-heart-o"></i>Sản phẩm mong muốn <span class="badge badge-pill bg-success wishlist-count">0</span></a></li>

                        @guest
                            @if(Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{_('Đăng Nhập')}}</a>
                                </li>
                            @endif

                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{_('Đăng Ký')}}</a>
                                </li>
                            @endif
                            @else
                            <li>
                                <div class="dropdown1">
                                    <i class="icon-user"></i>
                                    <a class="nav-link nut_dropdown" href="#">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="noidung_dropdown">
                                        <a href="{{ route('profile.show') }}">Thông tin cá nhân</a>
                                        <a href="{{ 'my-orders' }}">Đơn hàng cá nhân</a>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{_('Đăng xuất')}}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </div>
                                </div>
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
                            <a href="{{ url('/') }}" >Trang Chủ</a>

                        </li>
                        <li>
                            <a href="{{ url('category') }}" class="sf-with-ul">Danh Mục</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <ul>
                                                        @foreach ($categories as $category)
                                                            <x-category :category="$category" />
                                                        @endforeach
                                                    </ul>
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>
                        <li>

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
                            <a href="{{ url('shop') }}" >Sản Phẩm</a>

                        </li>

                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">

                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form id="search-form-pc" name="halimForm" role="search"
                          action="{{ url('searchproduct') }}" method="GET">
                        @csrf
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input id="timkiem" type="text" class="form-control r" name="search"  placeholder="Search in..." required>
                            <ul class="list-group search-result dropdown-menu" id="result" style="display: none;" ></ul>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="dropdown cart-dropdown">
                    <a href="{{ url('cart') }}" class="dropdown-toggle" role="button" >
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->
