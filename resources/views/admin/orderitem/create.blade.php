@extends('layouts.admin')

@section('extra-links')
<link rel="stylesheet" href="{{ asset('assets/admin/css/orderitem.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endsection

@section('contents')
<style>
  .text-danger {
    color: #dc3545;
  }
  .text-success {
    color: #28a745;
  }
</style>

{{-- Header Row --}}
<div class="title-slider-header">
  <div class="title-new-section">
    <h1>{{ __('orderitem.add_order_items') }}</h1>
    @if (isset($shift) && $shift->status == 'Active')
    <a href="{{ route('fast-create-order', $shift->id) }}">
      <i class="fas fa-plus"></i> {{ __('orderitem.new') }}
    </a>
    @else
    <button class="btn btn-secondary" disabled>
      <i class="fas fa-plus"></i> {{ __('orderitem.no_active_shift') }}
    </button>
    @endif
  </div>

  <div class="slider-section">
    <div class="order-slider-container">
      <div class="swiper order-slider">
        <div class="swiper-wrapper">
          @forelse ($orders as $pendingOrder)
          <div class="swiper-slide">
            @php
            $isActive = (isset($activeOrderId) && $pendingOrder->id == $activeOrderId);
            $colorName = 'secondary'; 
            if ($pendingOrder->delivery_method == 2) {
              $colorName = 'info';
            } elseif ($pendingOrder->delivery_method == 3) {
              $colorName = 'warning';
            }
            $btnClass = $isActive ? 'btn-' . $colorName : 'btn-outline-' . $colorName;
            @endphp
            <a href="{{ route('add-orderitem', [$pendingOrder->id]) }}"
              title="{{ __('orderitem.order_sn') }} - {{ $pendingOrder->order_sn }}" class="btn btn-sm {{ $btnClass }}">
              {{ $pendingOrder->wait_no }}
            </a>
          </div>
          @empty
          <div class="swiper-slide">
            <span class="text-muted">{{ __('orderitem.no_pending_orders') }}</span>
          </div>
          @endforelse
        </div>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</div>

{{-- Add Client Modal --}}
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <form action="/admin/clients/store" method="POST">
      @csrf
      <div class="modal-content">
        <h1 class="modal-title fs-5 mt-2 ps-3" style="border-bottom: 1px solid #dedede">{{ __('orderitem.add_new_client') }}</h1>
        <div class="modal-body">
          <div class="input-group sm mb-2">
            <label class="input-group-text" for="vat_number">{{ __('orderitem.vat_number') }}</label>
            <input type="number" class="form-control sm" name="vat_number" id="vat_number">
          </div>
          <div class="input-group sm mb-2">
            <label class="input-group-text" for="name">{{ __('orderitem.client_name') }}</label>
            <input type="text" class="form-control sm" name="name" id="name">
          </div>
          <div class="input-group sm mb-2">
            <label class="input-group-text" for="phone">{{ __('orderitem.phone_number') }}</label>
            <input type="number" class="form-control sm" name="phone" id="phone">
          </div>
          <div class="input-group sm mb-2">
            <label class="input-group-text" for="address">{{ __('orderitem.address') }}</label>
            <input type="text" class="form-control sm" name="address" id="address">
          </div>
          <div class="input-group pt-2 px-3 mt-2 justify-content-end" style="border-top: 1px solid #dedede">
            <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
              data-bs-dismiss="modal">{{ __('orderitem.close') }}</button>
            <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">{{ __('orderitem.save_client') }}</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

