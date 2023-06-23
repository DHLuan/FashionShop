
@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Xem đơn hàng
                            <a href="{{ url('my-orders') }}" class="btn btn-warning float-end">Quay về</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <label for="">Họ</label>
                                <div class="border ">{{ $orders->fname }}</div>
                                <label for="">Tên</label>
                                <div class="border ">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>
                                <label for="">Số điện thoại</label>
                                <div class="border ">{{ $orders->phone }}</div>
                                <label for="">Địa chỉ giao hàng</label>
                                <div class="border ">
                                    {{ $orders->address1 }}, <br>
                                    {{ $orders->address2 }}, <br>
                                    {{ $orders->city }}, <br>
                                    {{ $orders->state }},
                                    {{ $orders->country }}
                                </div>
                                <label for="">Mã zip</label>
                                <div class="border ">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Chi tiết đơn hàng</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Hình sản phẩm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/products/' .$item->products->image)}}" width="50px" alt="Product Image">
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>

                                    </tr>
                                    </tbody>
                                </table>
                                <h4 class="px-2">Tổng tính: <span class="float-end"> {{ $orders->total_price }} </span></h4>
                                <h6 class="px-2">Cách thanh toán:  {{ $orders->payment_mode }} </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
