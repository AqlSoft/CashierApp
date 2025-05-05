@extends('layouts.admin')

@section('extra-links')
<link rel="stylesheet" href="{{ asset('assets/admin/css/orderitem.css') }}">

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

{{-- Main Content --}}
<div class="container">

  <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Display Products List
    <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addProductForm" aria-expanded="false"
      aria-controls="addProductForm">
      <i data-bs-toggle="tooltip" title="Add New product" class="fa fa-plus"></i>
    </a>
  </h1>
  <!-- هنا سيتم اضافة المنتجات -->
  <div class="row">
    <div class="col col-12 collapse  pt-3" id="addProductForm">
      <div class="row">
        <div
          class="col ">
          <div class="card card-body">
          <form action="{{ route('store-new-product') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="input-group sm mb-2">
                <label class="input-group-text" for="quantity">Categery</label>
                <select class="form-select form-control sm py-0" name="category_id" id="category_id">
                  <option readonly>All Categery Types</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                  @endforeach
                </select>
                <label class="input-group-text" for="name">Product Name</label>
                <input type="text" class="form-control sm" name="name" id="name" value="">
                <label class="input-group-text" for="cost_price">Cost Price</label>
                <input type="number" class="form-control sm" name="cost_price" id="cost_price">

              </div>
              <div class="input-group sm mt-2">

                <label class="input-group-text" for="admin_id">Person</label>
                <select class="form-select  form-control sm py-0" name="admin_id" id="admin_id">
                  <option readonly>All Persons</option>
                  @foreach ($admins as $admin)
                  <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                  @endforeach
                </select>
                <label class="input-group-text" for="sale_price">Sale Price</label>
                <input type="number" class="form-control sm" name="sale_price" id="sale_price">
                <label class="input-group-text" for="processing_time">Processing Time</label>
                <input type="time" class="form-control sm" value="{{date('H:i:s')}}" name="processing_time" id="processing_time">

              </div>
              <div class="input-group sm mt-2">
                <label class="input-group-text" for="brief">Description</label>
                <input type="text" class="form-control sm" name="brief" id="brief">
                <label class="input-group-text" for="image">Product Image</label>
                <input type="file" class="form-control sm" name="image" id="image" accept="image/*">
                <div class="input-group-text">
                  <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                    aria-label="Checkbox for following text input">
                </div>
                <button type="button" class="input-group-text text-start">Active</button>
              </div>
              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">

                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-left:760px;">Save </button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
    </div>
  </div>

  <!-- هنا سيتم عرض المنتجات -->
  <div class="row mt-3 d-flex gap-3">
    <div class="col col-10 col-7 pb-3 pt-3 px-4">
      <div class="row ">
        <div class="col col-12">
          <div class="btn-group ">
            <a class="btn btn-outline-secondary {{ request('category') == null ? 'active' : '' }}"
              href="{{ route('display-product-all') }}">All</a>
            @foreach ($categories as $category)
            <a class="btn btn-outline-primary {{ request('category') == $category->id ? 'active' : '' }}"
              href="{{ route('display-product-all', ['category' => $category->id]) }}">{{ $category->cat_name }}</a>
            @endforeach
          </div>

        </div>
        <div class="row mt-3 d-flex gap-2" id="product-list">
          @if (isset($products) && count($products))
          @foreach ($products as $product)
        
                    
          <div class="col col-2 productlist p-0 m-0"
            style="border-radius: 6px;border: 1px solid">
            <a  href="{{ route('view-product-info', $product->id) }}">
            <button class="product-item">
              <div class="productlistimg-container">
                <div class="productlistimg"
                  style="background-image: url('{{ $product->image ? asset('assets/admin/uploads/images/products/' . $product->image) : asset('assets/admin/images/default-product.png') }}');">
                </div>
                <div class="price-overlay d-flex flex-column">
                  <h5 class="price-display">{{ number_format($product->sale_price, 2) }}</h5>
                  <a class="btn btn-sm py-0 text-white btn-outline-primary" href="{{ route('view-product-info', $product->id) }}">
                      More</a>
                </div>
              </div>
              <div class="productlistcontent">
                <h5 class="mt-1">{{ $product->name }}</h5>

              </div>
            </button>
            </a>
          </div>
    
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>



  @endsection