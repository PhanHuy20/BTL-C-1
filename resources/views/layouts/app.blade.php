<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hệ thống quản lý bán xe máy')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #111827;
            --sidebar-hover: #1f2937;
            --main-bg: #f3f6fb;
            --card-radius: 18px;
            --soft-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --primary-soft: linear-gradient(135deg, #2563eb, #1d4ed8);
            --success-soft: linear-gradient(135deg, #10b981, #059669);
            --warning-soft: linear-gradient(135deg, #f59e0b, #d97706);
            --danger-soft: linear-gradient(135deg, #ef4444, #dc2626);
            --purple-soft: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: var(--main-bg);
            color: var(--text-dark);
        }

        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 270px;
            background: var(--sidebar-bg);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 24px 16px;
            overflow-y: auto;
            z-index: 1000;
        }

        .brand-box {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 10px 12px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 18px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 8px 20px rgba(59,130,246,0.35);
        }

        .brand-text h4 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
        }

        .brand-text small {
            color: rgba(255,255,255,0.65);
        }

        .menu-title {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.45);
            padding: 10px 12px;
            margin-top: 8px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.88);
            border-radius: 14px;
            padding: 12px 14px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.25s ease;
            font-weight: 500;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: var(--sidebar-hover);
            color: #fff;
            transform: translateX(4px);
        }

        .sidebar .nav-link i {
            font-size: 18px;
            width: 20px;
        }

        .main-content {
            margin-left: 270px;
            width: calc(100% - 270px);
            min-height: 100vh;
        }

        .topbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .topbar .page-info h5 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
        }

        .topbar .page-info small {
            color: var(--text-muted);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #334155;
            cursor: pointer;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 8px 12px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0ea5e9, #2563eb);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .content-area {
            padding: 28px;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
            border-radius: 24px;
            padding: 28px;
            box-shadow: var(--soft-shadow);
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::after {
            content: "";
            position: absolute;
            right: -50px;
            top: -50px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }

        .welcome-banner h2 {
            font-weight: 800;
            margin-bottom: 8px;
        }

        .welcome-banner p {
            margin: 0;
            color: rgba(255,255,255,0.78);
        }

        .stat-card {
            border: none;
            border-radius: var(--card-radius);
            color: white;
            padding: 22px;
            box-shadow: var(--soft-shadow);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            right: -25px;
            bottom: -25px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(255,255,255,0.12);
        }

        .stat-card .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: rgba(255,255,255,0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .stat-card h6 {
            margin: 0;
            font-size: 14px;
            opacity: 0.92;
        }

        .stat-card h3 {
            margin: 8px 0 6px;
            font-size: 28px;
            font-weight: 800;
        }

        .stat-card p {
            margin: 0;
            font-size: 13px;
            opacity: 0.9;
        }

        .bg-primary-soft { background: var(--primary-soft); }
        .bg-success-soft { background: var(--success-soft); }
        .bg-warning-soft { background: var(--warning-soft); }
        .bg-danger-soft  { background: var(--danger-soft); }
        .bg-purple-soft  { background: var(--purple-soft); }

        .panel-card {
            background: white;
            border: none;
            border-radius: 22px;
            box-shadow: var(--soft-shadow);
        }

        .panel-card .card-header {
            background: transparent;
            border-bottom: 1px solid #eef2f7;
            padding: 20px 22px;
        }

        .panel-card .card-body {
            padding: 22px;
        }

        .panel-title {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
        }

        .sub-text {
            color: var(--text-muted);
            font-size: 13px;
        }

        .table-modern {
            margin: 0;
        }

        .table-modern th {
            font-size: 13px;
            color: #64748b;
            font-weight: 700;
            border-bottom: 1px solid #e5e7eb;
            padding: 14px 12px;
            white-space: nowrap;
        }

        .table-modern td {
            padding: 16px 12px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .badge-soft-success {
            background: #dcfce7;
            color: #166534;
            padding: 8px 12px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 12px;
        }

        .badge-soft-warning {
            background: #fef3c7;
            color: #92400e;
            padding: 8px 12px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 12px;
        }

        .badge-soft-danger {
            background: #fee2e2;
            color: #991b1b;
            padding: 8px 12px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 12px;
        }

        .stock-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px dashed #e2e8f0;
        }

        .stock-item:last-child {
            border-bottom: none;
        }

        .stock-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stock-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .quick-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 16px 18px;
            margin-bottom: 12px;
            transition: 0.2s ease;
            text-decoration: none;
            color: inherit;
        }

        .quick-action:hover {
            background: #eef4ff;
            transform: translateY(-2px);
        }

        .quick-action i {
            font-size: 20px;
            color: #2563eb;
        }

        .footer-note {
            color: var(--text-muted);
            text-align: center;
            padding: 18px 0 6px;
            font-size: 13px;
        }

        @media (max-width: 991px) {
            .sidebar {
                position: static;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .app-wrapper {
                flex-direction: column;
            }

            .topbar {
                padding: 14px 16px;
            }

            .content-area {
                padding: 16px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="app-wrapper">
        <aside class="sidebar">
            <div class="brand-box">
                <div class="brand-logo">
                    <i class="bi bi-bicycle"></i>
                </div>
                <div class="brand-text">
                    <h4>Motor Admin</h4>
                    <small>Quản lý bán xe máy</small>
                </div>
            </div>

            <div class="menu-title">Tổng quan</div>
            <nav class="nav flex-column">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </nav>

            <div class="menu-title">Quản lý hệ thống</div>
            <nav class="nav flex-column">
                <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Vai trò</span>
                </a>

                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Tài khoản</span>
                </a>

                <a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                    <i class="bi bi-person-vcard-fill"></i>
                    <span>Khách hàng</span>
                </a>

                <a href="{{ route('motorcycles.index') }}" class="nav-link {{ request()->routeIs('motorcycles.*') ? 'active' : '' }}">
                    <i class="bi bi-scooter"></i>
                    <span>Xe máy</span>
                </a>

                <a href="{{ route('orders.index') }}" class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                    <i class="bi bi-receipt-cutoff"></i>
                    <span>Đơn hàng</span>
                </a>

                <a href="{{ route('payments.index') }}" class="nav-link {{ request()->routeIs('payments.*') ? 'active' : '' }}">
                    <i class="bi bi-credit-card-2-front-fill"></i>
                    <span>Thanh toán</span>
                </a>
            </nav>

            <div class="menu-title">Tài khoản</div>
            <nav class="nav flex-column">
                <a href="#" class="nav-link">
                    <i class="bi bi-person-circle"></i>
                    <span>Hồ sơ cá nhân</span>
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Đăng xuất</span>
                    </button>
                </form>
            </nav>
        </aside>

        <main class="main-content">
            <div class="topbar">
                <div class="page-info">
                    <h5>@yield('page-title', 'Dashboard')</h5>
                    <small>@yield('page-subtitle', 'Tổng quan hoạt động hệ thống')</small>
                </div>

                <div class="topbar-right">
                    <div class="topbar-icon">
                        <i class="bi bi-bell"></i>
                    </div>

                    <div class="topbar-icon">
                        <i class="bi bi-search"></i>
                    </div>

                    <div class="user-box">
                        <div class="user-avatar">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <div>
                            <div style="font-weight: 700; font-size: 14px;">
                                {{ auth()->user()->name ?? 'Người dùng' }}
                            </div>
                            <div style="font-size: 12px; color: #64748b;">
                                {{ auth()->user()->role->name ?? 'staff' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-area">
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm rounded-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger border-0 shadow-sm rounded-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')

                <div class="footer-note">
                    © {{ date('Y') }} Hệ thống quản lý bán xe máy - Laravel MVC
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>