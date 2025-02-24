@extends('layouts.admin')
@section('contents')
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fa fa-edit px-1"></i> Edit product Info  </h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div
      class=" card-body ">
      <form action="{{ route('update-product-info') }}" method="POST">
        <input type="hidden" name="id" value="{{ $product->id }}">
        @csrf
        <div class="input-group  mb-2">
          <label class="input-group-text text-muted" for="product"><i
              class="fa fa-tag  px-2"></i>Product Name</label>
          <input type="text" class="form-control " name="name"
            value="{{ old('name', $product) }}" />
          <label class="input-group-text text-muted" for="category"><i class="fa fa-tags  px-2"></i>
            Category</label>
          <select class="form-select form-control sm py-0" name="category" id="category">
            <option readonly>All Categery Types</option>
            @foreach ($cat as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          </select>
          <label class="input-group-text" for="admin_id">Person</label>
          <select class="form-select  form-control sm py-0" name="admin_id" id="admin_id">
            <option readonly>All Persons</option>
            @foreach ($admins as $admin)
            <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text text-muted" for="cost_price"><i
              class="fa fa-sticky-note  px-2"></i>Cost Price</label>
          <input type="text" class="form-control" name="cost_price" id="cost_price"
            value="{{ old('cost_price', $product) }}">
          <label class="input-group-text text-muted" for="cost_price"><i
              class="fa fa-sticky-note  px-2"></i>Quantity</label>
          <input type="text" class="form-control" name="quantity" id="quantity"
            value="{{ old('quantity', $product) }}">
          <label class="input-group-text" for="quantity">Status</label>
          <select class="form-select form-control sm py-0" name="status" id="status">
            @foreach ($status as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group  mt-2">
          <label class="input-group-text text-muted" for="brief"><i
              class="fa fa-file-alt  px-2"></i>Description</label>
          <input type="text" class="form-control " name="brief" id="brief"
            value="{{ old('description', $product) }}">

          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
            <i class="fas fa-undo me-1"></i> Reset
          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Save receipt Info changes">
            <i class="fas fa-save me-1"></i> Update
          </button>
        </div>
    </div>

    <!-- <div class="input-group  mt-2">
                                      <button type="reset" class="form-control btn btn-outline-info py-0">Reset Form</button>
                                      <button type="submit" class="form-control btn btn-outline-primary py-0">Edit Receipt</button>
                                    </div> -->


    </form>
  </div>

  </div>
</fieldset>
@endsection