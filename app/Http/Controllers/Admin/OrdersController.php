<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Party;

class OrdersController extends Controller
{
  protected static $status = [
    1 => 'New',
    2 => 'In Progress',
    3 => 'Completed',

];
    // عرض جميع الطلبات
    public function index()
    {
        $orders    = Order::with('customer')->get();
        $products  = Product::all();
        $customers = Party::where('type', 'customer')->get();
      $vars = [
    
         'products' => $products,
          'orders' => $orders,
          'customers'=>$customers,
          'admins'   => Admin::all()
        ];
        return view('admin.orders.index', $vars);
    }

    // عرض نموذج إنشاء طلب
    public function create()
    {
      
    }

    // حفظ الطلب الجديد
    public function store(Request $request)
    {
       // إنشاء الطلب
    try {
       $order = Order::create([
        'serial_number'   => $request->serial_number,
        'order_date'      => $request->order_date,
        'customer_id'     => $request->customer_id, // customer_id هو العميل المحدد
        'notes'           => $request->notes,
        'status'          => $request->status !== null ? $request->status : 1, // إذا لم يتم تحديد الحالة، افترض أنها غير نشطة
        'created_by'      => auth()->user()->id, // المستخدم الحالي
    ]);

    return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح.');
  } catch (\Exception $e) {
    return redirect()->back()
      ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
      ->withInput();
  }
    }

    // عرض تفاصيل طلب معين
    public function show($id)
    {
      $order = Order::find($id);

      if (!$order) {
        return redirect()->back()->withError('The order is not exist, may be deleted or you have insuffecient privilleges.');
      }
      $vars = [
        'status'  => static::$status,
        'order' => $order,
      
      ];
  
      return view('admin.orders.show', $vars);
    }

      /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $order = Order::find($id);
      $vars = [
          'order'  =>$order,
          'status' => static::$status,
      ];
      return view('admin.orders.edit', $vars);
    }
    // تحديث حالة الطلب
    public function update(Request $request)
    {
      $status = Order::find($request->id);

      try {
          $status->update([
            'status'           => $request->status ,
            'updated_by'       => auth()->user()->id  ,
          ]);

          return redirect()->back()->with('success', 'Order Updated successfully');
      } catch (Exception $e) {
          return redirect()->back()->withInput()->with('error', 'Error updating Order because of: ' . $e->getMessage());
      }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        try {
            if (!$order) {
                return redirect()->back()->withError('The order  is not exist, may be deleted or you have insuffecient privilleges to delete it.');
            }
            $order->delete();
            return redirect()->back()->with(['success' => 'Order  Removed Successfully']);
        } catch (Exception $err) {
            return redirect()->back()->with(['error' => 'Order can not be Removed due to: ' . $err]);
        }
    }
}


