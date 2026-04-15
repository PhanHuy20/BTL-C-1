@extends('layouts.app')

@section('content')
<h2 class="mb-3">Sửa vai trò</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tên vai trò</label>
                <input type="text" name="name" class="form-control" value="{{ $role->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input type="text" name="description" class="form-control" value="{{ $role->description }}">
            </div>

            <button class="btn btn-success">Cập nhật</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection