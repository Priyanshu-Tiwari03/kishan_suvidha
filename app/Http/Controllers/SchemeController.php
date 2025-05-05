<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheme;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    
    
{
    $schemes = Scheme::all(); // 10 schemes per page
    return view('schemes.index', compact('schemes'));
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('schemes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'scheme_title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|string',
        'applying_fee' => 'required|numeric',
        'last_date' => 'required|date',
        'url' => 'required|string',
        'status' => 'required|boolean',
    ]);

    Scheme::create($validated);

    return redirect()->route('schemes.index')->with('success', 'Scheme created successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schemes = Scheme::findOrFail($id);
         return view('schemes.show', compact('schemes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schemes = Scheme::findOrFail($id);
        return view('schemes.edit', compact('schemes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'scheme_title' => 'required',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        'applying_fee' => 'required|numeric',
        'last_date' => 'required|date',
        'status' => 'required|in:active,inactive',
        'url' => 'nullable|url'
        ]);
        $imagePath = $schemes->image;
    if ($request->hasFile('image')) {
    if ($scheme->image && Storage::disk('public')->exists($schemes->image)) {
        Storage::disk('public')->delete($schemes->image);
    }
    $validated['image'] = $request->file('image')->store('schemes', 'public');
}


    $schemes->update([
        'scheme_title' => $request->scheme_title,
        'description' => $request->description,
        'image' => $imagePath,
        'applying_fee' => $request->applying_fee,
        'last_date' => $request->last_date,
        'status' => $request->status,
        'url' => $request->url,
    ]);

    return redirect()->route('schemes.index')->with('success', 'Scheme updated successfully.');
    
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id )
    {
        $schemes = Scheme::findOrFail($id);

        $schemes->delete();
        return redirect()->route('schemes.index')->with('success', 'Scheme deleted successfully.');
    
    }
}
