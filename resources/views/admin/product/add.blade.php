@extends('layouts.admin')

@section('title')
    Add Product
@endsection

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
                    <a href="{{ url('add-products')}}">Add product</a>
                </li>
            </ul>
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Add product</div>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('insert-products') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="exampleFormControlSelect1">Category</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="cate_id">
                                                <option value="">Select a Category</option>
                                                @foreach($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="largeInput">Name</label>
                                            <input type="text" class="form-control form-control" name="name" id="largeInput" >
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="basic-url">Slug</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">http://127.0.0.1:8000/</span>
                                                </div>
                                                <input type="text" class="form-control" name="slug" id="basic-url" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="comment">Small Description</label>
                                            <textarea class="form-control ckeditor" id="comment" rows="5" name="small_description">
											</textarea>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="comment">Description</label>
                                            <textarea class="form-control ckeditor" id="comment" rows="5" name="description">
											</textarea>
                                        </div>
                                        <div class="form-group form-floating-label col-md-6 mb-3">
                                            <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="original_price">
                                            <label for="inputFloatingLabel" class="placeholder">Original Price</label>
                                        </div>
                                        <div class="form-group form-floating-label col-md-6 mb-3">
                                            <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="selling_price">
                                            <label for="inputFloatingLabel" class="placeholder">Selling Price</label>
                                        </div>
                                        <div class="form-group form-floating-label col-md-6 mb-3">
                                            <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="tax">
                                            <label for="inputFloatingLabel" class="placeholder">Tax</label>
                                        </div>
                                        <div class="form-group form-floating-label col-md-6 mb-3">
                                            <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="qty">
                                            <label for="inputFloatingLabel" class="placeholder">Quantity</label>
                                        </div>
                                        <div class="form-check col-md-6 mb-3">
                                            <label class="form-check-label" >
                                                <input class="form-check-input" type="checkbox" name="status">
                                                <span class="form-check-sign">Status</span>
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 mb-3">
                                            <label class="form-check-label" >
                                                <input class="form-check-input" type="checkbox" name="trending">
                                                <span class="form-check-sign">Trending</span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="largeInput">Meta Title</label>
                                            <input type="text" class="form-control form-control" name="meta_title" id="largeInput" >
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="comment">Meta Keywords</label>
                                            <textarea class="form-control ckeditor" id="comment" rows="5" name="meta_keywords">
											</textarea>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="comment">Meta Description</label>
                                            <textarea class="form-control ckeditor" id="comment" rows="5" name="meta_description">
											</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Image</label>
                                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
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

    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection

