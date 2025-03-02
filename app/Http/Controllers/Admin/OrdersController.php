<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Party;

class OrdersController extends Controller
{
    // عرض جميع الطلبات
    public function index()
    {
      $orders = Order::with('customer')->get();
        $products = Product::all();
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
        return view('orders.create');
    }

    // حفظ الطلب الجديد
    public function store(Request $request)
    {
      
    }

    // عرض تفاصيل طلب معين
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // تحديث حالة الطلب
    public function update(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return redirect()->route('orders.index')->with('success', 'تم تحديث حالة الطلب.');
    }
}


