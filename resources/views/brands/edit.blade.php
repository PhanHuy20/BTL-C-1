@extends('layouts.app')

@section('page-title', 'Cập nhật hãng xe')
@section('page-subtitle', 'Chỉnh sửa thông tin hãng xe')

@section('content')
<div class="card panel-card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="panel-title">Sửa hãng xe</h5>
        <a href="{{ route('brands.index') }}" class="btn btn-outline-secondary btn-sm">Quay lại</a>
    </div>
    <div class="card-body">
        <form action="{{ route('brands.update', $brand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên hãng xe</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $brand->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Cập nhật</button>
            <a href="{{ route('brands.index') }}" class="btn btn-light border">Hủy</a>
        </form>
    </div>
</div>
@endsection
