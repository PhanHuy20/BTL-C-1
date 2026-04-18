<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tài khoản người dùng')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --dark-bg: #0f172a;
            --soft-bg: #f8fafc;
            --text-muted: #64748b;
            --card-radius: 24px;
            --soft-shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37,99,235,0.10), transparent 35%),
                radial-gradient(circle at bottom right, rgba(15,23,42,0.10), transparent 35%),
                #f1f5f9;
            min-height: 100vh;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .auth-container {
            width: 100%;
            max-width: 1180px;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--soft-shadow);
        }

        .auth-left {
            background: linear-gradient(135deg, #0f172a, #1e293b, #2563eb);
            color: white;
            padding: 48px 42px;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .auth-left::before {
            content: "";
            position: absolute;
            top: -80px;
            right: -60px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
        }

        .auth-left::after {
            content: "";
            position: absolute;
            bottom: -100px;
            left: -70px;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.16);
            border-radius: 999px;
            padding: 10px 16px;
            margin-bottom: 28px;
            position: relative;
            z-index: 2;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 700;
        }

        .auth-left h1 {
            font-size: 36px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 16px;
            position: relative;
            z-index: 2;
        }

        .auth-left p {
            color: rgba(255,255,255,0.82);
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 28px;
            position: relative;
            z-index: 2;
        }

        .feature-list {
            position: relative;
            z-index: 2;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 18px;
        }

        .feature-check {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            background: rgba(255,255,255,0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        .feature-item h6 {
            margin: 0 0 4px;
            font-weight: 700;
            font-size: 15px;
        }

        .feature-item small {
            color: rgba(255,255,255,0.72);
        }

        .auth-right {
            padding: 48px 40px;
            background: white;
        }

        .top-back {
            margin-bottom: 20px;
        }

        .top-back a {
            text-decoration: none;
            color: #334155;
            font-weight: 600;
        }

        .form-title {
            font-size: 30px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 14px;
            padding: 13px 15px;
            border: 1px solid #dbe3ee;
            min-height: 52px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(37,99,235,0.12);
            border-color: var(--primary-color);
        }

        .btn-main {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            color: white;
            border-radius: 14px;
            padding: 13px 18px;
            min-height: 52px;
            font-weight: 700;
            width: 100%;
        }

        .btn-main:hover {
            color: white;
            opacity: 0.96;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: var(--text-muted);
        }

        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
        }

        .hint-box {
            margin-top: 22px;
            padding: 15px 16px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 14px;
        }

        .alert {
            border-radius: 14px;
        }

        @media (max-width: 991px) {
            .auth-left {
                padding: 34px 28px;
            }

            .auth-right {
                padding: 34px 26px;
            }

            .auth-left h1 {
                font-size: 28px;
            }

            .form-title {
                font-size: 26px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="auth-left">
                        <div class="brand-badge">
                            <div class="brand-icon">M</div>
                            <div>
                                <strong>MotoShop</strong><br>
                                <small>Website bán xe máy</small>
                            </div>
                        </div>

                        <h1>@yield('hero_title', 'Nền tảng quản lý và bán xe máy hiện đại')</h1>
                        <p>
                            @yield('hero_subtitle', 'Trải nghiệm hệ thống được thiết kế tối ưu cho quản lý cửa hàng, theo dõi đơn hàng và hỗ trợ khách hàng hiệu quả hơn.')
                        </p>

                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="feature-check">✓</div>
                                <div>
                                    <h6>Giao diện hiện đại</h6>
                                    <small>Dễ sử dụng, trực quan và đồng bộ trên nhiều màn hình.</small>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-check">✓</div>
                                <div>
                                    <h6>Quản lý đơn hàng rõ ràng</h6>
                                    <small>Theo dõi giao dịch, thông tin xe máy và trạng thái thanh toán.</small>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-check">✓</div>
                                <div>
                                    <h6>Phân quyền người dùng</h6>
                                    <small>Hỗ trợ tài khoản quản trị và nhân viên theo từng chức năng.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="auth-right">
                        <div class="top-back">
                            <a href="{{ route('home') }}">← Quay về trang chủ</a>
                        </div>

                        @yield('auth_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>