@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-white">Đơn hàng của tôi</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Ngày đặt hàng</th>
                                <th>Mã vận chuyển</th>
                                <th>Tổng tiền</th>
                                <th>Trạng Thái</th>
                                <th>Chi tiết đơn hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td>
                                    <td>
                                        <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">Xem</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
