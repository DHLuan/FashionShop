@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')



    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container-fluid">
                <h1 class="page-title">Danh Mục<span>Sản Phẩm</span></h1>
            </div><!-- End .container-fluid -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav breadcrumb-with-filter">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh Mục</li>
                </ol>
            </div><!-- End .container-fluid -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="categories-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-8">
                                    @foreach($category->children as $child)
                                        <div class="banner banner-cat banner-badge">
                                            <a href="{{ url('view-category/'.$child->slug) }}">
                                                <img src="{{ asset('assets/uploads/category/'.$child->image) }}" alt="Banner">
                                            </a>

                                            <a class="banner-link" href="{{ url('view-category/'.$child->slug) }}">
                                                <h3 class="banner-title">{{ $child->name }}</h3><!-- End .banner-title -->

                                                <span class="banner-link-text">Xem</span>
                                            </a><!-- End .banner-link -->
                                        </div><!-- End .banner -->
                                    @endforeach
                                </div><!-- End .col-sm-8 -->
                            </div><!-- End .row -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .categories-page -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
