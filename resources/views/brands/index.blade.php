@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Brand</h1>
    <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Thêm Brand</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Brand</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Xóa brand này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
