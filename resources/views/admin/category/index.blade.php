@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Category</h4>
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
                    <a href="#">Category</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">List Category</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">List Category</h4>
                            <a href="{{ url('add-category')}}" class="btn btn-primary btn-round ml-auto" style="color: whitesmoke">
                                <i class="fa fa-plus"></i>
                                Add Category
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="cate-image" style="height: 100px; width: 100px" alt="Image here">
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{url('edit-prod/'.$item->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{url('delete-category/'.$item->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
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
