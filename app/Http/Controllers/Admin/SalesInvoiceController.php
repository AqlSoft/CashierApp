<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin;
use App\Models\SalesInvoice;
use App\Models\InvoiceItem;

class SalesInvoiceController  extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $order = Order::with(['orderItems.product', 'orderItems.unit', 'orderItems.order'])->find($id);
        $invoices =  SalesInvoice::all();
      
        // accounts
        $accounts = Account::all();
        $amount = $order->orderItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // حساب Vat Amount (افترض أن الضريبة 15%)
        $vatAmount = $amount * 0.15;

        // حساب Total Amount
        $totalAmount = $amount + $vatAmount;
        // create new invoice Number
         $invoiceNumber = SalesInvoice::generateNumber();
        $vars = [
            'accounts'      => $accounts,
            'order'         => $order,
            'status'        => Order::getStatusList(),
            'amount'        => $amount,
            'vatAmount'     => $vatAmount,
            'totalAmount'   => $totalAmount,
            'invoiceNumber' => $invoiceNumber,
            'invoices'    =>$invoices
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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
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
