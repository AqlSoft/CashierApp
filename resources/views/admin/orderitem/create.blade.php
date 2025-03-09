@extends('layouts.admin')

@section('extra-links')
<link rel="stylesheet" href="{{ asset('assets/admin/css/orderitem.css') }}">
<style>
  .table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    background: #d3dce3;
    color: #000;
    padding-top: 10px;
  }
</style>
@endsection
@section('contents')
<h1 class="mt-3 pb-2 " style="border-bottom: 2px solid #dedede"> Add Order Items
</h1>

<fieldset class="table mt-3">

  <div class="row mt-3">
    <div class="col col-2 text-end fw-bold">Serial Number:</div>
    <div class="col col-4"> {{ $order->serial_number }}</div>
    <div class="col col-2 text-end fw-bold">Order Date:</div>
    <div class="col col-4">{{ $order->order_date }}</div>
    <div class="col col-2 text-end fw-bold">Client Name:</div>
    <div class="col col-4">{{ $order->customer->name  }}</div>
    <div class="col col-2 text-end fw-bold">Status:</div>
    <div class="col col-4">
      <span class="bg-transparent text-primary">{{ $status[$order->status]}}</span>
    </div>

  </div>

  <table class="mt-3 w-100   table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>category</th>
        <th>Product</th>
        <th>price</th>
        <th>Unit</th>
        <th>Quantity</th>
        <th>Notes</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      @php
      $counter = 0;
      @endphp
      @if (isset($order->orderItems) && count($order->orderItems))
      @foreach ($order->orderItems as $orderItem)
      <form action="{{ route('update-orderitem-input') }}" method="post">
        @csrf
        <input type="hidden" name="orderitem_id" value="{{ $orderItem->id }}">

        <tr>
          <td>{{ ++$counter }}</td>
          <td>
            <input value="{{ $orderItem->category->cat_name ?? 'N/A' }}" style="width: 150px">
          </td>

          <td data-bs-toggle="tooltip" data-bs-title="">
            <input value="{{ $orderItem->product->name ?? 'N/A' }}" style="width: 160px">
          </td>
          <td><input type="text" name="price" value="{{ $orderItem->price }}" style="width: 120px"></td>
          <td>
            <input value="{{ $orderItem->unit->name ?? 'N/A' }}" name="unit" style="width: 100px">
          </td>
          <td>
            <input type="number" name="quantity" value="{{ old('quantity', $orderItem->quantity) }}" id="quantity" style="width: 110px">
          </td>
          <td><input type="text" name="notes" value="{{ $orderItem->notes }}"></td>
          <td>
            <div class="d-flex btn-group">
              <button type="submit" class="btn btn-sm py-1 btn-outline-secondary" title="Update">
                <i class="fas fa-save"></i>
              </button>
              <button type="button" class="btn btn-sm py-1 btn-outline-secondary" title="Copy">
                <i class="fas fa-copy"></i>
              </button>
              <a href="{{ route('destroy-store-input-entry', $orderItem->id) }}"
                class="btn btn-sm py-1 btn-outline-secondary delete-entry"
                data-entry-id="{{ $orderItem->id }}"
                data-product-name="{{ $orderItem->product->name }}"
                onclick="return confirmDelete(this)" title="Delete">
                <i class="fas fa-trash"></i>
              </a>
            </div>
          </td>
        </tr>
      </form>
      @endforeach

      @else
      <tr>
        <td colspan="7">No order item has been added yet</td>
      </tr>
      @endif
      {{-- end of order item --}}
      {{-- Start input form --}}
      <form action="{{ route('save-orderitem-info') }}" method="post">
        @csrf
        <input type="hidden" name="order" value="{{ $order->id }}">

        <table class="table-secondary ">
          <tr class=" px-3 py-1">
            <td>{{ ++$counter }}</td>
            <td>
              <select name="category" style="width: 150px" id="category">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                @endforeach
              </select>
            </td>
            <td>
              <select id="product" name="product" class="" style="width: 160px" disabled>
                <option value="">Select a product</option>
              </select>
            </td>
            <td>
              <input type="text" class="" id="price" name="price" readonly placeholder="Price" style="width: 120px">
            </td>
            <td>
              <input type="text" class="" id="unit" name="unit" readonly placeholder="Unit" style="width: 100px">
              <input type="hidden" name="unit_id" id="unit_id">
            </td>
            <td>
              <input type="number" name="quantity" required id="quantity" style="width: 110px" placeholder="Quantity" style="width: 100px">
            </td>

            <td>
              <input type="text" name="notes" id="notes">
            </td>

            <td>
              <div class="btn-group">
                <button type="submit" class="btn btn-sm btn-outline-primary" title="Save">
                  <i class="fas fa-save"></i>
                </button>
                <button type="reset" class="btn btn-sm btn-outline-secondary" title="Reset">
                  <i class="fas fa-undo"></i>
                </button>
              </div>
            </td>
          </tr>
        </table>
      </form>
    </tbody>

  </table>

  <div class="input-group pt-2 px-3 justify-content-end">
    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Bach to Order">
      Bach to Order
    </button>
    
    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Confirm Order">
    <a class="btn btn-sm py-0" href="{{ route('add-invoices-orderItem', $order->id) }}">Confirm Order</a>
    </button>
    <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Order">
      Cancel Order
    </button>
  </div>
</fieldset>
<script>
  $(document).ready(function() {
    // عند تغيير الفئة
    $('#category').change(function() {
      var categoryId = $(this).val();
      var Url = "{{ route('get-products-by-category', ['categoryId' => ':categoryId']) }}";
      Url = Url.replace(':categoryId', categoryId);
      console.log(categoryId, Url);

      if (categoryId) {
        // طلب Ajax لاسترجاع المنتجات
        $.ajax({
          url: Url,
          type: "GET",
          dataType: 'json',
          success: function(data) {
            console.log(data);
            $('#product').empty().append('<option value="">Select a product</option>');
            $.each(data, function(key, product) {
              $('#product').append('<option value="' + product.id + '" data-price="' + product.sale_price + '" data-unit-id="' + product.unit.id + '" data-unit-name="' + product.unit.name + '">' + product.name + '</option>');
            });
            $('#product').prop('disabled', false);
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
        });
      } else {
        $('#product').empty().append('<option value="">Select a product</option>').prop('disabled', true);
        $('#price').val('');
        $('#unit').val('');
        $('#unit_id').val('');
      }
    });

    // عند تغيير المنتج
    $('#product').change(function() {
      var selectedProduct = $(this).find(':selected');
      var price = selectedProduct.data('price');
      var unitId = selectedProduct.data('unit-id'); // الحصول على unit_id
      var unitName = selectedProduct.data('unit-name'); // الحصول على unit_name
      $('#price').val(price);
      $('#unit').val(unitName); // تعبئة حقل الوحدة بـ unit_name
      $('#unit_id').val(unitId); // تعبئة حقل unit_id المخفي
    });
  });
</script>

@endsection