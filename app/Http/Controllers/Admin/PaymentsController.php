<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Order;
use App\Models\Payment;
class PaymentsController
{
    /**confirmPayment
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function cashStore(Request $request , $orderId)
    {
      try {
        // إنشاء الدفع
        $payment = Payment::create([
          'order_id'          => $orderId,
          'payment_method_id' => '1',
          'amount'            => $request->amount,
          'paid'              => $request->paid,
          'remaining'         => $request->remaining,
          'payment_date'      => now(),
          'status'            => 1, // ناجح
          'from_account'      => 1, // الحساب الذي تم السحب منه (الخزنة)
          'to_account'        => 3, // الحساب الذي تم الإيداع فيه (الموظف)
          'reference'         => 'سند سلفة', // المرجع
          'created_by'        => auth()->user()->id,
      ]);

      // تحديث حالة الطلب
      $order = Order::findOrFail($orderId);
      $order->update(['status' => '4']); // تم الدفع
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
    public function show(string $id)
    {
        //
    }

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
