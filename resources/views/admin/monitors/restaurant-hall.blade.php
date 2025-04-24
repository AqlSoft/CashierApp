@extends('layouts.admin')

@section('contents')
<div class="container">
    <h2 class="my-4">Restaurant Hall </h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-light">
                <tr>
                    <th>Order No </th>
                    <th>issued</th>
                    <th>Wait No</th>
                    <th>Processing time</th>
                    <th>status</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->table->number ?? '--' }}#{{ $order->order_sn }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>{{ $order->wait_no }}</td>
                    <td></td>

                  
                    <td>
                        <span class="badge 
                            @if($order->status == \App\Models\Order::ORDER_PENDING) bg-warning
                            @elseif($order->status == \App\Models\Order::ORDER_IN_PROGRESS) bg-info
                            @elseif($order->status == \App\Models\Order::ORDER_RATED) bg-success
                            @endif">
                            {{ \App\Models\Order::getStatuses()[$order->status] ?? '' }}
                        </span>
                    </td>
                    
                    
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">لا توجد طلبات حالية</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection