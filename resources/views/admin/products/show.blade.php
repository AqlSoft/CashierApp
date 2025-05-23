@extends('layouts.admin')
@section('contents')
<div class="row">
  <div class="col col-10">
    <div class="d-flex justify-content-between align-items-center gap-1" style="border-bottom: 1px solid #dedede">
      <h2 class="mt-4 pb-2" style="width:300px;">
        <i class="fas fa-info-circle "></i>{{ __('products.show-title') }}
      </h2>
      <div class="input-group pt-2 mx-5">
        <a href="{{route('display-product-all')}}"
          class="btn px-3 py-1 btn-outline-secondary btn-sm">
          <i class="fas fa-arrow-circle-left"></i> {{__('products.action-back')}}</a>
        <button id="editBtn" type="button" class="btn py-1 btn-outline-info btn-sm">
          <i class="fa fa-edit"></i> {{__('products.action-edit')}}
        </button>
        <a class="btn py-1 px-3 btn-outline-warning btn-sm"
          href=""><i class="fa fa-gift "></i> {{__('products.action-offer')}}</a>
        <a href="{{ route('park-product',  [$product->id]) }}" class="btn py-1 px-3 btn-outline-primary btn-sm">
          <i class="fa fa-parking "></i> {{__('products.action-park')}}</a>
        <a href="" class="btn px-3 py-1 btn-outline-danger btn-sm"
          onclick="if(!confirm('You are about to delete a product, are you sure!?.')){return false}"
          title="Delete Product and related Information" href="{{ route('destroy-product-info',  $product->id) }}"><i
            class="fa fa-trash "></i> {{__('products.action-delete')}}
        </a>
        <a class="btn px-3py-1 btn-outline-secondary btn-sm"
          href="{{ route('cancel-product-info',  $product->id) }}"><i
            class="fa fa-times "></i>{{__('products.action-cancel')}}</a>
      </div>
    </div>

    <form action="{{ route('update-product-info') }}" method="POST" id="productForm">
      <input type="hidden" name="id" value="{{ $product->id }}">
      @csrf
      <fieldset class="mt-2 ms-0 mb-0 shadow-sm" id="productFieldset" disabled>
        <div class="row mt-2">
          <div class="col-lg-10 col-sm-10">
            <div class="bulk border-dark p-0 m-1">
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{ __('products.category') }}:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="{{ $product->category->cat_name }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{ __('products.name') }}:</div>
                <div class="col col-9">
                  <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.brief')}}:</div>
                <div class="col col-9">
                  <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.cost_price')}}:</div>
                <div class="col col-9">
                  <input type="number" class="form-control" name="cost_price" value="{{ $product->cost_price }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.sale_price')}}:</div>
                <div class="col col-9">
                  <input type="number" class="form-control" name="sale_price" value="{{ $product->sale_price }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.processing_time')}}:</div>
                <div class="col col-9">
                  <input type="time" class="form-control" name="processing_time" value="{{ $product->processing_time }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.status')}}:</div>
                @php
                $statuses = \App\Models\Product::getStatusPro();
                $statusText = $statuses[$product->status] ?? 'Unknown Status';
                $statusClass = match($product->status) {
                \App\Models\Product::PRODUCT_JUST_CREATED => 'text-success',
                \App\Models\Product::PRODUCT_EDITING => 'text-warning',
                \App\Models\Product::PRODUCT__PARKED => 'text-info',
                \App\Models\Product::PRODUCT__CANCELED => 'text-danger',
                default => 'text-secondary'
                };
                @endphp
                <div class="col col-9 {{ $statusClass }}">
                  <input type="text" class="form-control-plaintext" readonly value="{{ $statusText }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.created_by')}}:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="{{ $product->creator->userName }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.created_at')}}:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="{{ $product->created_at }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.edited_by')}}:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="{{ $product->editor->userName }}">
                </div>
              </div>
              <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{__('products.updated_at')}}:</div>
                <div class="col col-9">
                  <input type="text" class="form-control-plaintext" readonly value="{{ $product->updated_at }}">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-2 px-3  justify-content-end">
          <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" id="saveBtn" style="display:none;margin-inline-start: auto;">
            <i class="fa fa-save"></i> {{ __('products.action-save') }}
          </button>
        </div>
      </fieldset>
    </form>
  </div>
</div>

<script>
  document.getElementById('editBtn').onclick = function() {
    document.getElementById('productFieldset').disabled = false;
    document.getElementById('saveBtn').style.display = 'inline-block';
  };
</script>
@endsection