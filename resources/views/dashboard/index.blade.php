@extends('layouts.app')

@section('title', 'Dashboard chính')
@section('page-title', 'Dashboard quản trị')
@section('page-subtitle', 'Theo dõi doanh thu, đơn hàng, tồn kho và hiệu suất hệ thống')

@section('content')
    <div class="welcome-banner mb-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Chào mừng quay lại, {{ auth()->user()->name ?? 'Admin' }} 👋</h2>
                <p>
                    Đây là trung tâm quản lý cửa hàng xe máy. Bạn có thể theo dõi hiệu suất bán hàng,
                    kiểm soát tồn kho và xử lý các giao dịch mới trong ngày.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('orders.create') }}" class="btn btn-light btn-lg rounded-4 px-4">
                    <i class="bi bi-plus-circle me-2"></i>Tạo đơn hàng
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="stat-card bg-primary-soft">
                <div class="icon-box">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <h6>Doanh thu tháng</h6>
                <h3>{{ number_format($monthlyRevenue ?? 0, 0, ',', '.') }}đ</h3>
                <p>Tăng trưởng ổn định so với tháng trước</p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card bg-success-soft">
                <div class="icon-box">
                    <i class="bi bi-receipt"></i>
                </div>
                <h6>Đơn hàng hôm nay</h6>
                <h3>{{ $todayOrders ?? 0 }}</h3>
                <p>Số giao dịch được tạo trong ngày</p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card bg-warning-soft">
                <div class="icon-box">
                    <i class="bi bi-cart-fill"></i>
                </div>
                <h6>Người dùng</h6>
                <h3>{{ $totalUsers ?? 0 }}</h3>
                <p>Tổng số tài khoản trong hệ thống</p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card bg-danger-soft">
                <div class="icon-box">
                    <i class="bi bi-scooter"></i>
                </div>
                <h6>Tồn kho xe máy</h6>
                <h3>{{ $totalMotorcycles ?? 0 }}</h3>
                <p>Số mẫu xe đang được quản lý</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card panel-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="panel-title">Đơn hàng gần đây</h5>
                        <div class="sub-text">Danh sách giao dịch mới nhất trong hệ thống</div>
                    </div>
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-primary rounded-4 px-3">
                        Xem tất cả
                    </a>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-modern align-middle">
                            <thead>
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Khách/User</th>
                                    <th>Ngày tạo</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders ?? [] as $order)
                                    <tr>
                                        <td><strong>#{{ $order->id }}</strong></td>
                                        <td>
                                            {{ $order->user->name ?? $order->customer->full_name ?? 'Người dùng' }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($order->created_at ?? now())->format('d/m/Y') }}
                                        </td>
                                        <td>{{ number_format($order->total_amount ?? 0, 0, ',', '.') }}đ</td>
                                        <td>
                                            @if(($order->status ?? '') === 'completed')
                                                <span class="badge-soft-success">Hoàn thành</span>
                                            @elseif(($order->status ?? '') === 'pending')
                                                <span class="badge-soft-warning">Đang xử lý</span>
                                            @else
                                                <span class="badge-soft-danger">{{ $order->status ?? 'N/A' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            Chưa có đơn hàng nào gần đây.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card panel-card h-100">
                <div class="card-header">
                    <h5 class="panel-title">Thao tác nhanh</h5>
                    <div class="sub-text">Đi tới các chức năng thường dùng</div>
                </div>
                <div class="card-body">
                    <a href="{{ route('motorcycles.create') }}" class="quick-action">
                        <div>
                            <strong>Thêm xe máy mới</strong>
                            <div class="sub-text">Tạo bản ghi xe trong kho</div>
                        </div>
                        <i class="bi bi-plus-circle-fill"></i>
                    </a>

                    <a href="{{ route('cart.index') }}" class="quick-action">
                        <div>
                            <strong>Xem giỏ hàng</strong>
                            <div class="sub-text">Kiểm tra sản phẩm đã chọn</div>
                        </div>
                        <i class="bi bi-cart-fill"></i>
                    </a>

                    <a href="{{ route('orders.create') }}" class="quick-action">
                        <div>
                            <strong>Tạo đơn hàng</strong>
                            <div class="sub-text">Xử lý giao dịch mới</div>
                        </div>
                        <i class="bi bi-bag-plus-fill"></i>
                    </a>

                    <a href="{{ route('payments.create') }}" class="quick-action">
                        <div>
                            <strong>Thêm thanh toán</strong>
                            <div class="sub-text">Cập nhật tình trạng thanh toán</div>
                        </div>
                        <i class="bi bi-wallet2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card panel-card">
                <div class="card-header">
                    <h5 class="panel-title">Xe sắp hết hàng</h5>
                    <div class="sub-text">Những sản phẩm cần nhập thêm sớm</div>
                </div>
                <div class="card-body">
                    @forelse($lowStockMotorcycles ?? [] as $bike)
                        <div class="stock-item">
                            <div class="stock-left">
                                <div class="stock-icon">
                                    <i class="bi bi-scooter"></i>
                                </div>
                                <div>
                                    <div style="font-weight: 700;">{{ $bike->name }}</div>
                                    <div class="sub-text">
                                        {{ $bike->brand->name ?? 'Không rõ hãng' }} • {{ $bike->color ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <div style="font-weight: 800; color: #dc2626;">
                                    {{ $bike->quantity ?? 0 }}
                                </div>
                                <small class="text-muted">còn lại</small>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-3">
                            Không có xe nào sắp hết hàng.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card panel-card">
                <div class="card-header">
                    <h5 class="panel-title">Tổng quan hệ thống</h5>
                    <div class="sub-text">Một số chỉ số quan trọng để theo dõi hoạt động</div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-4 rounded-4" style="background:#eff6ff;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="sub-text">Tài khoản hệ thống</div>
                                        <h4 class="mt-2 mb-1 fw-bold">{{ $totalUsers ?? 0 }}</h4>
                                        <small class="text-muted">Người dùng đang quản lý</small>
                                    </div>
                                    <i class="bi bi-person-badge fs-3 text-primary"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-4 rounded-4" style="background:#ecfdf5;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="sub-text">Thanh toán hoàn tất</div>
                                        <h4 class="mt-2 mb-1 fw-bold">{{ $completedPayments ?? 0 }}</h4>
                                        <small class="text-muted">Giao dịch đã xác nhận</small>
                                    </div>
                                    <i class="bi bi-check2-circle fs-3 text-success"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-4 rounded-4" style="background:#fffbeb;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="sub-text">Đơn chờ xử lý</div>
                                        <h4 class="mt-2 mb-1 fw-bold">{{ $pendingOrders ?? 0 }}</h4>
                                        <small class="text-muted">Cần theo dõi và cập nhật</small>
                                    </div>
                                    <i class="bi bi-hourglass-split fs-3 text-warning"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-4 rounded-4" style="background:#f5f3ff;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="sub-text">Vai trò đang dùng</div>
                                        <h4 class="mt-2 mb-1 fw-bold">{{ $totalRoles ?? 0 }}</h4>
                                        <small class="text-muted">Nhóm quyền trong hệ thống</small>
                                    </div>
                                    <i class="bi bi-shield-check fs-3" style="color:#7c3aed;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 p-4 rounded-4" style="background:#0f172a; color:white;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div>
                                <h5 class="fw-bold mb-1">Hiệu suất vận hành ổn định</h5>
                                <div style="color: rgba(255,255,255,0.7);">
                                    Theo dõi dữ liệu mỗi ngày để ra quyết định nhập hàng và tối ưu doanh thu.
                                </div>
                            </div>
                            <a href="{{ route('orders.index') }}" class="btn btn-light rounded-4 px-4">
                                Xem giao dịch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection