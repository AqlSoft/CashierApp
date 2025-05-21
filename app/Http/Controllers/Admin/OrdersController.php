<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Party;
use App\Models\User;
use App\Models\Shift;

class OrdersController extends Controller
{

  // عرض جميع الطلبات
  public function index()
  {
    $orders    = Order::with('customer')->get();
    $products  = Product::all();
    $customers = Party::where('type', 'customer')->get();
    $defaultCustomer = Party::where([['type', '=', 'customer'],  ['is_default', '=', 1],])->first();
    $order_SN = Order::generateSerialNumber();
    $vars = [
      'products'        => $products,
      'orders'          => $orders,
      'customers'       => $customers,
      'order_SN'        => $order_SN,
      'status'          => Order::getStatusList(),
      'defaultCustomer' => $defaultCustomer,
      'admins'          => Admin::all()
    ];
    return view('admin.orders.index', $vars);
  }

  // عرض جميع الطلبات
  public function stats()
  {
    $orders    = Order::with('customer')->get();
    $vars = [
      'orders'          => $orders,
      'tab'          => 'orders'
    ];
    return view('admin.setting.index', $vars);
  }

  // عرض نموذج إنشاء طلب
  public function allowEdit($id)
  {
    $order = Order::find($id);
    try {

      $order->status = 2;
      $order->update();
      return redirect()->back()->with('success', 'تم اتاحة الطلب للتعديل بنجاح.');
    } catch (\Exception $e) {
      return redirect()->back()
        ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
    }
  }

  public function changeDelMethod($id, $m)
  {
    $order = Order::find($id);
    try {
      $order->delivery_method = $m;
      $order->wait_no = Order::generateValidWaitNo($order->id, $m);
      $order->update();

      return redirect()->back();
    } catch (\Exception $e) {
      return redirect()->back()
        ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
        ->withInput();
    }
  }

  public function fastCreateOrder($shift_id)
  {
    $shift = Shift::findOrFail($shift_id);

    try {
      $order = Order::create([
        'order_sn'        => Order::generateSerialNumber(),
        'shift_id'        => $shift->id,
        'order_date'      => now(),
        'customer_id'     => 1,
        'status'          => Order::ORDER_JUST_CREATED,
        'created_by'      => Admin::currentId(),

      ]);
      $order->wait_no = Order::generateValidWaitNo($order->id, 3);
      $order->update();

      return redirect()->route('add-orderitem', [$order->id])
        ->with('success', 'تم إنشاء طلب جديد بنجاح');
    } catch (\Exception $e) {
      return redirect()->back()
        ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())
        ->withInput();
    }
  }

  // حفظ الطلب الجديد
  public function store(StoreOrderRequest $request)
  {
    // إنشاء الطلب
    try {
 $validatedData = $request->validated();

    // Create the order
    $order = Order::create($validatedData);

      // $order = Order::create([
      //   'order_sn'        => $request->order_sn,
      //   'order_date'      => $request->order_date,
      //   'customer_id'     => $request->customer_id, // customer_id هو العميل المحدد
      //   'notes'           => $request->notes,
      //   'delivery_method' => $request->delivery_method ?? 1,
      //   'status'          => $request->status !== null ? $request->status : 1, // إذا لم يتم تحديد الحالة، افترض أنها غير نشطة
      //   'created_by'      => Admin::currentId(), // المستخدم الحالي
      // ]);

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
      'status' => Order::getStatusList(),
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
      'order'  => $order,
      'status' => Order::getStatusList(),
    ];
    return view('admin.orders.edit', $vars);
  }
  // تحديث حالة الطلب
  public function update(Request $request)
  {
    $status = Order::find($request->id);

    try {
      $status->update([
        'status'           => $request->status,
        'updated_by'       => Admin::currentId(),
      ]);

      return redirect()->back()->with('success', 'Order Updated successfully');
    } catch (\Exception $e) {
      return redirect()->back()->withInput()->with('error', 'Error updating Order because of: ' . $e->getMessage());
    }
  }

  public function cancel($id)
  {
    $status = Order::find($id);
    try {
      $status->update([
        'status'           => 0,
        'updated_by'       => Admin::currentId(),
      ]);

      return redirect()->route('display-order-all')->with('success', 'Order cancel successfully');
    } catch (\Exception $e) {
      return redirect()->back()->withInput()->with('error', 'Error cancel Order because of: ' . $e->getMessage());
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
    } catch (\Exception $err) {
      return redirect()->back()->with(['error' => 'Order can not be Removed due to: ' . $err]);
    }
  }
}
