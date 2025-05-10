<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Exports\SubCategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->get(); // make sure category() relation exists in SubCategory model
    return view('admin.sub-categories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
    return view('admin.sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image',
    ]);

    $data = $request->only('name', 'category_id', 'description');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/sub_categories'), $filename);
        $data['image'] = $filename;
    }

    SubCategory::create($data);

    return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $subCategory = SubCategory::findOrFail($id);
    $categories = Category::all(); // Dropdown ke liye

    return view('admin.sub-categories.edit', compact('subCategory', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request->validate([
        'name' => 'required',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image',
    ]);

    $subCategory = SubCategory::findOrFail($id);
    $data = $request->only('name', 'category_id', 'description');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/sub_categories'), $filename);
        $data['image'] = $filename;
    }

    $subCategory->update($data);

    return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);

    // Optional: delete image file from public folder
    if ($subCategory->image && file_exists(public_path('uploads/sub_categories/' . $subCategory->image))) {
        unlink(public_path('uploads/sub_categories/' . $subCategory->image));
    }

    $subCategory->delete();

    return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category deleted successfully.');

    }
    public function export()
{
    return Excel::download(new SubCategoriesExport, 'subcategories.xlsx');
}
}
