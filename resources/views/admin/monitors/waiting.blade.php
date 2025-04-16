@extends('layouts.monitors')

@section('contents')
<div class="container-fluid py-4">
    <div class="row text-center g-4">
        <!-- Pending Column -->
        <div class="col-md-4">
            <div class="bg-warning bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-1 text-warning">Pending</h3>
                @forelse($orders->where('status', 3) as $order)
                <div class="card mb-1 shadow-sm border-warning  rounded border w-100">
                    <div class="card-body">
                        <h4 class="card-title">#{{ $order->wait_no }}</h4>
                        <div class="small text-muted">Created: {{ $order->created_at->format('H:i') }}</div>
                        <div class="mt-2 text-secondary small">
                            Est. to Processing: {{ $order->processing_time }} minutes
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-muted">No Pending Orders</div>
                @endforelse
            </div>
        </div>

        <!-- Processing Column -->
        <div class="col-md-4">
            <div class="bg-info bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-info">Processing</h3>
                @forelse($orders->where('status', 4) as $order)
                <div class="card mb-1 shadow-sm border-info  rounded border w-100">
                    <div class="card-body">
                        <h4 class="card-title">#{{ $order->wait_no }}</h4>
                        <div class="small text-muted">Created: {{ $order->created_at->format('H:i') }}</div>
                        <div class="mt-2 text-secondary small">
                            Est. to Processing: {{ $order->processing_time }} minutes
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-muted">No Processing Orders</div>
                @endforelse
            </div>
        </div>

        <!-- On-Delivery Column -->
        <div class="col-md-4">
            <div class="bg-primary bg-opacity-25 rounded p-3 h-100">
                <h3 class="mb-3 text-primary">On-Delivery</h3>
                @forelse($orders->where('status', 5) as $order)
                <div class="card mb-3 shadow-sm border-primary border-2 w-100">
                    <div class="card-body">
                        <h4 class="card-title">#{{ $order->wait_no }}</h4>
                        <div class="mb-2">{{ $order->customer->name ?? '-' }}</div>
                        <div class="small text-muted">Started: {{ $order->updated_at->format('H:i') }}</div>
                        <div class="mt-2">
                            <span class="badge bg-primary">
                                {{ \App\Models\Order::getStatusList()[$order->status] ?? '' }}
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
                <div class="text-muted">No Orders On-Delivery</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card-title {
        font-size: 2.2rem;
        font-weight: bold;
    }

    .card {
        font-size: 1.3rem;
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