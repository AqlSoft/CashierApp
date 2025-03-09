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
  protected static $status = [
    1 => 'New',
    2 => 'In Progress',
    3 => 'Completed',
    4 =>   'paid'

];
  // عرض جميع الطلبات
  public function index() {}

  // عرض نموذج إنشاء طلب
  public function create(string $id)
  {
    $order = Order::with(['orderItems.product', 'orderItems.unit', 'orderItems.order'])->find($id);
    $units = Unit::all();
    $categories = ItemCategroy::all();
    $vars = [
      'order' => $order,
      'units' => $units,
      'categories' => $categories,
       'status'  => static::$status,

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
  public function store(Request $request)
  {

    // حفظ البيانات في قاعدة البيانات
    try {
      OrderItem::create([
        'order_id'    => $request->order,
        'category_id' => $request->category,
        'product_id'  => $request->product,
        'unit_id'     => $request->unit_id,
        'quantity'    => $request->quantity,
        'price'       => $request->price,
        'notes'       => $request->notes,
        'created_by'  => auth()->user()->id, // المستخدم الحالي
      ]);

      return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح.');
    } catch (\Exception $e) {
      return redirect()->back()
        ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
        ->withInput();
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
