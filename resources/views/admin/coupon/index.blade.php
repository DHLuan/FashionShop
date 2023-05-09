@extends('layouts.admin')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Product</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Product</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">List Product</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">List Coupon</h4>
                            <a href="{{ url('add-coupons')}}" class="btn btn-primary btn-round ml-auto"  style="color: whitesmoke">
                                <i class="fa fa-plus"></i>
                                Add Coupon
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Cart Value</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupon as $cou)
                                        <tr>
                                            <td>{{ $cou->id }}</td>
                                            <td>{{ $cou->code }}</td>
                                            <td>{{ $cou->type }}</td>
                                            @if($cou->type == 'fixed')
                                                <td>${{$cou->value}}</td>
                                            @else
                                                <td>{{$cou->value}}%</td>
                                            @endif
                                            <td>{{ $cou->start_date }}</td>
                                            <td>{{ $cou->end_date }}</td>
                                            <td>{{ $cou->cart_value }}</td>
                                            <td>{{ $cou->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{url('edit-coupons/'.$cou->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{url('delete-coupons/'.$cou->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
