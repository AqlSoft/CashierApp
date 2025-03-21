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
    $vars = [
      'order' => Order::find($id),
      'products' => $products,
      'units' => $units,
      'Ois' => OrderItem::where('order_id', $id)->pluck('product_id')->toArray(),
      'categories' => $categories,
      'status' => Order::getStatusList(),

    ];
    return view('admin.orderitem.create', $vars);
  }

  public function getProductsByCategory($categoryId)
  {

    $products = Product::where('category_id', $categoryId)
      ->with('unit') // تحميل العلاقة مع الوحدة
      ->get(['id', 'name', 'sale_price', 'unit_id']); // إضافة unit_id إلى البيانات المرتجعة

    return response()->json($products);
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
