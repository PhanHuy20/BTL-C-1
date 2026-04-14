<?php

use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Phần của Vi Thế Toàn - Quản lý xe máy [cite: 1, 27]
Route::get('/motorcycles', function () {
    return "Trang danh sách xe máy";
})->name('motorcycles.index');

// Phần của Đỗ Văn Quân - Loại xe & Hồ sơ [cite: 1, 16]
Route::get('/categories', function () {
    return "Trang loại xe";
})->name('categories.index');

Route::get('/profile', function () {
    return "Trang hồ sơ cá nhân";
})->name('user.profile');

// Phần của Hoàng Ngọc Thành - Đơn hàng [cite: 1, 38]
Route::get('/cart', function () {
    return "Trang giỏ hàng";
})->name('orders.cart');

// Phần của Phan Đăng Huy - Xác thực [cite: 1, 3]
Route::get('/login', function () {
    return "Trang đăng nhập";
})->name('login');

Route::get('/register', function () {
    return "Trang đăng ký";
})->name('register');

Route::post('/logout', function () {
    return "Xử lý đăng xuất";
})->name('logout');