@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Coupons</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-coupons') }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Code</label>
                        <input type="text" class="form-control" name="code">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Type</label>
                        <select type="text" class="form-control" name="type">
                            <option value="">Select type</option>
                            <option value="fixed">Fixed</option>
                            <option value="percent">Percent</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Value</label>
                        <input type="number" class="form-control" name="value">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Start Date</label>
                        <input type="date" name="start_date"  class="form-control ">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">End Date</label>
                        <input type="date" name="end_date"  class="form-control ">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"  name="status">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cart_value">Minimum Cart Value</label>
                        <input type="number" name="cart_value" class="form-control" >
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
