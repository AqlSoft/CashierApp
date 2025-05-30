<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\ItemCategroy;

class CategroiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ItemCategroy::all();
        $tab = 'categroies';
        return view('admin.setting.products.index', compact('categories' ,'tab'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name'  => 'required|string|max:255',
            'cat_breif' => 'nullable|string|max:255',
            'status'    => 'required|in:0,1',
        ]);

        ItemCategroy::create([
            'cat_name'  => $request->cat_name,
            'cat_breif' => $request->cat_breif,
            'status'    => $request->status,
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
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
        $categories = ItemCategroy::all();
        $categoryToEdit = ItemCategroy::findOrFail($id);
        return view('admin.setting.categories.index', compact('categories', 'categoryToEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_name'  => 'required|string|max:255',
            'cat_breif' => 'nullable|string|max:255',
            'status'    => 'required|in:0,1',
        ]);

        $category = ItemCategroy::findOrFail($id);
        $category->update([
            'cat_name'  => $request->cat_name,
            'cat_breif' => $request->cat_breif,
            'status'    => $request->status,
        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ItemCategroy::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
