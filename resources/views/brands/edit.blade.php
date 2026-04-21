@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa Brand</h1>
    <form action="{{ route('brands.update', $brand->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên Brand</label>
            <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
        </div>
        <button class="btn btn-success mt-2">Cập nhật</button>
    </form>
</div>
@endsection
