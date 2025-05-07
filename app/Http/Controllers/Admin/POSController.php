<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\City;
use App\Models\POS;
use App\Models\Region;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posList = POS::latest()->paginate(10);
        $branches = Branch::all();

        return view('admin.pos.index', compact('posList', 'branches'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        POS::create($validated);

        return redirect()->route('display-pos-list')->with('success', 'POS created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function view($id)
    {
        $pos = POS::findOrFail($id);
        return view('admin.pos.view', compact('pos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pos = POS::findOrFail($id);
        return view('admin.pos.edit', compact('pos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:pos,id',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $pos = POS::findOrFail($validated['id']);
        $pos->update($validated);

        return redirect()->route('display-pos-list')->with('success', 'POS updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pos = POS::findOrFail($id);
        $pos->delete();
        return redirect()->route('display-pos-list')->with('success', 'POS deleted successfully');
    }
}
