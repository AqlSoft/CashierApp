<?php

namespace App\Http\Controllers\admin;

use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin;
use App\Models\Product;
use App\Models\ItemCategroy;

class OrdersItemsController extends Controller
{

  
  public function index() {}


public function create(string $id)
    {
        
        $order = Order::with('orderItems.product')->findOrFail($id);  

        // حساب الكميات والمبالغ
        $quantities = [];
        $totalPrice = 0;

        foreach ($order->orderItems as $item) {
            $quantities[$item->product_id] = $item->quantity;
            $totalPrice += $item->quantity * $item->price;
        }

        // حساب الضريبة والمبلغ الإجمالي
        $vatRate = 0.15; // نسبة الضريبة (15%)
        $vatAmount = $totalPrice * $vatRate;
        $totalAmount = $totalPrice + $vatAmount;

        // البيانات المرسلة إلى الواجهة
        $vars = [
            'order'       => $order,
            'products'    => Product::all(),
            'categories'  => ItemCategroy::all(),
            'Ois'         => OrderItem::where('order_id', $id)->pluck('product_id')->toArray(),
            'quantities'  => $quantities,
            'totalPrice'  => $totalPrice,
            'vatAmount'   => $vatAmount,
            'totalAmount' => $totalAmount,
            'remaining'   => $totalAmount, // المبلغ المتبقي
            'status'      => Order::getStatusList(),
        ];

        return view('admin.orderitem.create', $vars);
    }



  // حفظ  عناصر الطلب الجديد
  public function store(Request $request, $orderId)
  {
    
      // التحقق من وجود المنتج
      $product = Product::findOrFail($request->product_id);

      // التحقق من وجود المنتج في الطلب مسبقًا
      $existingOrderItem = OrderItem::where([
          'order_id' => $orderId,
          'product_id' => $product->id,
      ])->first();

      if ($existingOrderItem) {
          // زيادة الكمية إذا كان المنتج موجودًا مسبقًا
          $existingOrderItem->increment('quantity');
          return redirect()->back()->with('success', 'تم تحديث الكمية بنجاح.');
      }  else {
           // إنشاء عنصر طلب جديد
      try {
        OrderItem::create([
          'order_id'    => $request->order_id,
          'product_id'  => $product->id,
          'category_id' => $product->category_id,
          'unit_id'   => $product->unit_id,
          'quantity'    => 1,
          'price'       => $product->sale_price,
          'status'      => 2,
          'created_by'  => auth()->user()->id, // المستخدم الحالي
        ]);

        Order::where('id', $orderId)->update([
          'status'          => 2,
          'updated_at'      => now(),
          'updated_by'      => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح.');
      } catch (\Exception $e) {
        return redirect()->back()
          ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
          ->withInput();
      }
    }
  }



  public function show(Order $order) {}

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request,)
  {

    $orderitem_inputs = OrderItem::find($request->orderitem_id);
    try {
      $orderitem_inputs->update([

        'quantity'          => $request->quantity,
        'notes'             => $request->notes,
        'updated_by'        => auth()->user()->id()
      ]);


      return redirect()->back()->with('success', 'Order Item Updated successfully.');
    } catch (Exception $e) {
      return redirect()->back()->withErrors(['Update Error Happened: ' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // get the OrderItem
    $orderitem_inputs = OrderItem::find($id);
    try {
      if (!$orderitem_inputs) {
        return redirect()->back()->withError('The order item is not exist, may be deleted or you have insuffecient privilleges to delete it.');
      }
      $orderitem_inputs->delete();
      return redirect()->back()->with(['success' => 'Order Item Removed Successfully']);
    } catch (Exception $err) {
      return redirect()->back()->with(['error' => 'Order Item can not be Removed due to: ' . $err]);
    }
  }
}
