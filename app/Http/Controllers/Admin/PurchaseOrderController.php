<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with(['supplier', 'createdBy'])
            ->latest()
            ->paginate(10);
        
        return view('admin.purchase_orders.index', compact('purchaseOrders'));
    }

    public function create()
    {
        $suppliers = Supplier::where('status', 'active')->get();
        $products = Product::where('status', 'active')->get();
        
        return view('admin.purchase_orders.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required|exists:suppliers,id',
            'order_date' => 'required|date',
            'expected_delivery_date' => 'nullable|date|after_or_equal:order_date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // إنشاء رقم طلب الشراء
            $poNumber = 'PO-' . date('Ymd') . '-' . str_pad(PurchaseOrder::count() + 1, 4, '0', STR_PAD_LEFT);

            // حساب المبالغ
            $totalAmount = 0;
            $taxAmount = 0;
            $discountAmount = 0;

            foreach ($request->items as $item) {
                $totalAmount += $item['quantity'] * $item['unit_price'];
                if (isset($item['tax_percentage'])) {
                    $taxAmount += ($item['quantity'] * $item['unit_price'] * $item['tax_percentage']) / 100;
                }
                if (isset($item['discount_amount'])) {
                    $discountAmount += $item['discount_amount'];
                }
            }

            $finalAmount = $totalAmount + $taxAmount - $discountAmount;

            // إنشاء طلب الشراء
            $purchaseOrder = PurchaseOrder::create([
                'po_number' => $poNumber,
                'supplier_id' => $request->supplier_id,
                'order_date' => $request->order_date,
                'expected_delivery_date' => $request->expected_delivery_date,
                'total_amount' => $totalAmount,
                'tax_amount' => $taxAmount,
                'discount_amount' => $discountAmount,
                'final_amount' => $finalAmount,
                'status' => 'draft',
                'notes' => $request->notes,
                'created_by' => auth()->id()
            ]);

            // إضافة عناصر الطلب
            foreach ($request->items as $item) {
                $itemTaxAmount = isset($item['tax_percentage']) 
                    ? ($item['quantity'] * $item['unit_price'] * $item['tax_percentage']) / 100 
                    : 0;
                
                $itemDiscountAmount = $item['discount_amount'] ?? 0;
                
                $purchaseOrder->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['quantity'] * $item['unit_price'],
                    'tax_percentage' => $item['tax_percentage'] ?? 0,
                    'tax_amount' => $itemTaxAmount,
                    'discount_percentage' => $item['discount_percentage'] ?? 0,
                    'discount_amount' => $itemDiscountAmount,
                    'final_price' => ($item['quantity'] * $item['unit_price']) + $itemTaxAmount - $itemDiscountAmount,
                    'notes' => $item['notes'] ?? null
                ]);
            }

            DB::commit();

            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('success', 'تم إنشاء طلب الشراء بنجاح');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء إنشاء طلب الشراء')
                ->withInput();
        }
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load(['supplier', 'items.product', 'createdBy', 'approvedBy']);
        return view('admin.purchase_orders.show', compact('purchaseOrder'));
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        if (!in_array($purchaseOrder->status, ['draft', 'pending'])) {
            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('error', 'لا يمكن تعديل طلب الشراء في حالته الحالية');
        }

        $suppliers = Supplier::where('status', 'active')->get();
        $products = Product::where('status', 'active')->get();
        
        return view('admin.purchase_orders.edit', compact('purchaseOrder', 'suppliers', 'products'));
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        if (!in_array($purchaseOrder->status, ['draft', 'pending'])) {
            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('error', 'لا يمكن تعديل طلب الشراء في حالته الحالية');
        }

        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required|exists:suppliers,id',
            'order_date' => 'required|date',
            'expected_delivery_date' => 'nullable|date|after_or_equal:order_date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // حساب المبالغ
            $totalAmount = 0;
            $taxAmount = 0;
            $discountAmount = 0;

            foreach ($request->items as $item) {
                $totalAmount += $item['quantity'] * $item['unit_price'];
                if (isset($item['tax_percentage'])) {
                    $taxAmount += ($item['quantity'] * $item['unit_price'] * $item['tax_percentage']) / 100;
                }
                if (isset($item['discount_amount'])) {
                    $discountAmount += $item['discount_amount'];
                }
            }

            $finalAmount = $totalAmount + $taxAmount - $discountAmount;

            // تحديث طلب الشراء
            $purchaseOrder->update([
                'supplier_id' => $request->supplier_id,
                'order_date' => $request->order_date,
                'expected_delivery_date' => $request->expected_delivery_date,
                'total_amount' => $totalAmount,
                'tax_amount' => $taxAmount,
                'discount_amount' => $discountAmount,
                'final_amount' => $finalAmount,
                'notes' => $request->notes
            ]);

            // حذف العناصر القديمة
            $purchaseOrder->items()->delete();

            // إضافة العناصر الجديدة
            foreach ($request->items as $item) {
                $itemTaxAmount = isset($item['tax_percentage']) 
                    ? ($item['quantity'] * $item['unit_price'] * $item['tax_percentage']) / 100 
                    : 0;
                
                $itemDiscountAmount = $item['discount_amount'] ?? 0;
                
                $purchaseOrder->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['quantity'] * $item['unit_price'],
                    'tax_percentage' => $item['tax_percentage'] ?? 0,
                    'tax_amount' => $itemTaxAmount,
                    'discount_percentage' => $item['discount_percentage'] ?? 0,
                    'discount_amount' => $itemDiscountAmount,
                    'final_price' => ($item['quantity'] * $item['unit_price']) + $itemTaxAmount - $itemDiscountAmount,
                    'notes' => $item['notes'] ?? null
                ]);
            }

            DB::commit();

            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('success', 'تم تحديث طلب الشراء بنجاح');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تحديث طلب الشراء')
                ->withInput();
        }
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        if (!in_array($purchaseOrder->status, ['draft', 'pending'])) {
            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('error', 'لا يمكن حذف طلب الشراء في حالته الحالية');
        }

        try {
            DB::beginTransaction();
            
            // حذف عناصر الطلب
            $purchaseOrder->items()->delete();
            
            // حذف الطلب
            $purchaseOrder->delete();

            DB::commit();

            return redirect()->route('admin.purchase-orders.index')
                ->with('success', 'تم حذف طلب الشراء بنجاح');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف طلب الشراء');
        }
    }

    public function approve(PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status !== 'pending') {
            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('error', 'لا يمكن اعتماد طلب الشراء في حالته الحالية');
        }

        $purchaseOrder->update([
            'status' => 'approved',
            'approved_by' => auth()->id()
        ]);

        return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
            ->with('success', 'تم اعتماد طلب الشراء بنجاح');
    }

    public function receive(PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status !== 'approved') {
            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('error', 'لا يمكن استلام طلب الشراء في حالته الحالية');
        }

        try {
            DB::beginTransaction();

            // تحديث حالة الطلب
            $purchaseOrder->update([
                'status' => 'received'
            ]);

            // تحديث المخزون للمنتجات
            foreach ($purchaseOrder->items as $item) {
                $item->product->increment('stock', $item->quantity);
            }

            // تحديث رصيد المورد
            $purchaseOrder->supplier->increment('balance', $purchaseOrder->final_amount);

            DB::commit();

            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('success', 'تم استلام طلب الشراء بنجاح');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء استلام طلب الشراء');
        }
    }

    public function cancel(PurchaseOrder $purchaseOrder)
    {
        if (!in_array($purchaseOrder->status, ['draft', 'pending', 'approved'])) {
            return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
                ->with('error', 'لا يمكن إلغاء طلب الشراء في حالته الحالية');
        }

        $purchaseOrder->update([
            'status' => 'cancelled'
        ]);

        return redirect()->route('admin.purchase-orders.show', $purchaseOrder)
            ->with('success', 'تم إلغاء طلب الشراء بنجاح');
    }
}
