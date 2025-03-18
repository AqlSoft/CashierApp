<?php

namespace App\Http\Controllers\Admin;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Order;
use App\Models\Payment;
use App\Models\SalesInvoice;
use App\Models\OrderItem;


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
    public function cashStore(Request $request)
    {
  
        try{
            // إنشاء الدفع
            $payment = Payment::create([
                'order_id'          => $request->order_id,
                // 'invoice_id'        => $invoice->id,
                'payment_method'    => '1',
                // 'amount_from'       => $request->amount_from,
                // 'amount_to'         => $request->amount_to,
                'payment_date'      => now(),
                'status'            => 1, // ناجح
                // 'from_account'      => $request->account_from, // الحساب الذي تم السحب منه (الخزنة)
                // 'to_account'        => $request->account_to, // الحساب الذي تم الإيداع فيه (الموظف)
                'note'              => 'سند سلفة', // المرجع
                'created_by'        => auth()->user()->id,
            ]);

            // تحديث حالة الطلب
            Order::where('id', $request->order_id)->update([
                'status'           => '3',
                'delivery_method'  =>1, //Takeout 
                 'wait_no'         => Order::generateWaitNo($request->order_id), 
                'updated_at'       => now(),
                'updated_by'       => auth()->user()->id,
            ]); // تم الدفع

            return redirect()->route('display-order-all')->with('success', 'تم حفظ البيانات بنجاح.');
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
