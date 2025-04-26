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
use App\Models\Table;



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
      return $request;
        $id = $request->order_id;
        $order = Order::with('orderItems.product', 'customer', 'orderItems.order')->findOrFail($id);
    
        // حساب المبالغ
        $totalPrice = 0;
        $time_process = '';
        foreach ($order->orderItems as $item) {
            $totalPrice += $item->quantity * $item->price;
            $time_process = $item->product->processing_time;
        }
    
        $vatAmount = $totalPrice * 0.15;
        $totalAmount = $totalPrice + $vatAmount;
    
        try {
            // التحقق من صحة البيانات حسب طريقة التوصيل
            if ($request->delivery_method == 1) { // Delivery
                $request->validate([
                    'customer_id' => 'required',
                    'delivery_id' => 'required'
                ]);
            } elseif ($request->delivery_method == 2) { // Local
                $request->validate([
                    'table_id' => 'required|exists:tables,id'
                ]);
            }
    
            // إنشاء الفاتورة
            $invoice = SalesInvoice::create([
                'order_id' => $id,
                'order_sn' => $order->order_sn,
                'invoice_number' => SalesInvoice::generateNumber(),
                'client_id' => $order->customer_id,
                'invoice_date' => date('Y-m-d'),
                'vat_number' => $order->customer->vat_number ?? null,
                'due_date' => date('Y-m-d'),
                'payment_method' => '1',
                'payment_date' => date('Y-m-d'),
                'amount' => $totalPrice,
                'vat_amount' => $vatAmount,
                'total_amount' => $totalAmount,
                'status' => 1,
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
                'status' => 1,
                'note' => 'سند سلفة',
                'created_by' => auth()->user()->id,
            ]);
    
            // إعداد بيانات التحديث
            $updateData = [
                'status' => Order::ORDER_PENDING,
                'delivery_method' => $request->delivery_method,
                'wait_no' => Order::generateValidWaitNo($id, $request->delivery_method),
                'processing_time' => $time_process,
                'updated_at' => now(),
                'updated_by' => auth()->id(),
            ];
    
            // إضافة الحقول الخاصة بكل طريقة توصيل
            if ($request->delivery_method == 1) {
                $updateData['delivery_agent_id'] = $request->delivery_id;
                $updateData['customer_id'] = $request->customer_id;
            } elseif ($request->delivery_method == 2) {
                $updateData['table_id'] = $request->table_id;
            }
    
            // تحديث الطلب
            $order->update($updateData);
    
            // تحديث حالة الطاولة إذا كانت الطريقة محلية
            if ($request->delivery_method == 2 && $request->table_id) {
                Table::where('id', $request->table_id)->update(['is_occupied' => true]);
            }
    
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
