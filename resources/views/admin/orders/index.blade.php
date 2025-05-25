@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('orders.orders-list') }}
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addOrderForm" aria-expanded="false"
            aria-controls="addOrderForm">
            <i data-bs-toggle="tooltip" title="{{ __('orders.add_new_order') }}" class="fa fa-plus"></i>
          </a>
        </h1>

        <!-- هنا سيتم اضافة الطلبات -->
        <div class="row">
          <div class="col col-12 collapse{{$errors->any() ? 'show' : ''}}  pt-3" id="addOrderForm">
            <div class="row">
              <div class="col ">
                <div class="card card-body">
                  <form action="/admin/orders/store" method="POST">
                    @csrf
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="order_sn">{{ __('orders.order_sn') }}</label>
                      <input type="number" class="form-control sm @error('order_sn') is-invalid @enderror" name="order_sn" id="order_sn"
                        value="{{ old('order_sn', $order_SN) }}">
                    

                      <label class="input-group-text" for="customer_id"> {{ __('orders.client') }}</label>
                      <select class="form-select  form-control sm py-0 @error('customer_id') is-invalid @enderror" name="customer_id"
                        id="customer_id">
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}"
                          {{ old('customer_id', $defaultCustomer && $customer->id == $defaultCustomer->id ? $customer->id : '') == $customer->id ? 'selected' : '' }}>
                          {{ $customer->name }}
                        </option>
                        @endforeach
                      </select>
                    
                      <label class="input-group-text" for="customer_id">
                        <a class="btn btn-sm py-0" href="#"
                          data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                          <i class="fa-solid fa-user-plus" title="{{ __('orders.view_details') }}"></i></a>
                      </label>
                      <label class="input-group-text" for="order_date">{{ __('orders.order_date') }}</label>
                      <input type="text" value="{{ old('order_date', date('Y-m-d')) }}" placeholder="YYYY-MM-DD"
                        class="fc-datepicker form-control sm @error('order_date') is-invalid @enderror" name="order_date"
                        id="order_date">
                    
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="notes">{{ __('orders.notes') }}</label>
                      <input type="text" class="form-control sm @error('notes') is-invalid @enderror" name="notes"
                        id="notes" value="{{ old('notes') }}">
                
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox"
                          value="1" aria-label="Checkbox for following text input" {{ old('status') ? 'checked' : '' }}>
                      </div>
                      <button type="button" class="input-group-text text-start">{{ __('orders.active') }}</button>
                    </div>
                  
                    <div class="input-group d-flex sm mt-2 justify-content-end"
                      style="border-top: 1px solid #aaa">
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2">{{ __('orders.save_order') }}</button>
                      <button type="reset" class="py-0 btn btn-secondary p-3 mt-2"
                        id="add-item">{{ __('orders.reset') }}</button>
                    </div>
                      @error('order_sn')
                      <span class="invalid-feedback d-block">{{ $message }}</span>
                      @enderror
                        @error('customer_id')
                      <span class="invalid-feedback d-block">{{ $message }}</span>
                      @enderror
                        @error('order_date')
                      <span class="invalid-feedback d-block">{{ $message }}</span>
                      @enderror
                        @error('notes')
                      <span class="invalid-feedback d-block">{{ $message }}</span>
                      @enderror
                  </form>
                </div>
              </div>

            </div>
            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
          </div>
        </div>
        <!-- هنا سيتم عرض المنتجات -->
        <table class="table table-striped  mt-3">
          <thead>
            <tr>
              <th> #</th>
              <th>{{ __('orders.order_sn') }}</th>
              <th>{{ __('orders.client_name') }}</th>
              <th>{{ __('orders.order_date') }}</th>
              <th>{{ __('orders.status') }}</th>
              <th>{{ __('orders.control') }}</th>
            </tr>
          </thead>
          <tbody>
            @php
            $counter = 0;
            @endphp
            @if (count($orders))
            @foreach ($orders as $order)
            <tr>
              <td>{{ ++$counter }}</td>
              <td>{{ $order->order_sn }}</td>
              <td>{{ @$order->customer->name }}</td>
              <td>{{ $order->order_date }}</td>
              <td>
                @if ($order->status == 1)
                <span class="badge bg-primary">{{ $status[$order->status] }}</span>
                @elseif($order->status == 2)
                <span class="badge bg-warning">{{ $status[$order->status] }}</span>
                @elseif($order->status == 3)
                <span class="badge bg-secondary">{{ $status[$order->status] }}</span>
                @elseif($order->status == 4)
                <span class="badge bg-info">{{ $status[$order->status] }}</span>
                @elseif($order->status == 5)
                <span class="badge bg-success">{{ $status[$order->status] }}</span>
                @else
                <span class="badge bg-danger">{{ $status[$order->status] }}</span>
                @endif
              </td>

              <td>
                @if ($order->status == 1 || $order->status == 2)
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"
                  title="{{ __('orders.add_order_item') }}"
                  href="{{ route('add-orderitem', [$order->id]) }}"><i
                    class="fa fa-square-plus text-success"></i></a>
                <a class="btn btn-sm py-0"
                  href="{{ route('edit-order-info', $order->id) }}"><i
                    class="fa fa-edit text-primary"></i></a>
                <a class="btn btn-sm py-0"
                  onclick="if(!confirm('{{ __('orders.confirm_archive') }}')){return false}"
                  title="{{ __('orders.archive_order') }}"
                  href="{{ route('destroy-order-info', $order->id) }}">
                  <i class="fa fa-trash text-danger"></i></a>
                @endif
                <a class="btn btn-sm py-0"
                  href="{{ route('view-order-info', $order->id) }}"><i
                    class="fas fa-eye text-success" title="{{ __('orders.view_details') }}"></i></a>
                @if ($order->status == 5)
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"
                  title="{{ __('orders.print_order') }}" href="#"><i
                    class="fa fa-print text-secondary"></i></a>
                @endif
                @if ($order->status == 0)
                <a class="btn btn-sm py-0"
                  onclick="if(!confirm('{{ __('orders.confirm_archive') }}')){return false}"
                  title="{{ __('orders.archive_order') }}"
                  href="{{ route('destroy-order-info', $order->id) }}"><i
                    class="fa fa-trash text-danger"></i></a>
                @endif
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7">{{ __('orders.no_orders_yet') }}</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<script>
  var date = $('.fc-datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
  }).val();
</script>
@endsection