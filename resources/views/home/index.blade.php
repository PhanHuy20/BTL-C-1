@extends('layouts.guest')

@section('title', 'Trang chủ MotoShop')

@section('content')
<div class="container">
    <section class="hero-section">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="hero-badge">Website bán xe máy hiện đại</div>
                <h1 class="hero-title">
                    Khám phá những mẫu xe máy phù hợp với phong cách và nhu cầu của bạn
                </h1>
                <p class="hero-desc">
                    MotoShop mang đến trải nghiệm xem xe, tra cứu thông tin và theo dõi sản phẩm
                    trực quan hơn. Giao diện hiện đại, dữ liệu rõ ràng và dễ tiếp cận cho cả khách hàng lẫn quản trị viên.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('home.motorcycles') }}" class="btn btn-main">
                        Xem danh sách xe
                    </a>

                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline-main">
                            Tạo tài khoản ngay
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-main">
                            Vào dashboard
                        </a>
                    @endguest
                </div>
            </div>

            <div class="col-lg-5">
                <div class="hero-card">
                    <h4 class="fw-bold">Tổng quan hệ thống</h4>
                    <p>
                        Quản lý xe máy, khách hàng, đơn hàng và thanh toán trên một nền tảng đồng bộ.
                    </p>

                    <div class="stat-grid">
                        <div class="mini-stat">
                            <h5>{{ $totalMotorcycles ?? 0 }}</h5>
                            <small>Mẫu xe</small>
                        </div>
                        <div class="mini-stat">
                            <h5>{{ $totalCustomers ?? 0 }}</h5>
                            <small>Khách hàng</small>
                        </div>
                        <div class="mini-stat">
                            <h5>{{ $totalOrders ?? 0 }}</h5>
                            <small>Đơn hàng</small>
                        </div>
                        <div class="mini-stat">
                            <h5>{{ $totalBrands ?? 0 }}</h5>
                            <small>Hãng xe</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="text-center mb-4">
            <h2 class="section-title">Vì sao nên chọn MotoShop?</h2>
            <p class="section-desc">
                Một giao diện rõ ràng, hiện đại và trực quan để quản lý và trải nghiệm mua bán xe máy tốt hơn.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">01</div>
                    <h5>Giao diện trực quan</h5>
                    <p>
                        Thiết kế hiện đại, dễ sử dụng, giúp khách hàng xem xe nhanh và quản trị viên thao tác hiệu quả.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">02</div>
                    <h5>Quản lý dữ liệu tập trung</h5>
                    <p>
                        Hỗ trợ quản lý xe máy, tài khoản, giao dịch và thanh toán trong cùng một hệ thống.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">03</div>
                    <h5>Phù hợp đồ án thực tế</h5>
                    <p>
                        Hệ thống thể hiện rõ mô hình MVC, CRUD và phân quyền, rất phù hợp để trình bày trong báo cáo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
            <div>
                <h2 class="section-title mb-1">Xe nổi bật</h2>
                <p class="section-desc mb-0">
                    Một số mẫu xe đang được hiển thị nổi bật trong hệ thống.
                </p>
            </div>

            <a href="{{ route('home.motorcycles') }}" class="btn btn-outline-main">
                Xem tất cả
            </a>
        </div>

        <div class="row g-4">
            @forelse($featuredMotorcycles as $bike)
                <div class="col-md-6 col-lg-4">
                    <div class="bike-card">
                        <div class="bike-image">
                            🏍
                        </div>

                        <div class="bike-body">
                            <div class="bike-meta">
                                {{ $bike->brand->name ?? 'Hãng xe' }}
                                •
                                {{ $bike->color ?? 'Màu đang cập nhật' }}
                            </div>

                            <div class="bike-name">{{ $bike->name }}</div>

                            <div class="bike-price">
                                {{ isset($bike->price) ? number_format($bike->price, 0, ',', '.') . ' VNĐ' : 'Liên hệ' }}
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('home.motorcycles.show', $bike->id) }}" class="btn btn-main">
                                    Xem chi tiết
                                </a>

                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-outline-main">
                                        Đăng nhập
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="info-card p-4 text-center">
                        Chưa có dữ liệu xe máy để hiển thị.
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <section class="section-space pb-5">
        <div class="cta-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-2">Sẵn sàng trải nghiệm hệ thống?</h2>
                    <p>
                        Đăng nhập hoặc tạo tài khoản để tiếp cận thêm các tính năng quản lý, giao dịch và theo dõi dữ liệu.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-light rounded-4 px-4 me-2">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="btn btn-main">Đăng ký</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-light rounded-4 px-4">Vào dashboard</a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
</div>
@endsection