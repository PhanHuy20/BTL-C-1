@extends('layouts.guest')

@section('title', 'Danh sách xe máy')

@section('content')
<div class="container">
    <div class="page-header-box">
        <h1 class="fw-bold mb-2">Danh sách xe máy</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.8);">
            Khám phá các mẫu xe máy hiện có trong hệ thống với thông tin trực quan và rõ ràng.
        </p>
    </div>

    <div class="row g-4 pb-4">
        @forelse($motorcycles as $bike)
            <div class="col-md-6 col-lg-4">
                <div class="bike-card">
                    <div class="bike-image">🏍</div>

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

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('home.motorcycles.show', $bike->id) }}" class="btn btn-main">
                                Xem chi tiết
                            </a>

                            <small class="text-muted">
                                {{ $bike->category->name ?? 'Xe máy' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="info-card p-4 text-center">
                    Chưa có xe máy nào trong hệ thống.
                </div>
            </div>
        @endforelse
    </div>

    <div class="pb-5">
        {{ $motorcycles->links() }}
    </div>
</div>
@endsection