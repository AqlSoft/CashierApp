@extends('layouts.admin')

@section('contents')
<div class="container">
  <h2 class="my-4">{{ __('restaurant-hall.restaurant_hall') }}</h2>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="bg-light">
        <tr>
          <th>{{ __('restaurant-hall.order_no') }}</th>
          <th>{{ __('restaurant-hall.issued') }}</th>
          <th>{{ __('restaurant-hall.wait_time') }}</th>
          <th>{{ __('restaurant-hall.processing_time') }}</th>
          <th>{{ __('restaurant-hall.status') }}</th>
        </tr>
      </thead>
      <tbody>
      @php
        $cumulativeWaitTime = 0;
      @endphp

      @forelse($orders as $order)
        @php
            // تحويل وقت المعالجة من تنسيق time إلى دقائق
            $processingTimeMinutes = 30; // قيمة افتراضية 30 دقيقة

            // التصحيح: استخدام $order['max_processing_time'] بدلاً من maxProcessingTime
            if (!empty($order['max_processing_time'])) {
                $timeParts = explode(':', $order['max_processing_time']);

                // التحقق من وجود 3 أجزاء (ساعات، دقائق، ثواني)
                if (count($timeParts) >= 3) {
                    $hours = (int)($timeParts[0] ?? 0);
                    $minutes = (int)($timeParts[1] ?? 0);
                    $seconds = (int)($timeParts[2] ?? 0);
                    $processingTimeMinutes = ($hours * 60) + $minutes + round($seconds / 60);
                }
                // إذا كان التنسيق مختلفاً (مثل دقائق فقط)
                elseif (is_numeric($order['max_processing_time'])) {
                    $processingTimeMinutes = (int)$order['max_processing_time'];
                }
            }

            // حساب وقت الانتظار التراكمي
            $currentWaitTime = $cumulativeWaitTime + $processingTimeMinutes;
            $cumulativeWaitTime = $currentWaitTime;

            // تنسيق الوقت للعرض
            $displayWaitTime = floor($currentWaitTime / 60) . 'h ' . ($currentWaitTime % 60) . 'm';
            $displayProcessingTime = floor($processingTimeMinutes / 60) . 'h ' . ($processingTimeMinutes % 60) . 'm';
        @endphp

        <tr>
          <td>{{ $order['table']['number'] ??'--' }}#{{ $order['wait_no']??'N/A' }}</td>
          <td>{{ $order['created_at'] }}</td>
          <td>{{ $displayWaitTime }} </td>
          <td>{{ $displayProcessingTime }} </td>
          <td>
            <span class="badge 
                    @if($order['status'] == \App\Models\Order::ORDER_PENDING) bg-warning
                    @elseif($order['status'] == \App\Models\Order::ORDER_IN_PROGRESS) bg-info
                    @elseif($order['status'] == \App\Models\Order::ORDER_ON_DELIVERY) bg-success
                    @endif">
              {{ \App\Models\Order::getStatuses()[$order['status']] ?? '' }}
            </span>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center">{{ __('restaurant-hall.no_current_orders') }}</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection