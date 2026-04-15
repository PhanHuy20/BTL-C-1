@extends('layouts.app')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5>Xin chào</h5>
                <p class="mb-0">{{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5>Email</h5>
                <p class="mb-0">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5>Vai trò</h5>
                <p class="mb-0 text-capitalize">{{ auth()->user()->role->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection