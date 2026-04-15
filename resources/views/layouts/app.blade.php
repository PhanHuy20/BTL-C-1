<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tài khoản và phân quyền</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fb;
        }
        .sidebar {
            min-height: 100vh;
            background: #1f2937;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 12px 16px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #374151;
        }
        .content {
            padding: 20px;
        }
        .navbar-top {
            background: white;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-white text-center py-3 border-bottom">ADMIN PANEL</h4>
            <a href="{{ route('dashboard') }}">Dashboard</a>

            @auth
                @if(auth()->user()->role->name === 'admin')
                    <a href="{{ route('roles.index') }}">Vai trò</a>
                    <a href="{{ route('users.index') }}">Tài khoản</a>
                @endif
            @endauth
        </div>

        <div class="col-md-10 p-0">
            <div class="navbar-top d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <strong>Hệ thống quản lý bán xe máy</strong>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span>{{ auth()->user()->name ?? '' }}</span>
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Đăng xuất</button>
                    </form>
                    @endauth
                </div>
            </div>

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>