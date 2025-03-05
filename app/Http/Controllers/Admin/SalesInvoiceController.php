<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin;
use App\Models\SalesInvoice;
use App\Models\InvoiceItem;

class SalesInvoiceController  extends Controller
{

  protected static $status = [
    1 => 'New',
    2 => 'In Progress',
    3 => 'Completed',

];
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
      $order=Order::find($id);
        $orderItems = OrderItem::with(['product', 'category', 'unit', 'order'])->get();
        $vars = [
          'orderItems' => $orderItems,
          'order'       => $order ,
          'status'  => static::$status,
    
        ];
        return view('admin.invoices.create', $vars);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // إنشاء الفاتورة
            $invoice = SalesInvoice::create([
                'order_id'            => $request->order,
                'serial_number_order' => $request->serial_number,
                'client_id'           => $request->client_id,  
                'invoice_number'      => $request->invoice_number,
                'invoice_date'        => $request->invoice_date,
                'vat_number'          => $request->vat_number,
                'due_date'            => $request->due_date,
                'payment_date'        => $request->payment_date,
                'invoice_total'       => $request->invoice_total,
                'vat_amount'          => $request->vat_amount,
                'amount'              => $request->amount,
                'total_amount'        => $request->total_amount,
                'status'              => $request->amount >= $request->total_amount ? 1 : 0, // حالة الفاتورة
                'created_by'          => auth()->user()->id,
            ]);
    
            // جلب أصناف الطلب المرتبطة بالطلب
            $orderItems = OrderItem::where('order_id', $request->order)
                ->with(['product', 'category', 'unit'])
                ->get();
    
            // التأكد من وجود أصناف
            if ($orderItems->isEmpty()) {
                return redirect()->back()
                    ->with('error', 'لا توجد أصناف في الطلب.')
                    ->withInput();
            }
    
            // إضافة أصناف الفاتورة
            foreach ($orderItems as $item) {
              InvoiceItem::create([
                    'category_id' => $item->category_id,
                    'product_id'  => $item->product_id,
                    'invoice_id' => $invoice->id,
                    'quantity'    => $item->quantity,
                    'unit_id'    => $item->unit_id,
                    'price'       => $item->price,
                    'type'       => 'sales',
                    'notes'      => $item->notes,
                    'created_by' => auth()->user()->id,
                ]);
            }
    
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
