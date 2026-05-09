@extends('layouts.app')

@section('page-title', 'Hãng xe')
@section('page-subtitle', 'Quản lý danh mục hãng xe')

@section('content')
<div class="card panel-card">
    <div class="card-header d-flex flex-wrap gap-2 align-items-center justify-content-between">
        <h5 class="panel-title">Danh sách hãng xe</h5>
        <a href="{{ route('brands.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Thêm hãng xe
        </a>
    </div>

    <div class="card-body">
        <form method="GET" action="{{ route('brands.index') }}" class="row g-2 mb-3">
            <div class="col-md-6">
                <input type="text" name="q" value="{{ $keyword }}" class="form-control" placeholder="Tìm theo tên hãng xe...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
                <a href="{{ route('brands.index') }}" class="btn btn-outline-secondary">Đặt lại</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-modern align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên hãng xe</th>
                        <th>Số xe đang dùng</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->motorcycles_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa hãng xe này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Chưa có dữ liệu hãng xe.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $brands->links() }}
        </div>
    </div>
</div>
@endsection
