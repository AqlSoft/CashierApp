<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin;
use App\Models\Setting;


class SalesInvoiceController  extends Controller
{
  /**
   * Show the form for creating a new resource.
   */
  public function create(string $id)
  {
    $order = Order::with('orderItems.product')->findOrFail($id);

    $total_price = 0;

    foreach ($order->orderItems as $item) {

      $total_price += $item->quantity * $item->price;
    }
    // حساب الضريبة والمبلغ الإجمالي
    $vat_rate = 0.15; // نسبة الضريبة (15%)
    $vat_amount = $total_price * $vat_rate;
    $total_amount = $total_price + $vat_amount;

    $vars = [
      'order'            => $order,
      'total_price'    => $total_price,
      'vat_rate'        => $vat_rate,
      'total_amount'   => $total_amount,
    
      'settings'      =>   Setting::all(),
    ];
    return view('admin.invoices.create', $vars);
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
