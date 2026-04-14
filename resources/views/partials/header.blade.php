<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>Motorcycle Store</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex mx-auto" action="{{ route('motorcycles.index') }}" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm xe..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Tìm</button>
            </form>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Loại xe</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ route('orders.cart') }}">
                        <i class="bi bi-cart"></i> Giỏ hàng
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                    </a>
                </li>

                @guest
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Đăng ký</a>
                    </li>
                @else
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="{{ Auth::user()->profile_image ?? asset('images/default-avatar.png') }}" 
                                 alt="Avatar" class="rounded-circle me-2" width="30" height="30">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Hồ sơ của tôi</a></li>
                            
                            @if(Auth::user()->role === 'admin')
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-primary" href="{{ url('/admin') }}">Trang quản trị</a></li>
                            @endif
                            
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>