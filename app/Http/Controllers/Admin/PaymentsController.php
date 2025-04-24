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
        $id = $request->order_id;
        $order = Order::with('orderItems.product', 'customer','orderItems.order')->findOrFail($id);
    
        // حساب المبالغ
        $totalPrice = 0;
        foreach ($order->orderItems as $item) {
            $totalPrice += $item->quantity * $item->price;
        }
    
        $vatAmount = 0.15;
        $totalAmount = $totalPrice + $vatAmount;
    
        try {
            // إنشاء الفاتورة
            $invoice = SalesInvoice::create([
                'order_id' => $id,
                'order_sn' => $order->order_sn,
                'invoice_number' => SalesInvoice::generateNumber(),
                'client_id' => $order->customer_id,
                'invoice_date' => date('Y-m-d'),
                'vat_number' => $order->customer->vat_number,
                'due_date' => date('Y-m-d'),
                'payment_method' => '1',
                'payment_date' => date('Y-m-d'),
                'amount' => $totalPrice,
                'vat_amount' => $vatAmount,
                'total_amount' => $totalAmount,
                'status' => $totalPrice >= $totalAmount ? 1 : 0,
                'type' => 'sales',
                'created_by' => auth()->user()->id,
            ]);
    
            // تحديث أصناف الطلب
            OrderItem::where('order_id', $id)->update([
                'invoice_id' => $invoice->id,
                'updated_at' => now(),
                'updated_by' => auth()->user()->id,
            ]);
    
            // إنشاء الدفع
            $payment = Payment::create([
                'order_id' => $request->order_id,
                'invoice_id' => $invoice->id,
                'payment_method' => '1',
                'payment_date' => now(),
                'status' => 1, // ناجح
                'note' => 'سند سلفة',
                'created_by' => auth()->user()->id,
            ]);
    
            if ($request->delivery_method == '1') {
                $request->validate([
                    'client_phone_number' => 'required',
                ]);
            } else if ($request->delivery_method == '3') {
                $request->validate([
                    'table_number' => 'required',
                ]);
            }

            // تحديث حالة الطلب
            $order->update([
                'status' => '3', // تم الدفع
                'table_number' => $request->table_number ?? null,
                'delivery_method' => $request->delivery_method,
                'client_phone_number' => $request->client_phone_number ?? null,
                'wait_no' => Order::generateValidWaitNo($id, $request->delivery_method),
                // 'wait_no' => Order::generateWaitNo($id),
                'processing_time' =>now(),
                'updated_at' => now(),
                'updated_by' => auth()->user()->id,

            ]);
    
            // إعادة التوجيه مع بيانات الفاتورة
            return redirect()->route('view-invoice', $invoice->id)
                   ->with('success', 'تم الدفع وإنشاء الفاتورة بنجاح.');
    
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
