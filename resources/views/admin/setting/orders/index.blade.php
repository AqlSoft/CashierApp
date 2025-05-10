<h1 class="mb-3">{{__('orders.orders-list')}}</h1>
{{-- List of orders --}}
<div class="row items-list">
    @forelse ($orders as $order)
    <div class="col-4 mb-2">
        <div class="card w-100">
            <div class="row g-0">
                <div class="text-center" style="width: 100px">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="{{ $order->deliveryMethodIcon() }} fa-4x"></i>
                    </div>
                </div>
                <div class="" style="width: calc(100% - 100px)">
                    <div class="card-body pb-0">
                        <h4 class="card-title">{{ $order->order_sn }}</h4>
                        <p class="card-text mt-0 mb-2">{{ $order->code }} <br>
                            {{ $order->creator->userName }}
                            <span class="badge bg-success" style="padding: 2px 8px;">{{ $order->parseStatus() }}</span>


                        </p>

                        <div class="actions position-absolute top-0">
                            <a href="{{ route('view-order-info', $order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-display"></i></a>
                            <a href="{{ route('destroy-order-info', $order->id) }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 mb-2">
        <p>{{__('orders.no-orders-found')}}</p>
    </div>
    @endforelse
</div>