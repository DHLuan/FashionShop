@extends('layouts.front')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chỉnh sửa thông tin</div>

                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="name">Tên:</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu mới:</label>
                                <input type="password" id="password" name="password" class="form-control" minlength="8">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Xác nhận mật khẩu mới:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" minlength="8">
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
