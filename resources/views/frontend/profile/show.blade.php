@extends('layouts.front')

@section('title')
    Profile
@endsection

@section('content')


    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trang cá nhân</div>

                <div class="card-body">
                    <p><strong>Tên:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>

                <div class="card-footer">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Chỉnh sửa thông tin</a>
                </div>
            </div>
        </div>
    </div>

@endsection
