<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;

class MonitorsController
{
    //
    public function waitingHall()
    {
        $orders = Order::with('customer')
            ->whereIn('status', [
                Order::ORDER_PENDING,      // 3
                Order::ORDER_IN_PROGRESS,  // 4
                Order::ORDER_ON_DELIVERY   // 5
            ])
            ->orderByRaw("FIELD(status, ?, ?, ?)", [
                Order::ORDER_PENDING,
                Order::ORDER_IN_PROGRESS,
                Order::ORDER_ON_DELIVERY
            ])
            ->orderBy('updated_at')
            ->get();
    
        return view('admin.monitors.waiting', compact('orders'));
    }
    public function restaurantHall()
    {
      $orders = Order::with(['table', 'orderItems.product'])
      ->where('delivery_method', 3) 
      // ->whereNotIn('status', ['completed', 'cancelled'])
      ->orderBy('created_at', 'desc')
      ->get();
        return view('admin.monitors.restaurant-hall',compact('orders'));
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
