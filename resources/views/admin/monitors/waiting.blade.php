@extends('layouts.monitors')

@section('contents')
<div class="container-fluid py-4">
    <div class="row text-center g-4">
        <!-- Pending Column -->
        <div class="col-md-4">
            <div class="box-border bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-black  head-border   pb-1">Pending</h3>
                @forelse($orders->where('status', \App\Models\Order::ORDER_PENDING) as $order)
                <div class="card bg--warning mb-1 shadow-sm border-warning   rounded border w-100">
                    <div class="card-body">
                        <h4 class="card-title">#{{ $order->wait_no }}</h4>
                        <div class="small text-muted">Created: {{ $order->created_at->format('H:i') }}</div>
                        <div class="mt-2 text-secondary small">
                            Est. to Processing: {{ $order->processing_time }} minutes
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-muted alret alert-warning">No Pending Orders</div>
                @endforelse
            </div>
        </div>

        <!-- Processing Column -->
        <div class="col-md-4">
            <div class="box-border  bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-black  head-border   pb-1">Processing</h3>
                @forelse($orders->where('status',  \App\Models\Order::ORDER_IN_PROGRESS) as $order)
                <div class="card mb-1 bg--info shadow-sm border-info   rounded border w-100">
                    <div class="card-body">
                        <h4 class="card-title">#{{ $order->wait_no }}</h4>
                        <div class="small text-muted">Created: {{ $order->created_at->format('H:i') }}</div>
                        <div class="mt-2 text-secondary small">
                            Est. to Processing: {{ $order->processing_time }} minutes
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-muted alert alert-info">No Processing Orders</div>
                @endforelse
            </div>
        </div>

        <!-- On-Delivery Column -->
        <div class="col-md-4">
            <div class=" box-border bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-black  head-border   pb-1">On-Delivery</h3>
                @forelse($orders->where('status', \App\Models\Order::ORDER_ON_DELIVERY) as $order)
                <div class="card bg--primary rounded border mb-1 border-primary shadow-sm  w-100">
                    <div class="card-body">
                        <h4 class="card-title">#{{ $order->wait_no }}</h4>
                        <div class="mb-2">{{ $order->customer->name ?? '-' }}</div>
                        <div class="small text-muted">Started: {{ $order->updated_at->format('H:i') }}</div>
                        <div class="mt-2">
                            <span class="badge bg-primary">
                                {{ \App\Models\Order::getStatuses()[$order->status] ?? '' }}
                            </span>
                        </div>
                        <div class="mt-2 text-secondary small">
                            Est. to Complete:
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
                <div class="text-muted alert alert-primary">No Orders On-Delivery</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

<style>
  .box-border {
    border: 1pt solid #dee2e6;
  }

  .head-border {
    border-bottom: 1px solid #dedede;

  }

  .card-title {
    font-size: 1.5rem;
    font-weight: bold;
  }

  .card {
    font-size: 1.3rem;
  }

  .bg--info {
    background-color: rgba(13, 202, 240, 0.21) !important;
  }

  .bg--primary {
    background-color: rgba(13, 110, 253, 0.21) !important;
  }

  .bg--warning {
    background-color: rgba(255, 193, 7, 0.21) !important;
  }

  @media (max-width: 768px) {
    .card-title {
      font-size: 1.3rem;
    }

    .card {
      font-size: 1rem;
    }
  }
</style>