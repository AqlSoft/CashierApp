@extends('layouts.admin')
@section('contents')
<div class="row">
  <div class="col col-8">
    <h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
        <i class="fas fa-info-circle px-1"></i>{{ __('products.show-title') }}
    </h2>
    <fieldset class="mt-2 ms-0 mb-0  shadow-sm">
      <div class="row mt-2">
        <div class="col-lg-12 col-sm-12">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{ __('products.category') }}:</div>
                <div class="col col-9">{{ $product->category->cat_name }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
                <div class="col col-3">{{ __('products.name') }}:</div>
                <div class="col col-9">{{ $product->name }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   ">{{__('products.brief')}} : </div>
              <div class="col col-9 ">{{ $product->description }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3  "> {{__('products.cost_price')}} : </div>
              <div class="col col-9 ">{{ $product->cost_price }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3  "> {{__('products.sale_price')}} : </div>
              <div class="col col-9 ">{{ $product->sale_price }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   ">{{__('products.processing_time')}} : </div>
              <div class="col col-9 ">{{ $product->processing_time }}</div>
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
                {{ $statusText }}
              </div>
            </div>

            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   ">{{__('products.created_by')}} : </div>
              <div class="col col-9 "> {{ $product->creator->userName }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> {{__('products.created_at')}} : </div>
              <div class="col col-9 ">{{ $product->created_at }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> {{__('products.edited_by')}} : </div>
              <div class="col col-9 ">{{ $product->editor->userName }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> {{__('products.updated_at')}} : </div>
              <div class="col col-9 text-start">{{ $product->updated_at }}</div>
            </div>
          </div>
        </div>

        <div class="input-group pt-2 justify-content-center align-items-center gap-2">
          <a href="{{route('display-product-all')}}"
            class="btn px-3 py-1 btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-circle-left"></i> {{__('products.action-back')}}</a>

          <a class="btn py-1 btn-outline-info btn-sm"
            href="{{ route('edit-product-info', $product->id) }}" data-bs-target="#editModal"
            data-bs-toggle="modal"><i
              class="fa fa-edit "></i> {{__('products.action-edit')}}</a>
          </a>
          <a class="btn py-1 px-3 btn-outline-warning btn-sm"
            href=""><i class="fa fa-gift "></i> {{__('products.action-offer')}}</a>
          </a>
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
          </a>

        </div>

        {{-- edit Modal --}}
        <div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="editModalLabel"
          tabindex="-1">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h2 class="mt-2 pb-2"><i class="fa fa-edit px-1"></i> {{__('products.edit-title')}} </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="" action="{{ route('update-product-info') }}" method="POST">
                <div class="modal-body">
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  @csrf
                  <div class="input-group  mb-2">
                    <label class="input-group-text text-muted" for="category->id"><i class="fa fa-tags  px-2"></i>
                    {{__('products.category')}}</label>
                    <select class="form-select form-control sm py-0" name="category->id" id="category->id">
                      <option readonly>{{__('products.all_categery_types')}}</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->cat_name }}</option>
                      @endforeach
                    </select>
                    <label class="input-group-text text-muted" for="product"><i
                        class="fa fa-tag  px-2"></i>{{__('products.name')}}</label>
                    <input type="text" class="form-control " name="name"
                      value="{{ old('name', $product) }}" />

                  </div>
                  <div class="input-group  mt-2">
                    <label class="input-group-text text-muted" for="sale_price"><i
                        class="fa fa-sticky-note  px-2"></i>{{__('products.sale_price')}}</label>
                    <input type="text" class="form-control" name="sale_price" id="sale_price"
                      value="{{ old('sale_price', $product) }}">
                    <label class="input-group-text text-muted" for="cost_price"><i
                        class="fa fa-sticky-note  px-2"></i>{{__('products.processing_time')}}</label>
                    <input type="text" class="form-control" name="processing_time" id="processing_time"
                      value="{{ old('processing_time', $product) }}">
                  </div>
                  <div class="input-group  mt-2">
                    <label class="input-group-text text-muted" for="brief"><i
                        class="fa fa-file-alt  px-2"></i>{{__('products.brief')}}</label>
                    <input type="text" class="form-control " name="brief" id="brief"
                      value="{{ old('description', $product) }}">
                    
                  </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #dedede; padding: 0.5rem;">
                  <button type="reset" class="input-group-text btn py-1 btn-outline-secondary"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
                    <i class="fas fa-undo me-1"></i> {{__('products.action-reset')}}
                  </button>
                  <button type="submit" class="input-group-text btn py-1 btn-outline-primary" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Save product Info changes">
                    <i class="fas fa-save me-1"></i> {{__('products.action-update')}}
                  </button>
                  <button type="button" class="btn px-3 py-1 btn-outline-danger btn-sm"
                    data-bs-dismiss="modal">{{__('products.action-close')}}</button>

                </div>
            </div>
            </form>

          </div>
        </div>
      </div>

  </div>


</div>
</fieldset>
</div>
@endsection