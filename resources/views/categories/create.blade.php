@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên Category</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Lưu</button>
    </form>
</div>
@endsection
