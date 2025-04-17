<?php
namespace App\Http\Controllers\Admin;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Events\OrderUpdated;
use App\Models\Admin;

class KitchenController extends Controller
{
  public function index()
  {
      $orders = Order::whereHas('invoice')
                    // ->where('status', '!=', Order::STATUS_COMPLETED)
                    ->orderBy(function ($query) {
                        $query->select('created_at')
                              ->from('sales_invoices')
                              ->whereColumn('sales_invoices.order_id', 'orders.id')
                              ->orderBy('created_at', 'asc')
                              ->limit(1);
                    }, 'asc')
                    ->get();

      return view('admin.kitchen.kitchen', compact('orders'));
  }

  public function streamKitchenOrders(): StreamedResponse
  {
      return new StreamedResponse(function () {
          while (true) {
              // لا تحتاج إلى فعل أي شيء هنا مباشرة. نظام البث سيتولى الإرسال.
              // احتفظ بالاتصال مفتوحًا.
              usleep(1000000); // انتظر لمدة ثانية
              echo ": keep alive\n\n";
              ob_flush();
              flush();

              if (connection_aborted()) {
                  break;
              }
          }
      }, 200, [
          'Content-Type' => 'text/event-stream',
          'Cache-Control' => 'no-cache',
          'Connection' => 'keep-alive',
      ]);
  }

  public function getOrderList()
  {
      $orders = Order::whereHas('invoice')
                    // ->where('status', '!=', Order::STATUS_COMPLETED)
                    ->orderBy(function ($query) {
                        $query->select('created_at')
                              ->from('sales_invoices')
                              ->whereColumn('sales_invoices.order_id', 'orders.id')
                              ->orderBy('created_at', 'asc')
                              ->limit(1);
                    }, 'asc')
                    ->get();

      return view('admin.kitchen.partials.order_list', compact('orders'));
  }

  public function pickOrder(Request $request, Order $order)
    {
        if ($order->status != Order::ORDER_IN_PROGRESS && $order->status != Order::ORDER_COMPLETED) {
            $order->status = Order::ORDER_IN_PROGRESS;
            $order->processing_by = Admin::currentUser(); // أو أي طريقة لتحديد الشيف
            $order->processing_time = now();
            $order->save();
            event(new OrderUpdated($order)); // بث الحدث بعد التحديث

            return Redirect()->route('admin.kitchen.kitchen')->with('modal_order_id', $order->id);
        }

        return Redirect()->route('admin.kitchen.kitchen')->with('error', 'لا يمكن اختيار هذا الطلب.');
    }

    public function completeOrder(Order $order)
    {
        if ($order->status == Order::ORDER_IN_PROGRESS) {
            $order->status = Order::ORDER_COMPLETED;
            $order->updated_at = now(); // يمكنك إضافة حقل لوقت الإكمال
            $order->updated_by = Admin::currentUser(); // أو أي طريقة لتحديد الشيف
            $order->save();
            event(new OrderUpdated($order)); // بث الحدث بعد التحديث

            return Redirect()->route('admin.kitchen.kitchen')->with('success', 'تم إكمال الطلب بنجاح!');
        }

        return Redirect()->route('admin.kitchen.kitchen')->with('error', 'لا يمكن إكمال هذا الطلب.');
    }


  }
