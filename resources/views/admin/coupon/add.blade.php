@extends('layouts.admin')

@section('title')
    Add Coupon
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Add Coupon</h4>
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
                    <a href="#">Coupon</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('add-coupons')}}">Add Coupon</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Coupon</div>
                    <div class="card-body">
                        <form action="{{ url('insert-coupons') }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="largeInput">Code</label>
                                    <input type="text" class="form-control form-control" name="code" id="largeInput" >
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="exampleFormControlSelect1">Type</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                                        <option value="">Select type</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                </div>
                                <div class="form-group form-floating-label col-md-6 mb-3">
                                    <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="value">
                                    <label for="inputFloatingLabel" class="placeholder">Value</label>
                                </div>
                                <div class="form-group form-floating-label col-md-6 mb-3">
                                    <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="qty">
                                    <label for="inputFloatingLabel" class="placeholder">Quantity</label>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label for="largeInput">Start Date</label>
                                    <input type="date" class="form-control form-control" name="start_date" id="largeInput" >
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label for="largeInput">End Date</label>
                                    <input type="date" class="form-control form-control" name="end_date" id="largeInput" >
                                </div>
                                <div class="form-check col-md-6 mb-3">
                                    <label class="form-check-label" >
                                        <input class="form-check-input" type="checkbox" name="status">
                                        <span class="form-check-sign">Status</span>
                                    </label>
                                </div>
                                <div class="form-group form-floating-label col-md-12 mb-3">
                                    <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="cart_value">
                                    <label for="inputFloatingLabel" class="placeholder">Minimum Cart Value</label>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
