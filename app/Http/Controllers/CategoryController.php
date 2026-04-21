<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị danh sách category
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Form thêm category
    public function create()
    {
        return view('categories.create');
    }

    // Lưu category mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Thêm category thành công');
    }

    // Form sửa category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Cập nhật category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Cập nhật category thành công');
    }

    // Xóa category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa category thành công');
    }
}
