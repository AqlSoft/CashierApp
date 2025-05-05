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
        $orders = Order::with(['table' => function($query) {
            $query->select('id', 'number');
        }])
        ->where('delivery_method', 2)
        ->get()
        ->map(function ($order) {
            $tableData = $order->table ? ['id' => $order->table->id, 'number' => $order->table->number] : null;  // Handle cases where $order->table is null
            return [
                'id' => $order->id,
                'created_at' => $order->created_at->format('H:i'),
                'status' => $order->status,
                'wait_no' => $order->wait_no,
                'table' => $tableData, 
                'max_processing_time' => $order->orderItems->max(function ($item) {
                    return $item->product->processing_time ?? '00:30:00';
                }),
            ];
        })
        ->toArray();
    
        return view('admin.monitors.restaurant-hall', compact('orders'));
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
