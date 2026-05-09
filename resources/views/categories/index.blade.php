@extends('layouts.app')

@section('page-title', 'Loại xe')
@section('page-subtitle', 'Quản lý danh mục loại xe')

@section('content')
<div class="card panel-card">
    <div class="card-header d-flex flex-wrap gap-2 align-items-center justify-content-between">
        <h5 class="panel-title">Danh sách loại xe</h5>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Thêm loại xe
        </a>
    </div>

    <div class="card-body">
        <form method="GET" action="{{ route('categories.index') }}" class="row g-2 mb-3">
            <div class="col-md-6">
                <input type="text" name="q" value="{{ $keyword }}" class="form-control" placeholder="Tìm theo tên loại xe...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Đặt lại</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-modern align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên loại xe</th>
                        <th>Số xe đang dùng</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->motorcycles_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa loại xe này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Chưa có dữ liệu loại xe.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
