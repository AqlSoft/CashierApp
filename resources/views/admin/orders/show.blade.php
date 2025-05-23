@extends('layouts.admin')
@section('contents')
<div class="row">
  <div class="col col-8">
    <h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
      <i class="fas fa-info-circle px-1"></i>{{ __('orders.order_details') }}
    </h2>
    <fieldset class="mt-2 ms-0 mb-0 shadow-sm">
      <div class="row mt-2">
        <div class="col-lg-12 col-sm-12">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.order_sn') }} :</div>
              <div class="col col-9">{{ $order->order_sn }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.order_date') }} :</div>
              <div class="col col-9">{{ $order->order_date }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.client_name') }} :</div>
              <div class="col col-9">{{ $order->customer->name }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.notes') }} :</div>
              <div class="col col-9">{{ $order->notes }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.status') }} :</div>
              <div class="col col-9">{{ $status[$order->status] }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.created_by') }} :</div>
              <div class="col col-9">{{ @$order->creator->userName }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.created_at') }} :</div>
              <div class="col col-9">{{ $order->created_at }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.edited_by') }} :</div>
              <div class="col col-9">{{ @$order->editor->userName }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">{{ __('orders.updated_at') }} :</div>
              <div class="col col-9 text-start">{{ $order->updated_at }}</div>
            </div>
          </div>
        </div>
      </div>
    </fieldset>
  </div>
</div>
@endsection