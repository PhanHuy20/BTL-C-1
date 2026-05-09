<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $keyword = trim((string) request('q', ''));

        $categories = Category::query()
            ->withCount('motorcycles')
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('categories.index', compact('categories', 'keyword'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        Category::create([
            'name' => trim($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'Thêm loại xe thành công.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id
        ]);

        $category->update([
            'name' => trim($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'Cập nhật loại xe thành công.');
    }

    public function destroy(Category $category)
    {
        if ($category->motorcycles()->exists()) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Không thể xóa loại xe này vì đang được gán cho xe máy.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Xóa loại xe thành công.');
    }
}
