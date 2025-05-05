@extends('layouts.admin')
@section('contents')
<div class="row">
  <div class="col col-8">
    <h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fas fa-info-circle px-1"></i>Product Details</h2>
    <fieldset class="mt-2 ms-0 mb-0  shadow-sm">
      <div class="row mt-2">
        <div class="col-lg-12 col-sm-12">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1  border-bottom border-dark-50  ">
              <div class="col col-3  "> Categery : </div>
              <div class="col col-9  ">{{ $product->category->cat_name }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1 ">
              <div class="col col-3  "> Product Name : </div>
              <div class="col col-9 ">{{ $product->name }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Description : </div>
              <div class="col col-9 ">{{ $product->description }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3  "> Cost Price : </div>
              <div class="col col-9 ">{{ $product->cost_price }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Processing Time : </div>
              <div class="col col-9 ">{{ $product->processing_time }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-3">Status:</div>
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
              <div class="col col-3   "> Created By : </div>
              <div class="col col-9 "> {{ $product->creator->userName }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Created At : </div>
              <div class="col col-9 ">{{ $product->created_at }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Edited By : </div>
              <div class="col col-9 ">{{ $product->editor->userName }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Modified: </div>
              <div class="col col-9 text-start">{{ $product->updated_at }}</div>
            </div>
          </div>
        </div>

        <div class="input-group pt-2 justify-content-center align-items-center gap-2">
          <a href="{{route('display-product-all')}}"
            class="btn px-3 py-1 btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-circle-left"></i> back</a>

          <a class="btn py-1 btn-outline-info btn-sm"
            href="{{ route('edit-product-info', $product->id) }}" data-bs-target="#editModal"
            data-bs-toggle="modal"><i
              class="fa fa-edit "></i> edit</a>
          </a>
          <a class="btn py-1 px-3 btn-outline-warning btn-sm"
            href=""><i class="fa fa-gift "></i> Offer</a>
          </a>
          <a href="{{ route('park-product',  [$product->id]) }}" class="btn py-1 px-3 btn-outline-primary btn-sm">
            <i class="fa fa-parking "></i> Park</a>
          <a href="" class="btn px-3 py-1 btn-outline-danger btn-sm"
            onclick="if(!confirm('You are about to delete a product, are you sure!?.')){return false}"
            title="Delete Product and related Information" href="{{ route('destroy-product-info',  $product->id) }}"><i
              class="fa fa-trash "></i> Delete
          </a>
          <a class="btn px-3py-1 btn-outline-secondary btn-sm"
            href="{{ route('cancel-product-info',  $product->id) }}"><i
              class="fa fa-times "></i>Cancel</a>
          </a>

        </div>

        {{-- edit Modal --}}
        <div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="editModalLabel"
          tabindex="-1">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h2 class="mt-2 pb-2"><i class="fa fa-edit px-1"></i> Edit product Info </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="" action="{{ route('update-product-info') }}" method="POST">
                <div class="modal-body">
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  @csrf
                  <div class="input-group  mb-2">
                    <label class="input-group-text text-muted" for="category->id"><i class="fa fa-tags  px-2"></i>
                      Category</label>
                    <select class="form-select form-control sm py-0" name="category->id" id="category->id">
                      <option readonly>All Categery Types</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->cat_name }}</option>
                      @endforeach
                    </select>
                    <label class="input-group-text text-muted" for="product"><i
                        class="fa fa-tag  px-2"></i>Product Name</label>
                    <input type="text" class="form-control " name="name"
                      value="{{ old('name', $product) }}" />

                  </div>
                  <div class="input-group  mt-2">
                    <label class="input-group-text text-muted" for="cost_price"><i
                        class="fa fa-sticky-note  px-2"></i>Cost Price</label>
                    <input type="text" class="form-control" name="cost_price" id="cost_price"
                      value="{{ old('cost_price', $product) }}">
                    <label class="input-group-text text-muted" for="cost_price"><i
                        class="fa fa-sticky-note  px-2"></i>Processing Time</label>
                    <input type="text" class="form-control" name="processing_time" id="processing_time"
                      value="{{ old('processing_time', $product) }}">
                  </div>
                  <div class="input-group  mt-2">
                    <label class="input-group-text text-muted" for="brief"><i
                        class="fa fa-file-alt  px-2"></i>Description</label>
                    <input type="text" class="form-control " name="brief" id="brief"
                      value="{{ old('description', $product) }}">
                    <label class="input-group-text" for="admin_id">Person</label>
                    <select class="form-select  form-control sm py-0" name="admin_id" id="admin_id">
                      <option readonly>All Persons</option>
                      @foreach ($admins as $admin)
                      <option value="{{ $admin->id }}" {{$product->created_by == $admin->id ? 'selected' :''}}>{{ $admin->userName }}</option>
                      @endforeach
                    </select>

                  </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #dedede; padding: 0.5rem;">
                  <button type="reset" class="input-group-text btn py-1 btn-outline-secondary"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
                    <i class="fas fa-undo me-1"></i> Reset
                  </button>
                  <button type="submit" class="input-group-text btn py-1 btn-outline-primary" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Save product Info changes">
                    <i class="fas fa-save me-1"></i> Update
                  </button>
                  <button type="button" class="btn px-3 py-1 btn-outline-danger btn-sm"
                    data-bs-dismiss="modal">Close</button>

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