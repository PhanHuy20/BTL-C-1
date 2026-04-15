@extends('layouts.app')

@section('content')
<h2 class="mb-3">Thêm vai trò</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tên vai trò</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input type="text" name="description" class="form-control">
            </div>

            <button class="btn btn-success">Lưu</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection