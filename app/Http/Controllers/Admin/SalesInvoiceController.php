<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\SalesInvoice;
use App\Models\Admin;
use App\Models\Setting;


class SalesInvoiceController  extends Controller
{
  /**
   * Show the form for creating a new resource.
   */
  public function view(string $id)
  {

    $invoice = SalesInvoice::with('order.orderItems.product', 'customer')->findOrFail($id);

    $vars = [
      'invoice'        => $invoice,
      'settings'       => Setting::all(),
    ];
    return view('admin.invoices.view', $vars);
  }


  public function printInvoice($id)
  {

    // البحث عن الفاتورة باستخدام المعرف
    // $invoice = SalesInvoice::findOrFail($id);

    return view('admin.invoices.print');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {}

  /**
   * Display the specified resource.
   */
  public function show(string $id) {}

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
