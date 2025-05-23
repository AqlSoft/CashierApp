<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Order;
use App\Models\Payment;
use App\Models\SalesInvoice;
use App\Models\OrderItem;
use App\Models\PaymentMethod;

class PaymentMethodsController extends Controller
{

    /**confirmPayment
     * Display a listing of the resource.
     */
    public function index()
    {
        $incoices = SalesInvoice::all();
        $payments = PaymentMethod::all();
        $vars = [
            'incoices' => $incoices,
            'payments' => $payments,
        ];
        return view('admin.setting.payment-methods.index', $vars);
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
    public function cashStore(Request $request, $orderId)
    {
        $order = Order::with(['orderItems.product', 'orderItems.unit', 'orderItems.order', 'customer'])->find($orderId);

        $amount = $order->orderItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // حساب Vat Amount (افترض أن الضريبة 15%)
        $vat_amount = $amount * 0.15;

        // حساب Total Amount
        $total_amount = $amount + $vat_amount;

        try {
            // إنشاء الفاتورة
            $invoice = SalesInvoice::create([
                'order_id' => $orderId,
                'serial_number_order' => $order->serial_number,
                'invoice_number'      => SalesInvoice::generateNumber(),
                'client_id'           => $order->client_id,
                'invoice_date'        => date('Y-m-d'),
                'vat_number'          => $order->customer->vat_number,
                'due_date'            => date('Y-m-d'),
                'payment_method'      => '1',
                'payment_date'        => date('Y-m-d'),
                'amount'              => $amount,
                'vat_amount'          => $vat_amount,
                'total_amount'        => $total_amount,
                'status'              => $amount >= $total_amount ? 1 : 0, // حالة الفاتورة
                'type'                => 'sales',
                'created_by'          => Admin::currentId(),
            ]);

            // update order Items

            // تحديث أصناف الطلب المرتبطة بالطلب
            OrderItem::where('order_id', $orderId)->update([
                'invoice_id' => $invoice->id,
                'updated_at' => now(),
                'updated_by' => Admin::currentId(),
            ]);

            // إنشاء الدفع
            $payment = Payment::create([
                'order_id'          => $orderId,
                'invoice_id'        => $invoice->id,
                'payment_method'    => '1',
                // 'amount_from'       => $request->amount_from,
                // 'amount_to'         => $request->amount_to,
                'payment_date'      => now(),
                'status'            => 1, // ناجح
                // 'from_account'      => $request->account_from, // الحساب الذي تم السحب منه (الخزنة)
                // 'to_account'        => $request->account_to, // الحساب الذي تم الإيداع فيه (الموظف)
                'note'              => 'سند سلفة', // المرجع
                'created_by'        => Admin::currentId(),
            ]);

            // تحديث حالة الطلب
            $order->update([
                'status' => '3',
                'processing_time' => now(),
                'updated_at'     => now(),
                'updated_by' => Admin::currentId(),
            ]); // تم الدفع

            return redirect()->back('')->with('success', 'تم حفظ البيانات بنجاح.');
        } catch (QueryException $e) {
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
