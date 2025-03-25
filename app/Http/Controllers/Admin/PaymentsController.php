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
        $order = Order::find($request->order_id);
        return $order;

        // try {
        //     // all data as array

        //     return redirect()->back('')->with('success', 'تم حفظ البيانات بنجاح.');
        // } catch (\Exception $e) {
        //     return redirect()->back()
        //         ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
        //         ->withInput();
        // }
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
