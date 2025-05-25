@extends('layouts.admin')

@section('extra-links')
<link rel="stylesheet" href="{{ asset('assets/admin/css/orderitem.css') }}">
@endsection

@section('contents')
{{-- Main Content --}}
<div class="container">

  <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{__('products.index-title')}}
    <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addProductForm" aria-expanded="false"
      aria-controls="addProductForm">
      <i data-bs-toggle="tooltip" title="{{__('products.add_new_product')}}" class="fa fa-plus"></i>
    </a>
  </h1>
  <!-- هنا سيتم اضافة المنتجات -->
  <div class="row">
    <div class="col col-12 collapse{{$errors->any() ? 'show' : ''}}  pt-3" id="addProductForm">
      <div class="row">
        <div class="col ">
          <div class="card card-body">
            <form action="{{ route('store-new-product') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="input-group sm mb-2">
                <label class="input-group-text" for="quantity">{{__('products.category')}}</label>
                <select class="form-select form-control sm py-0 @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                  <option readonly>{{__('products.all_categery_types')}}</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->cat_name }}</option>
                  @endforeach
                </select>

                <label class="input-group-text" for="name">{{__('products.name')}}</label>
                <input type="text" class="form-control sm @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
              </div>
              <div class="input-group sm mt-2">
                <label class="input-group-text" for="sale_price">{{__('products.sale_price')}}</label>
                <input type="number" class="form-control sm @error('sale_price') is-invalid @enderror" name="sale_price" id="sale_price" value="{{ old('sale_price') }}">

                <label class="input-group-text" for="image">{{__('products.image')}}</label>
                <input type="file" class="form-control sm py-0 @error('image') is-invalid @enderror" name="image" id="image" accept="image/*">
              </div>
              <div class="input-group sm mt-2">
                <label class="input-group-text" for="brief">{{__('products.brief')}}</label>
                <input type="text" class="form-control sm @error('brief') is-invalid @enderror" name="brief" id="brief" value="{{ old('brief') }}">

                <div class="input-group-text">
                  <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                    aria-label="Checkbox for following text input" {{ old('status') ? 'checked' : '' }}>
                </div>
                <button type="button" class="input-group-text text-start">{{__('products.active')}}</button>
              </div>
              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{__('products.action-save')}} </button>
              </div>

              @error('category_id')
              <span class="invalid-feedback d-block">{{ $message }}</span>
              @enderror
              @error('brief')
              <span class="invalid-feedback d-block">{{ $message }}</span>
              @enderror
              @error('name')
              <span class="invalid-feedback d-block">{{ $message }}</span>
              @enderror
              @error('sale_price')
              <span class="invalid-feedback d-block">{{ $message }}</span>
              @enderror
              @error('image')
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
  <div class="row mt-3 d-flex gap-3">
    <div class="col col-10 col-7 pb-3 pt-3 px-4">
      <div class="row ">
        <div class="col col-12">
          <div class="btn-group ">
            <a class="btn btn-outline-secondary {{ request('category') == null ? 'active' : '' }}"
              href="{{ route('display-product-all') }}">{{ __('products.all') }}</a>
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
            <a href="{{ route('view-product-info', $product->id) }}">
              <button class="product-item">
                <div class="productlistimg-container">
                  <div class="productlistimg"
                    style="background-image: url('{{ $product->image ? asset('assets/admin/uploads/images/products/' . $product->image) : asset('assets/admin/images/default-product.png') }}');">
                  </div>
                  <div class="price-overlay d-flex flex-column">
                    <h5 class="price-display">{{ number_format($product->sale_price, 2) }}</h5>
                    <a class="btn btn-sm py-0 text-white btn-outline-primary" href="{{ route('view-product-info', $product->id) }}">
                      {{__('products.action-more')}}</a>
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