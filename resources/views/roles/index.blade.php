@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Danh sách vai trò</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Thêm vai trò</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên vai trò</th>
                    <th>Mô tả</th>
                    <th width="160">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $roles->links() }}
    </div>
</div>
@endsection