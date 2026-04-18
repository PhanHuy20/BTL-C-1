@extends('layouts.auth')

@section('title', 'Đăng nhập')
@section('hero_title', 'Đăng nhập để tiếp tục quản lý hệ thống')
@section('hero_subtitle', 'Truy cập khu vực quản trị, theo dõi dữ liệu kinh doanh và xử lý các giao dịch nhanh chóng.')

@section('auth_content')
    <h2 class="form-title">Đăng nhập</h2>
    <p class="form-subtitle">
        Chào mừng bạn quay lại. Vui lòng nhập thông tin tài khoản để tiếp tục.
    </p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Địa chỉ email</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                placeholder="Nhập email của bạn"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Nhập mật khẩu"
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-main mt-2">Đăng nhập</button>
    </form>

    <div class="form-footer">
        Chưa có tài khoản?
        <a href="{{ route('register') }}">Đăng ký ngay</a>
    </div>

    <div class="hint-box">
        <strong>Tài khoản mẫu:</strong><br>
        Admin: admin@gmail.com / 123456<br>
        Staff: staff@gmail.com / 123456
    </div>
@endsection