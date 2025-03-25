<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Party;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $clients = Party::where('type', 'customer')->get();
    $vars = [
      'clients' => $clients
    ];
    return view('admin.clients.index', $vars);
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
    try {
      Party::create([
        'vat_number'    => $request->vat_number,
        'name'         => $request->name,
        'phone'        => $request->phone,
        'address'      => $request->address,
        'type'         => 'customer',
        'is_default'   => 0,
        'created_by'   => auth()->user()->id, // المستخدم الحالي
      ]);

      return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح.');
    } catch (\Exception $e) {
      return redirect()->back()
        ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
        ->withInput();
    }
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $client = Party::where('type', 'customer')->find($id);

    if (!$client) {
      return redirect()->back()->withErrors('The Clients is Not Exist ,may be deleted or you have insuffecient privilleges.');
    }
    $vars = [
      'client' => $client
    ];
    return view('admin.clients.show', $vars);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $client = Party::where('type', 'customer')->find($id);
    $vars = [
      'client' => $client,
    ];
    return view('admin.clients.edit', $vars);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $client = Party::where('type', 'customer')->find($request->id);
    try {
      $client->update([
        'vat_number'   => $request->vat_number,
        'name'         => $request->name,
        'phone'        => $request->phone,
        'email '       => $request->email ,
        'address'      => $request->address,
        'type'         => 'customer',
        'is_default'   => 0,
        'updated_by'       => auth()->user()->id
      ]);
      return redirect()->back()->with('success', 'Order Updated successfully');
    } catch (\Exception $e) {
      return  redirect()->back()->withInput()->with('error', 'Error updating Order because of: ' . $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $client = Party::find($id);
    try {
      if (!$client) {
        return redirect()->back()->withError('The client  is not exist, may be deleted or you have insuffecient privilleges to delete it.');
      }
      $client->delete();
      return redirect()->back()->with(['success' => 'client  Removed Successfully']);
    } catch (Exception $err) {
      return redirect()->back()->with(['error' => 'client can not be Removed due to: ' . $err]);
    }
  }
}
