<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2563eb, #1e3a8a);
            height: 100vh;
        }
        .login-card {
            width: 420px;
            border-radius: 16px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="card shadow-lg login-card p-4">
        <div class="card-body">
            <h2 class="text-center mb-4">Đăng nhập</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary w-100">Đăng nhập</button>
            </form>

            <div class="text-center mt-3">
                <span>Chưa có tài khoản?</span>
                <a href="{{ route('register') }}">Đăng ký</a>
            </div>

            <div class="mt-3 text-muted small">
                Admin: admin@gmail.com / 123456<br>
                Staff: staff@gmail.com / 123456
            </div>
        </div>
    </div>
</body>
</html>