@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Coupon List</h3>
        </div>
        <div class="card-body">
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
                    <th>Actions</th>
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
                            <a href="{{url('edit-coupons/'.$cou->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('delete-coupons/'.$cou->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
