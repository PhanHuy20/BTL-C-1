@extends('layouts.guest')

@section('title', $motorcycle->name)

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <a href="{{ route('home.motorcycles') }}" class="btn btn-outline-main">← Quay lại danh sách xe</a>
    </div>

    <div class="detail-card">
        <div class="row g-0">
            <div class="col-lg-5">
                <div class="detail-image">
                    🏍
                </div>
            </div>

            <div class="col-lg-7">
                <div class="detail-body">
                    <div class="text-muted mb-2">
                        {{ $motorcycle->brand->name ?? 'Hãng xe' }}
                        •
                        {{ $motorcycle->category->name ?? 'Danh mục' }}
                    </div>

                    <h1 class="detail-title">{{ $motorcycle->name }}</h1>

                    <div class="bike-price mb-4">
                        {{ isset($motorcycle->price) ? number_format($motorcycle->price, 0, ',', '.') . ' VNĐ' : 'Liên hệ' }}
                    </div>

                    <div class="detail-info">
                        <strong>Màu sắc</strong>
                        <span>{{ $motorcycle->color ?? 'Đang cập nhật' }}</span>
                    </div>

                    <div class="detail-info">
                        <strong>Hãng xe</strong>
                        <span>{{ $motorcycle->brand->name ?? 'Đang cập nhật' }}</span>
                    </div>

                    <div class="detail-info">
                        <strong>Loại xe</strong>
                        <span>{{ $motorcycle->category->name ?? 'Đang cập nhật' }}</span>
                    </div>

                    <div class="detail-info">
                        <strong>Mô tả</strong>
                        <span>
                            Đây là mẫu xe phù hợp cho nhu cầu di chuyển hằng ngày, giao diện hiển thị chi tiết
                            giúp người dùng dễ dàng tham khảo thông tin trước khi thực hiện các thao tác tiếp theo.
                        </span>
                    </div>

                    <div class="d-flex flex-wrap gap-3 mt-4">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-main">
                                Đăng nhập để tiếp tục
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-main">
                                Đăng ký tài khoản
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="btn btn-main">
                                Vào dashboard
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection