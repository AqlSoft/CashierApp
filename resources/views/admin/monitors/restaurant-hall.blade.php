@extends('layouts.admin')

@section('contents')
<div class="container">
    <h2 class="my-4">Restaurant Hall </h2>
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
    <thead class="bg-light">
        <tr>
            <th>Order No</th>
            <th>Issued</th>
            <th>Wait Time</th>
            <th>Processing time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
            $cumulativeWaitTime = 0; // متغير لتخزين مجموع أوقات الانتظار التراكمية
        @endphp
        
        @forelse($orders as $order)
        @php
            // تحويل وقت المعالجة من تنسيق time إلى دقائق
            $processingTimeMinutes = 0;
            if ($order->processing_time) {
                list($hours, $minutes, $seconds) = explode(':', $order->processing_time);
                $processingTimeMinutes = ($hours * 60) + $minutes + ($seconds / 60);
            }
            
            // حساب وقت الانتظار للطلب الحالي
            $currentWaitTime = $cumulativeWaitTime + $processingTimeMinutes;
            
            // تحديث التراكمي لاستخدامه في الطلبات التالية
            $cumulativeWaitTime = $currentWaitTime;
            
            // تنسيق العرض للوقت
            $displayWaitTime = floor($currentWaitTime / 60) . 'h ' . ($currentWaitTime % 60) . 'm';
            $displayProcessingTime = floor($processingTimeMinutes / 60) . 'h ' . ($processingTimeMinutes % 60) . 'm';
        @endphp
        
        <tr>
            <td>{{ $order->table->number ?? '--' }}#{{ $order->wait_no }}</td>
            <td>{{ $order->created_at->diffForHumans() }}</td>
            <td>{{ $displayWaitTime }}</td>
            <td>{{ $displayProcessingTime }}</td>
            <td>
                <span class="badge 
                    @if($order->status == \App\Models\Order::ORDER_PENDING) bg-warning
                    @elseif($order->status == \App\Models\Order::ORDER_IN_PROGRESS) bg-info
                    @elseif($order->status == \App\Models\Order::ORDER_ON_DELIVERY) bg-success
                    @endif">
                    {{ \App\Models\Order::getStatuses()[$order->status] ?? '' }}
                </span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No current orders</td>
        </tr>
        @endforelse
    </tbody>
</table>
    </div>
</div>
@endsection