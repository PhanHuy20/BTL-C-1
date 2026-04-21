@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên Category</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-success mt-2">Cập nhật</button>
    </form>
</div>
@endsection
