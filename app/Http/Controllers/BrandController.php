<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $keyword = trim((string) request('q', ''));

        $brands = Brand::query()
            ->withCount('motorcycles')
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('brands.index', compact('brands', 'keyword'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name'
        ]);

        Brand::create([
            'name' => trim($request->name),
        ]);

        return redirect()->route('brands.index')->with('success', 'Thêm hãng xe thành công.');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id
        ]);

        $brand->update([
            'name' => trim($request->name),
        ]);

        return redirect()->route('brands.index')->with('success', 'Cập nhật hãng xe thành công.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->motorcycles()->exists()) {
            return redirect()
                ->route('brands.index')
                ->with('error', 'Không thể xóa hãng xe này vì đang được gán cho xe máy.');
        }

        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Xóa hãng xe thành công.');
    }
}
