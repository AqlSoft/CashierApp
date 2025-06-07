<?php

namespace App\Http\Controllers\Admin;


use App\Models\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        
        $tab = 'units';
        return view('admin.setting.products.index', compact('units' ,'tab'));
    }

    public function create()
    {
        return view('admin.setting.units.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'breif' => 'nullable|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'status' => 'required|boolean',
        ]);

        Unit::create([
            'name'       => $request->name,
            'brief'      => $request->brief,
            'short_name' => $request->short_name,
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('display-units-all')->with('success', 'Unit created successfully.');
    }

    public function edit($id)
    {
        $unitToEdit = Unit::findOrFail($id);
        $units = Unit::all();
        $tab = 'units';
        return view('admin.setting.products.index', compact('unitToEdit','units','tab'));
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'brief' => 'nullable|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'status' => 'required|boolean',
        ]);

        $unit->update([
            'name' => $request->name,
            'brief' => $request->brief,
            'short_name' => $request->short_name,
            'status' => $request->status,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('display-units-all')->with('success', 'Unit updated successfully.');
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->route('display-units-all')->with('success', 'Unit deleted successfully.');
    }
}