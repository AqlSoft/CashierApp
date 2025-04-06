<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\MonyBox;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MonyBoxesController  
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       $m_boxes= MonyBox::all();
       $vars=[
        'm_boxes'   =>$m_boxes,
       ];
        return view('admin.monyboxes.index' ,$vars);
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
      try{
        // إنشاء الشفت الجديد
        MonyBox::create([
          'name'               => $request->name,
          'last_isal_exhcange' => $request->last_isal_exhcange,
          'opening_balance'    => $request->opening_balance,
          'last_isal_collect'  => $request->last_isal_collect,
          'date'               => $request->date,
          'status'             => true,
          'created_by' => auth()->user()->id,
      ]);

      return redirect()->back()
          ->with('success', 'تم إنشاء خزنه بنجاح.');

  } catch (\Exception $e) {
      return redirect()->back()
          ->with('error', 'حدث خطأ: ' . $e->getMessage())
          ->withInput();
  }
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
      $m_box= MonyBox::find($id);
      $vars=[
       'm_box'   =>$m_box,
      ];
       return view('admin.monyboxes.edit' ,$vars);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MonyBox $monyBox): RedirectResponse
    {
      $monyBox->update([
           'name'              => $request->name,
          'last_isal_exhcange' => $request->last_isal_exhcange,
          'opening_balance'    => $request->opening_balance,
          'last_isal_collect'  => $request->last_isal_collect,
          'date'               => $request->date,
        'updated_by' => auth()->user()->id
    ]);

    return redirect()->back()->with('success', 'Shift updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonyBox $monyBox): RedirectResponse
    {
        $monyBox->delete();
        return redirect()->back()->with('success', 'MonyBox deleted successfully');
    }
}
