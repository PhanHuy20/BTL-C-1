@extends('layouts.auth')

@section('title', 'Đăng ký')
@section('hero_title', 'Tạo tài khoản để bắt đầu trải nghiệm hệ thống')
@section('hero_subtitle', 'Đăng ký nhanh chóng để sử dụng các chức năng quản lý, theo dõi thông tin và thao tác với hệ thống bán xe máy.')

@section('auth_content')
    <h2 class="form-title">Đăng ký tài khoản</h2>
    <p class="form-subtitle">
        Điền đầy đủ thông tin bên dưới để tạo tài khoản mới.
    </p>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                placeholder="Nhập họ tên"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Địa chỉ email</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                placeholder="Nhập email"
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

        <div class="mb-3">
            <label class="form-label">Xác nhận mật khẩu</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Nhập lại mật khẩu"
            >
        </div>

        <button type="submit" class="btn btn-main mt-2">Đăng ký</button>
    </form>

    <div class="form-footer">
        Đã có tài khoản?
        <a href="{{ route('login') }}">Đăng nhập</a>
    </div>

    <div class="hint-box">
        Sau khi đăng ký thành công, hệ thống có thể gán quyền mặc định là <strong>staff</strong>.
    </div>
@endsection