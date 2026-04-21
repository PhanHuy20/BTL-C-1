<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Hiển thị danh sách brand
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    // Form thêm brand
    public function create()
    {
        return view('brands.create');
    }

    // Lưu brand mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Brand::create($request->all());

        return redirect()->route('brands.index')->with('success', 'Thêm brand thành công');
    }

    // Form sửa brand
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    // Cập nhật brand
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $brand->update($request->all());

        return redirect()->route('brands.index')->with('success', 'Cập nhật brand thành công');
    }

    // Xóa brand
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Xóa brand thành công');
    }
}
