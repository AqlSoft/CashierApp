@extends('layouts.monitors')
@section('title')
{{ __('kitchen.kitchen_display') }}
@endsection

@section('contents')
<div class="container-fluid py-4">
  <div class="row text-center g-4">
    <div class="col-md-4">
      <div class="box-border bg-opacity-25 rounded p-3 h-100">
        <h3 class="mb-3 text-black head-border pb-1">{{ __('kitchen.pending') }}</h3>
        @forelse($orders->where('status', \App\Models\Order::ORDER_PENDING) as $order)
        <div class="card bg--warning mb-1 shadow-sm border-warning rounded border w-100">
          <div class="card-body">
            <h4 class="card-title">#{{ $order->wait_no }}</h4>
            <div class="small text-muted">{{ __('kitchen.created') }}: {{ $order->created_at->format('H:i') }}</div>
            <form method="POST" action="{{ route('admin.kitchen.order.pick', $order->id) }}" id="pickOrderForm{{ $order->id }}">
              @csrf
              <button type="button" class="btn btn-warning btn-sm mt-2"
                onclick="
                if(confirm('{{ __('kitchen.confirm_take_order') }}')) {
                    document.getElementById('pickOrderForm{{ $order->id }}').submit();
                    $('#orderDetailsModal{{ $order->id }}').modal('show');  }  ">
                {{ __('kitchen.take_order') }}
              </button>
            </form>
            <div class="mt-2 text-secondary small">
              {{ __('kitchen.est_to_processing') }}: {{ \Carbon\Carbon::parse($order->processing_time)->format('H:i') }} {{ __('kitchen.minutes') }}
            </div>
          </div>
        </div>
        <div class="modal fade" id="orderDetailsModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderDetailsModalLabel{{ $order->id }}" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="orderDetailsModalLabel{{ $order->id }}">{{ __('kitchen.order_details') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('kitchen.close') }}"></button>
              </div>
              <div class="modal-body">
                @include('admin.kitchen.partials.order-details')
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('kitchen.close') }}</button>
                <button type="button" class="btn btn-primary">{{ __('kitchen.print') }}</button>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="text-muted alert alert-warning">{{ __('kitchen.no_pending_orders') }}</div>
        @endforelse
      </div>
    </div>
    <div class="col-md-4">
      <div class="box-border bg-opacity-25 rounded p-3 h-100">
        <h3 class="mb-3 text-black head-border pb-1">{{ __('kitchen.processing') }}</h3>
        @forelse($orders->where('status', \App\Models\Order::ORDER_IN_PROGRESS) as $order)
        <div class="card mb-1 bg--info shadow-sm border-info rounded border w-100">
          <div class="card-body">
            <h4 class="card-title">#{{ $order->wait_no }}</h4>
            <div class="small text-muted">{{ __('kitchen.created') }}: {{ $order->created_at->format('H:i') }}</div>
            <form method="POST" action="{{ route('admin.kitchen.order.complete', $order->id) }}">
              @csrf
              <button type="submit" class="btn btn-info btn-sm mt-2"
                onclick="return confirm('{{ __('kitchen.confirm_deliver_order') }}')">
                {{ __('kitchen.deliver_order') }}
              </button>
            </form>
            <div class="mt-2 text-secondary small">
              {{ __('kitchen.est_to_processing') }}: {{ \Carbon\Carbon::parse($order->processing_time)->format('H:i') }} {{ __('kitchen.minutes') }}
            </div>
          </div>
        </div>
        @empty
        <div class="text-muted alert alert-info">{{ __('kitchen.no_processing_orders') }}</div>
        @endforelse
      </div>
    </div>
    <div class="col-md-4">
      <div class="box-border bg-opacity-25 rounded p-3 h-100">
        <h3 class="mb-3 text-black head-border pb-1">{{ __('kitchen.on_delivery') }}</h3>
        @forelse($orders->where('status', \App\Models\Order::ORDER_ON_DELIVERY) as $order)
        <div class="card bg--primary rounded border mb-1 border-primary shadow-sm w-100">
          <div class="card-body">
            <h4 class="card-title">#{{ $order->wait_no }}</h4>
            <div class="mb-2">{{ $order->customer->name ?? '-' }}</div>
            <div class="small text-muted">{{ __('kitchen.started') }}: {{ $order->updated_at->format('H:i') }}</div>
            <div class="mt-2">
              <span class="badge bg-primary">
                {{ \App\Models\Order::getStatuses()[$order->status] ?? '' }}
              </span>
            </div>
            <div class="mt-2 text-secondary small">
              {{ __('kitchen.est_to_complete') }}:
              <span>
                @php
                $eta = $order->updated_at->addMinutes(7)->diffForHumans(null, true);
                @endphp
                {{ $eta }}
              </span>
            </div>
          </div>
        </div>
        @empty
        <div class="text-muted alert alert-primary">{{ __('kitchen.no_on_delivery_orders') }}</div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection