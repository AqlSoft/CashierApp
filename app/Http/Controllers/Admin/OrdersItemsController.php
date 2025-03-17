<?php

namespace App\Http\Controllers\admin;

use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Unit;
use App\Models\ItemCategroy;

class OrdersItemsController extends Controller
{

  // عرض جميع الطلبات
  public function index() {}

  // عرض نموذج إنشاء طلب
  public function create(string $id)
  {

    $units = Unit::all();
    $products = Product::all();
    $categories = ItemCategroy::all();

    $orderItems = OrderItem::where('order_id', $id)->get();

    // إنشاء مصفوفة لتخزين الكميات (Quantities)
    $quantities = [];
      // حساب الإجمالي الكلي (Total Price)
      $totalPrice = 0;
        // حساب المبلغ الإجمالي (بدون الضريبة)
    $amount = 0;
    foreach ($orderItems as $item) {
      $quantities[$item->product_id] = $item->quantity;
      $totalPrice += $item->quantity * $item->price;
      $amount += $item->quantity * $item->price;
    }
  
    // حساب قيمة الضريبة (VAT) بنسبة 15%
    $vatRate = 0.15; // نسبة الضريبة (15%)
    $vatAmount = $amount * $vatRate;

    // حساب المبلغ الإجمالي (بما في ذلك الضريبة)
    $totalAmount = $amount + $vatAmount;

    // المبلغ المدفوع (يمكن جلبها من قاعدة البيانات أو تعيينها يدويًا)
    $paid = 0;

    // حساب المبلغ المتبقي
    $remaining = $totalAmount - $paid;


    $vars = [
      'order' => Order::find($id),
      'products' => $products,
      'units' => $units,
      'Ois' => OrderItem::where('order_id', $id)->pluck('product_id', 'quantity')->toArray(),
      'categories' => $categories,
      'quantities' => $quantities,
      'totalPrice' => $totalPrice,
      'amount' => $amount,
      'vatAmount' => $vatAmount,
      'totalAmount' => $totalAmount,
      'paid' => $paid,
      'remaining' => $remaining,
      'status' => Order::getStatusList(),

    ];
    return view('admin.orderitem.create', $vars);
  }


  // حفظ الطلب الجديد
  public function store(Request $request, $orderId)
  {
    //return $request;

    // حفظ البيانات في قاعدة البيانات
    $product = Product::find($request->product_id);
    $productIsExist = OrderItem::where(['order_id' => $orderId, 'product_id' => $product->id])
      ->first();
    if ($productIsExist) {
      $productIsExist->update(['quantity' => $productIsExist->quantity + 1]);
      return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح.');
    } else {

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
          'status' => 2,
          'updated_at' => now(),
          'updated_by' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح.');
      } catch (\Exception $e) {
        return redirect()->back()
          ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
          ->withInput();
      }
    }
  }


  // عرض تفاصيل طلب معين
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
