@extends('layouts.front')

@section('title', "Write a Review" )


@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($verified_purchase->count() > 0)
                            <h5>Bạn đang viết đánh giá cho sản phẩm {{ $product->name }}</h5>
                            <form action="{{ url('/add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Đánh giá của bạn"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Đánh giá</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>Bạn không đủ điều kiện để đánh giá</h5>
                                <p>
                                    Chỉ khách hàng đã mua sản phẩm này mới có thể đánh giá. Mong quý khách thông cảm
                                </p>
                                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Trở về trang chủ</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
