@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Category</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Thêm Category</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Category</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Xóa category này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
