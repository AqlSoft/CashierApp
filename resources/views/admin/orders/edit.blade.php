@extends('layouts.admin')
@section('contents')
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
  <i class="fa fa-edit px-1"></i> {{ __('orders.update_order_status') }}
</h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div class="card-body">
      <form action="{{ route('update-order-info') }}" method="POST">
        <input type="hidden" name="id" value="{{ $order->id }}">
        @csrf
        <div class="input-group mb-2">
          <label class="input-group-text" for="order_sn">{{ __('orders.order_sn') }}</label>
          <input type="number" class="form-control sm" name="order_sn" id="order_sn" value="{{ $order->order_sn }}" disabled>
          <label class="input-group-text" for="status">{{ __('orders.status') }}</label>
          <select class="form-select form-control sm py-0" name="status" id="status">
            @foreach ($status as $key => $value)
              <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
          </select>
          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('orders.reset_form') }}">
            <i class="fas fa-undo me-1"></i> {{ __('orders.reset') }}
          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="{{ __('orders.save_order_info_changes') }}">
            <i class="fas fa-save me-1"></i> {{ __('orders.update') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</fieldset>
@endsection