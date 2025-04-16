<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;

class MonitorsController
{
    //
    public function waitingHall()
    {
        // جلب الطلبات ذات الحالات المطلوبة فقط حسب القائمة الجديدة
        $orders = Order::with('customer')
            ->whereIn('status', [3, 4, 5]) // 3: Pending, 4: Processing, 5: On Delivery
            ->orderByRaw("FIELD(status, 3, 4, 5)") // ترتيب الأعمدة: Pending, Processing, On-Delivery
            ->orderBy('updated_at')
            ->get();

        return view('admin.monitors.waiting', compact('orders'));
    }

    public function restaurantHall()
    {
        return view('admin.monitors.restaurant-hall');
    }

    public function kitchenProcessingArea()
    {
        return view('admin.monitors.kitchen-processing-area');
    }

    public function mealsState()
    {
        return view('admin.monitors.meals-state');
    }

    public function advertismentDisplays()
    {
        return view('admin.monitors.advertisment-displays');
    }
}
