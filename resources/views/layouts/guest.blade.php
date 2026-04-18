<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MotoShop')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --dark-bg: #0f172a;
            --soft-bg: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --card-radius: 24px;
            --soft-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37,99,235,0.08), transparent 30%),
                radial-gradient(circle at bottom right, rgba(15,23,42,0.08), transparent 30%),
                #f8fafc;
            color: var(--text-dark);
        }

        .navbar-custom {
            background: rgba(255,255,255,0.86);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(226,232,240,0.9);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 24px;
            color: var(--dark-bg) !important;
        }

        .nav-link {
            font-weight: 600;
            color: #334155 !important;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 14px;
            padding: 10px 18px;
            font-weight: 700;
        }

        .btn-main:hover {
            color: white;
            opacity: 0.96;
        }

        .btn-outline-main {
            border: 1px solid #cbd5e1;
            color: #1e293b;
            border-radius: 14px;
            padding: 10px 18px;
            font-weight: 700;
            background: white;
        }

        .btn-outline-main:hover {
            background: #f8fafc;
        }

        .hero-section {
            padding: 80px 0 50px;
        }

        .hero-badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            font-weight: 700;
            font-size: 14px;
            padding: 10px 16px;
            border-radius: 999px;
            margin-bottom: 18px;
        }

        .hero-title {
            font-size: 52px;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .hero-desc {
            font-size: 17px;
            line-height: 1.8;
            color: var(--text-muted);
            margin-bottom: 28px;
            max-width: 620px;
        }

        .hero-card {
            background: linear-gradient(135deg, #0f172a, #1e293b, #2563eb);
            color: white;
            border-radius: 30px;
            padding: 32px;
            box-shadow: var(--soft-shadow);
            min-height: 100%;
            position: relative;
            overflow: hidden;
        }

        .hero-card::before {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            top: -70px;
            right: -70px;
        }

        .hero-card::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            bottom: -60px;
            left: -40px;
        }

        .hero-card h4,
        .hero-card p,
        .hero-card .stat-grid {
            position: relative;
            z-index: 2;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-top: 22px;
        }

        .mini-stat {
            background: rgba(255,255,255,0.12);
            border-radius: 18px;
            padding: 18px;
        }

        .mini-stat h5 {
            margin: 0;
            font-weight: 800;
            font-size: 24px;
        }

        .mini-stat small {
            color: rgba(255,255,255,0.8);
        }

        .section-space {
            padding: 30px 0 20px;
        }

        .section-title {
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .section-desc {
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        .feature-card,
        .bike-card,
        .info-card {
            background: white;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: var(--soft-shadow);
        }

        .feature-card {
            padding: 26px;
            height: 100%;
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .feature-card h5 {
            font-weight: 800;
            margin-bottom: 10px;
        }

        .feature-card p {
            margin: 0;
            color: var(--text-muted);
            line-height: 1.75;
        }

        .bike-card {
            overflow: hidden;
            height: 100%;
            transition: 0.25s ease;
        }

        .bike-card:hover {
            transform: translateY(-6px);
        }

        .bike-image {
            height: 220px;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
            color: #1d4ed8;
            font-weight: 800;
        }

        .bike-body {
            padding: 22px;
        }

        .bike-meta {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .bike-name {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .bike-price {
            color: #dc2626;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .cta-box {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
            border-radius: 30px;
            padding: 36px;
            box-shadow: var(--soft-shadow);
        }

        .cta-box p {
            color: rgba(255,255,255,0.78);
            margin-bottom: 0;
        }

        .footer-custom {
            margin-top: 50px;
            padding: 30px 0;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            text-align: center;
        }

        .page-header-box {
            background: linear-gradient(135deg, #0f172a, #1e293b, #2563eb);
            color: white;
            padding: 46px 36px;
            border-radius: 28px;
            margin: 36px 0 30px;
            box-shadow: var(--soft-shadow);
        }

        .detail-card {
            background: white;
            border-radius: 28px;
            border: 1px solid #e2e8f0;
            box-shadow: var(--soft-shadow);
            overflow: hidden;
        }

        .detail-image {
            min-height: 420px;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 110px;
            color: #1d4ed8;
            font-weight: 800;
        }

        .detail-body {
            padding: 34px;
        }

        .detail-title {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .detail-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 16px 18px;
            margin-bottom: 14px;
        }

        .detail-info strong {
            display: block;
            margin-bottom: 4px;
            color: #0f172a;
        }

        @media (max-width: 991px) {
            .hero-title {
                font-size: 38px;
            }

            .hero-section {
                padding: 50px 0 30px;
            }

            .detail-image {
                min-height: 260px;
                font-size: 76px;
            }

            .detail-title {
                font-size: 28px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">MotoShop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGuest">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarGuest">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.motorcycles') }}">Xe máy</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-main ms-lg-2">Đăng xuất</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-main ms-lg-2" href="{{ route('login') }}">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-main ms-lg-2" href="{{ route('register') }}">Đăng ký</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-custom">
        <div class="container">
            © {{ date('Y') }} MotoShop - Website quản lý và bán xe máy bằng Laravel MVC
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>