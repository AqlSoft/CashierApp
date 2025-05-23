<div class="row mt-2">
  <div class="col col-12">
  <div class="row g-0 py-2 fw-bold align-items-center">
      <div class="col-3 fw-bold fs-6 text-end">Order date:</div>
      <div class="col-9 ps-2 text-start  fs-6"> {{ $order->created_at->format('Y-m-d h:i A') }} </div>
    </div>
    <div class="row g-0  py-2 fw-bold align-items-center">
      <div class="col-3 fw-bold fs-6 text-end">Invoice SN:</div>
      <div class="col-4 ps-2 text-start  fs-6"> {{ $order->invoice->invoice_number }} </div>
      <div class="col-2 fw-bold fs-6">Wait No: </div>
      <div class="col-3 ps-2 text-start  fs-6"> {{ $order->wait_no}} </div>
    </div>
    <div class="row g-0 py-2 fw-bold align-items-center">
      <div class="col-3 fw-bold fs-6 text-end">Order SN:</div>
      <div class="col-4 ps-2 text-start  fs-6"> {{ $order->order_sn }} </div>
      <div class="col-2 fw-bold fs-6">Client: </div>
      <div class="col-3 ps-2 text-start  fs-6"> {{ $order->customer->name ?? 'زائر' }} </div>
    </div>
    <div class="row g-0  py-2 fw-bold align-items-center">
      <div class="col-3 fw-bold fs-6 text-end">Type Order:</div>
      <div class="col-4 ps-2 text-start  fs-6">
        <span class=" text-info delivery-method-badge ">
          @if($order->delivery_method == 1)
          <i class="fas fa-shopping-bag me-1"></i> Delivery
          @elseif($order->delivery_method == 2)
          <i class="fas fa-store me-1"></i> Local
          @else
          <i class="fas fa-truck me-1"></i> Takeout
          @endif
        </span>
      </div>
      <div class="col-2 fw-bold fs-6">Status: </div>
      <div class="col-3 ps-2 text-start  fs-6">
        @if ($order->status != \App\Models\Order::ORDER_PENDING && $order->status != \App\Models\Order::ORDER_ON_DELIVERY)
        <span class="text-success btn-sm ">
          Print
        </span>
        @elseif ($order->status == \App\Models\Order::ORDER_IN_PROGRESS)
        <span class="text-warning btn-sm">
          In Progress
        </span>
        @elseif ($order->status == \App\Models\Order::ORDER_ON_DELIVERY)
        <span class="text-secondary btn-sm">ON-DELIVERY</span>
        @endif
      </div>
    </div>

  </div>
</div>
<div class="py-1" style="border-bottom: 2px solid #dedede"></div>
<div class="row mt-2">
  <div class="col col-12">
    <div class="selected-products-container" style="font-size: 14px;">
      <div class="row g-0 border-bottom py-2 fw-bold align-items-center">
        <div class="col-1 text-center fw-bold fs-6">#</div>
        <div class="col-3 ps-2 fw-bold fs-6">Meal</div>
        <div class="col-2 text-center fw-bold fs-6">Qty</div>
        <div class="col-2 text-center fw-bold fs-6">Notes</div>
      </div>
      @foreach ($order->orderItems as $oItem)
      <div class="row g-0 border-bottom py-2 align-items-center">
        <div class="col-1 text-center fs-6">{{ $loop->iteration }}</div>
        <div class="col-3 ps-2 fs-6">{{ $oItem->product->name }}</div>
        <div class="col-2 text-end fs-6">{{ $oItem->quantity }}</div> {{-- Added number_format --}}
        <div class="col-3 ps-2 fs-6">{{ $oItem->notes }}</div>
      </div>
      @endforeach
    </div>





  </div>
</div>