{{-- Main Content --}}
<div class="container">
  <div class="row mt-3 d-flex gap-3">
    <div class="col col-4">
      {{-- Delivery Method Buttons --}}
      <div class="row mt-2 mb-2">
        <div class="btn-group ">
          <a class="btn btn-outline-secondary {{$order->delivery_method == 1 ? 'btn-secondary text-white':''}}"
            href="{{ route('change-order-delivery-method', [$order->id, 1]) }}">{{ __('orderitem.takeaway') }}</a>
          <a class="btn btn-outline-info {{$order->delivery_method == 2 ? 'btn-info text-black':''}}"
            href="{{ route('change-order-delivery-method', [$order->id, 2]) }}">{{ __('orderitem.local') }}</a>
          <a class="btn btn-outline-warning {{$order->delivery_method == 3 ? 'btn-warning text-black':''}}"
            href="{{ route('change-order-delivery-method', [$order->id, 3]) }}">{{ __('orderitem.delivery') }}</a>
        </div>

        <div class="col col-12 mt-2">
          {{-- Table Number (Visible for Local only) --}}
          @if ($currentMethod == 2)
          <div class="input-group sm mb-2">
            <label class="input-group-text">{{ __('orderitem.table_number') }}</label>
            <select class="form-select form-control sm py-0" name="table_id" id="table_id_select" {{ $currentMethod == 2 ? 'required' : '' }}>
              <option value="">{{ __('orderitem.select_table') }}</option>
              @foreach ($tables as $table)
              <option value="{{ $table->id }}"
                class="{{ $table->is_occupied ? 'text-danger' : 'text-success' }}"
                {{ $table->is_occupied ? 'disabled' : '' }}
                {{ $order->table_id == $table->id ? 'selected' : '' }}>
                {{ $table->number }} ({{ $table->is_occupied ? __('orderitem.occupied') : __('orderitem.available') }})
              </option>
              @endforeach
            </select>
          </div>
          @endif
          {{-- Delivery Agent (Visible for Delivery only) --}}
          @if ($currentMethod == 3)
          <div class="input-group sm mb-2">
            <label class="input-group-text">{{ __('orderitem.delivery_agent') }}</label>
            <select class="form-select form-control sm py-0" id="delivery_id_select"
              {{ $currentMethod == 3 ? 'required' : '' }}>
              <option value="">{{ __('orderitem.select_agent') }}</option>
              @foreach ($del_agents as $agent)
              <option value="{{ $agent->id }}"
                {{ $order->delivery_agent_id == $agent->id ? 'selected' : '' }}>
                {{ $agent->userName }}
              </option>
              @endforeach
            </select>
          </div>
          {{-- Client (Visible for Delivery only) --}}
          <div class="input-group sm mb-2">
            <label class="input-group-text">{{ __('orderitem.client') }}</label>
            <select class="form-select form-control sm py-0" id="customer_id_select" {{ $currentMethod == 3 ? 'required' : '' }}>
              @foreach ($customers as $customer)
              <option value="{{ $customer->id }}"
                {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
              </option>
              @endforeach
            </select>
            <label class="input-group-text" for="customer_id">
              <a class="btn btn-sm py-0" href="#" data-bs-target="#exampleModalToggle"
                data-bs-toggle="modal">
                <i class="fa-solid fa-user-plus" title="{{ __('orderitem.add_new_client') }}"></i>
              </a>
            </label>
          </div>
          @endif

          {{-- Order Items List --}}
          <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
          <div class="selected-products-container" style="font-size: 14px;">
            <div class="row g-0 border-bottom py-2 fw-bold align-items-center">
              <div class="col-1 text-center fw-bold fs-6">#</div>
              <div class="col-3 ps-2 fw-bold fs-6">{{ __('orderitem.meal') }}</div>
              <div class="col-2 text-center fw-bold fs-6">{{ __('orderitem.qty') }}</div>
              <div class="col-2 text-center fw-bold fs-6">{{ __('orderitem.u_price') }}</div>
              <div class="col-2 text-center fw-bold fs-6">{{ __('orderitem.t_price') }}</div>
              <div class="col-2 text-center fw-bold fs-6">{{ __('orderitem.action') }}</div>
            </div>

            @foreach ($order->orderItems as $oItem)
            <div class="row g-0 border-bottom py-2 align-items-center">
              <form action="{{ route('update-orderitem') }}" method="post"
                class="d-flex align-items-center w-100 p-0">
                @csrf
                <input type="hidden" name="id" value="{{ $oItem->id }}">
                <div class="col-1 text-center fs-6">{{ $loop->iteration }}</div>
                <div class="col-3 ps-2 fs-6">{{ $oItem->product->name }}</div>
                <div class="col-2 text-center fs-6">
                  <input type="number" name="quantity" value="{{ $oItem->quantity }}"
                    style="width: 50px; border: 1px solid #dedede; padding: 2px 5px;"
                    class="text-center fs-6">
                </div>
                <div class="col-2 text-center fs-6">
                  <input type="number" step="0.01" name="price"
                    value="{{ old('price', $oItem->price) }}"
                    style="width: 70px; border: 1px solid #dedede; padding: 2px 5px;"
                    class="text-center fs-6">
                </div>
                <div class="col-2 text-end fs-6">
                  {{ number_format($oItem->quantity * $oItem->price, 2) }}
                </div>
                <div class="col-2 text-center fs-6">
                  <div class="d-flex justify-content-center gap-1">
                    <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent"
                      title="{{ __('orderitem.update_order_item') }}">
                      <i class="fas fa-save text-secondary fs-6"></i>
                    </button>
                    <a class="btn btn-sm p-0 border-0 bg-transparent"
                      onclick="return confirm('{{ __('orderitem.confirm_delete_item') }}')"
                      title="{{ __('orderitem.delete_order_item') }}"
                      href="{{ route('destroy-oItem-info', $oItem->id) }}">
                      <i class="fa fa-trash text-danger fs-6"></i>
                    </a>
                  </div>
                </div>
              </form>
            </div>
            @endforeach
          </div>

          <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
          <div class="total-price mt-2 d-flex justify-content-between align-items-center">
            <h4>{{ __('orderitem.total_price') }}:</h4>
            <h4><span id="total-price">{{ number_format($totalPrice, 2) }}</span></h4>
          </div>

          <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
          <div class="input-group pt-2 justify-content-center align-items-center gap-2">
            <a href="/admin/orders/index" class="btn px-3 py-1 btn-outline-secondary btn-sm"
              title="{{ __('orderitem.back_to_order_list') }}">
              {{ __('orderitem.back_to_order') }}
            </a>
            @if ($order->status == 3 && $order->invoice->id)
            <a href="{{ route('view-invoice-info', [$order->invoice->id]) }}"
              class="btn py-1 btn-outline-secondary btn-sm">
              {{ __('orderitem.view_invoice') }}
            </a>
            @endif
            @if ($order->status === 2)
            <div class="dropdown">
              <button class="btn px-3 py-1 btn-outline-secondary btn-sm dropdown-toggle"
                type="button" data-bs-toggle="dropdown">
                {{ __('orderitem.finish') }}
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-bs-target="#cashPaymentModal"
                    data-bs-toggle="modal">{{ __('orderitem.cash_payment') }}</a></li>
              </ul>
            </div>
            @elseif($order->status === 3)
            <a href="{{ route('allow-order-editting', [$order->id]) }}"
              class="btn px-3 py-1 btn-outline-secondary btn-sm">{{ __('orderitem.allow_edit') }}</a>
            @endif
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col col-7 pb-3 pt-3 px-4">
      <div class="row ">
      <div class="col col-12">
    <div class="btn-group ">
        <a class="btn btn-outline-secondary {{ request('category') == null ? 'active' : '' }}"
           href="{{ route('add-orderitem', ['id' => $order->id]) }}">{{ __('orderitem.all') }}</a> 
        @foreach ($categories as $category)
            <a class="btn btn-outline-primary {{ request('category') == $category->id ? 'active' : '' }}"
               href="{{ route('add-orderitem', ['id' => $order->id, 'category' => $category->id]) }}">{{ $category->cat_name }}</a>
        @endforeach
    </div>
</div>
      <div class="row mt-3 d-flex gap-1" id="product-list">
        @if (isset($products) && count($products))
        @foreach ($products as $product)
        <div class="col col-2 productlist p-0"
          style="border-radius: 6px;border: 2px solid {{ in_array($product->id, $Ois) ? '#007bff' : '#f7f5f5' }}"
          data-category="{{ $product->category_id }}">
          <form action="/admin/orderItems/store/{{ $order->id }}" method="POST"
            class="m-0">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <button type="submit" class="product-item">
              <div class="productlistimg-container">
                <div class="productlistimg"
                  style="background-image: url('{{ $product->image ? asset('assets/admin/uploads/images/products/' . $product->image) : asset('assets/admin/images/default-product.png') }}');">
                </div>
                <div class="price-overlay">
                  <h5 class="price-display">{{ number_format($product->sale_price, 2) }}
                  </h5>
                </div>
              </div>
              <div class="productlistcontent">
                <h5 class="mt-1">{{ $product->name }}</h5>
                @if (($quantities[$product->id] ?? 0) > 0)
                <p style="border-top-left-radius: 5px" class="mb-3 quantity-display">
                  {{ __('orderitem.qty') }}:{{ $quantities[$product->id] ?? 0 }}
                </p>
                @endif
              </div>
            </button>
          </form>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</div>

{{-- Cash Payment Modal --}}
<div class="modal fade" id="cashPaymentModal" aria-hidden="true" aria-labelledby="cashPaymentModalLabel"
  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
        <h1 class="modal-title fs-5" id="cashPaymentModalLabel">{{ __('orderitem.cash_payment') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('orderitem.close') }}"></button>
      </div>
      <form method="POST" action="{{ route('payments.cash.store') }}" id="orderForm">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="delivery_method" id="delivery_method" value="{{ $currentMethod }}">
        <input type="hidden" name="delivery_id" id="delivery_id" value="">
        <input type="hidden" name="customer_id" id="customer_id" value="">
        <input type="hidden" name="table_id" id="table_id" value="">
        <input type="hidden" name="sales_session_id" id="sales_session_id" value="{{ $shift->id }}">

        <div class="modal-body">
          <div class="input-group input-group-sm mb-2">
            <span class="input-group-text" style="width: 110px;">{{ __('orderitem.amount') }}</span>
            <input type="number" step="0.01" class="form-control text-end" name="amount"
              id="amount" value="{{ number_format($totalPrice, 2, '.', '') }}" required readonly>
          </div>
          <div class="input-group input-group-sm mb-2">
            <span class="input-group-text" style="width: 110px;">{{ __('orderitem.vat_amount') }}</span>
            <input type="number" step="0.01" class="form-control text-end" name="vat_amount"
              id="vatAmount" value="{{ number_format($vatAmount, 2, '.', '') }}" required readonly>
          </div>
          <div class="input-group input-group-sm mb-2">
            <span class="input-group-text" style="width: 110px;">{{ __('orderitem.total_amount') }}</span>
            <input type="number" step="0.01" class="form-control text-end fw-bold"
              name="total_amount" id="total_amount"
              value="{{ number_format($totalAmount, 2, '.', '') }}" required readonly>
          </div>

          <hr class="my-2">
          <div class="input-group input-group-sm mb-2">
            <span class="input-group-text" style="width: 110px;">{{ __('orderitem.paid') }}</span>
            <input type="number" step="0.01" class="form-control text-end" name="paid"
              id="paid" value="{{ number_format($totalAmount, 2, '.', '') }}" required>
          </div>
          <div class="input-group input-group-sm mb-1">
            <span class="input-group-text" style="width: 110px;">{{ __('orderitem.remaining') }}</span>
            <input type="number" step="0.01" class="form-control text-end" name="remaining"
              id="remaining" value="0.00" required readonly>
          </div>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #dedede; padding: 0.5rem;">
          <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
            data-bs-dismiss="modal">{{ __('orderitem.close') }}</button>
          <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">{{ __('orderitem.confirm') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- Include Swiper JS --}}
<script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- Minimal JavaScript for essential functionality --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.order-slider', {
      loop: false,
      slidesPerView: 'auto',
      spaceBetween: 8,
      navigation: {
        nextEl: '.order-slider-container .swiper-button-next',
        prevEl: '.order-slider-container .swiper-button-prev',
        disabledClass: 'swiper-button-disabled',
      },
      allowTouchMove: true,
      grabCursor: true,
      freeMode: false,
      passiveListeners: true,
    });

    // --- Cash Payment Modal  ---
    const cashPaymentModal = document.getElementById('cashPaymentModal');
    const paidInput = document.getElementById('paid');
    const totalAmountInput = document.getElementById('total_amount');
    const remainingInput = document.getElementById('remaining');

    function updateRemaining() {
      if (!totalAmountInput || !paidInput || !remainingInput) return;
      const totalAmount = parseFloat(totalAmountInput.value) || 0;
      const paid = parseFloat(paidInput.value) || 0;
      const remaining = totalAmount - paid;
      remainingInput.value = remaining.toFixed(2);
    }

    if (cashPaymentModal && paidInput && totalAmountInput && remainingInput) {
      cashPaymentModal.addEventListener('shown.bs.modal', function() {
        const totalAmount = parseFloat(totalAmountInput.value) || 0;
        paidInput.value = totalAmount.toFixed(2);
        updateRemaining();
        paidInput.focus();
        paidInput.select();
      });
      paidInput.addEventListener('input', updateRemaining);
    }

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });

  $('#delivery_id_select').change(function() {
    $('#delivery_id').val($(this).val())
  })
  $('#customer_id_select').change(function() {
    $('#customer_id').val($(this).val())
  })
  $('#table_id_select').change(function() {
    $('#table_id').val($(this).val())
  })
</script>
@endsection