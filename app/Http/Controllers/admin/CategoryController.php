<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
       
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $data = $request->only('parent_id', 'name', 'description');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
    }

    // Show single category
    // public function show(Category $category)
    // {
    //     return view('admin.categories.show', compact('category'));
    // }

    // Edit form
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get(); // Apne aap ko parent select na kare
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    // Update data
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $data = $request->only('parent_id', 'name', 'description');

        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            if ($category->image && \Storage::disk('public')->exists($category->image)) {
            \Storage::disk('public')->delete($category->image);
        }
        $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }

    public function export()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
}
