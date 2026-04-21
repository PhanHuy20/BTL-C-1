@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm Brand</h1>
    <form action="{{ route('brands.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên Brand</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Lưu</button>
    </form>
</div>
@endsection
