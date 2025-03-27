@extends('layouts.admin')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/orderitem.css') }}">
@endsection

@section('contents')


  <h1 class="mt-3 pb-2 d-flex" style="border-bottom: 1px solid #dedede">
    Add Order Items <a href="{{ route('fast-creqate-order') }}" class="py-0 mx-2 d-flex align-items-center"><i data-bs-toggle="tooltip" title="Add New order" class="fa fa-plus py-0"></i> New</a>
    <div class="row gap-1 mx-4  ">
    @forelse ($orders as $pendingOrder)
    <a href="{{ route('add-orderitem', [$pendingOrder->id]) }}" title="Order SN - {{$pendingOrder->order_sn}}"
      class="col col-auto btn btn-sm btn-outline-secondary sm">{{ $pendingOrder->wait_no }}</a>
    @empty
    @endforelse
  </div>
  </h1>


<div class="container">
  <div class="row mt-3 d-flex gap-3">
    <div class="col col-4">
      <div class="row">
        <div class="col col-12">
          <!-- قائمة الفئات -->
          <select class="form-select form-control mt-2" id="category-select">
            <option selected value="">All category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
          
            @endforeach
          </select>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col col-12">
          <table class="table" id="selected-products">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Meal</th>
                <th scope="col">Qty</th>
                <th scope="col">U.Price</th>
                <th scope="col">T.Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- عرض العناصر المضافة -->
              @foreach ($order->orderItems as $oItem)
              <tr>
                <form action="{{route('update-orderitem')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $oItem->id }}">
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $oItem->product->name }}</td>
                  <td> <input type="number" name="quantity" value="{{  $oItem->quantity }}" id="quantity" style="width: 40px;border: 1px solid #dedede" ></td>
                  <td><input type="number" name="price" value="{{ old('price',$oItem->price) }}"    style="width: 60px;border: 1px solid #dedede"></td>
                  <td>{{ $oItem->quantity * $oItem->price }}</td>
                  <td>
                    <div class="d-flex btn-group">
                      <button type="submit" class="btn btn-sm py-1 " title="Update Order Item">
                        <i class="fas fa-save text-secondary"></i>
                      </button>
                      <a class="btn btn-sm py-1"
                        onclick="if(!confirm('You are about to delete a item, are you sure!?.')){return false}"
                        title="delete order and related Information"
                        href="{{ route('destroy-oItem-info', $oItem->id) }}">
                        <i class="fa fa-trash text-danger"></i>
                      </a>
                    </div>
                  </td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
          <!-- عرض الإجمالي الكلي -->
          <div class="total-price mt-2">
              <h4>Total Price: <span id="total-price">{{ $totalPrice }}</span></h4>
            </div>
            <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
          <div class="input-group pt-2 px-3 justify-content-end align-items-center">
          <a href="/admin/orders/index" class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Invoice">
                  Back To Order
               </a>
            @if ($order->status === 2)
            <button class="btn px-3 py-1 btn-outline-secondary btn-sm dropdown-toggle"
              id="submit-order-items" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Finish
            </button>
            @elseif($order->status === 3)
            <a href="{{ route('allow-order-editting', [$order->id]) }}"
              class="btn px-3 py-1 btn-outline-secondary">Allow edit</a>
            @endif
            <ul class="dropdown-menu">
              <li><a class="dropdown-item active" href="#" data-bs-target="#exampleModalToggle"
                  data-bs-toggle="modal">Cash Payment</a></li>
              <li><a class="dropdown-item" href="#">Debit Card</a></li>
              <li><a class="dropdown-item" href="#">Transfer</a></li>
              <li><a class="dropdown-item" href="#">Credit Sales</a></li>
            </ul>
          
            
          </div>
        </div>
      </div>
    </div>

    <div class="col col-7 pb-3 pt-3 px-4">
      <!-- عرض المنتجات -->
      <div class="row d-flex gap-2" id="product-list">
        @if (isset($products) && count($products))
        @foreach ($products as $product)
        <div class="col col-2 productlist p-0"
          style="border: 2px solid {{ in_array($product->id, $Ois) ? '#007bff' : '#f7f5f5' }}"
          data-category="{{ $product->category_id }}">
          <form action="/admin/orderItems/store/{{ $order->id }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <button type="submit" class="product-item">
              <div class="productlistimg"
                style="background-image: url('{{ $product->image ? asset('assets/admin/uploads/images/products/' . $product->image) : asset('assets/admin/images/default-product.png') }}');">
              </div>
              <div class="productlistcontent">
                <h5 class=" mt-1 ">{{ $product->name }}</h5>
                @if (($quantities[$product->id] ?? 0) > 0)
                <p class="mb-3 quantity-display">Qty:{{ $quantities[$product->id] ?? 0 }}
                </p>
                @endif
              </div>
              <div class="price-overlay">
                <h5 class="price-display">{{ $product->sale_price }}</h5>
              </div>
            </button>
          </form>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Cash Payment modal -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <h1 class="modal-title fs-5 mt-2 ps-3" id="exampleModalToggleLabel"
        style="border-bottom: 1px solid #dedede">Cash Payment</h1>
      <form id="cash-payment-form" action="{{ route('payments.cash.store') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <div class="modal-body">
          <!-- حقول الفورم -->
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="amount">Amount</label>
            <input type="number" step="0.01" class="form-control sm" name="amount" id="amount"
              value="{{ $totalPrice }}" required readonly>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="vatAmount">Vat Amount</label>
            <input type="number" step="0.01" class="form-control sm" name="vat_amount"
              id="vatAmount" value="{{ $vatAmount }}" required readonly>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="total_amount">Total Amount</label>
            <input type="number" step="0.01" class="form-control sm" name="total_amount"
              id="total_amount" value="{{ $totalAmount }}" required readonly>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="paid">Paid</label>
            <input type="number" step="0.01" class="form-control sm" name="paid" id="paid"
              value="0" required>
          </div>
          <div class="input-group sm mb-1">
            <label class="input-group-text" for="remaining">Remaining</label>
            <input type="number" step="0.01" class="form-control sm" name="remaining"
              id="remaining" value="{{ $remaining }}" required readonly>
          </div>

          <!-- زر الإرسال -->
          <div class="input-group pt-2 px-3 mt-2 justify-content-end" style="border-top: 1px solid #dedede">
            <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
              data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">Confirm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // تصفية المنتجات حسب الفئة
    $('#category-select').change(function() {
      const selectedCategoryId = $(this).val();

      $('.productlist').each(function() {
        const productCategoryId = $(this).data('category');

        if (selectedCategoryId === "" || productCategoryId == selectedCategoryId) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });

    // تحديث قيمة Remaining تلقائيًا عند تغيير قيمة Paid
    $('#paid').on('input', function() {
      const totalAmount = parseFloat($('#total_amount').val());
      const paid = parseFloat($(this).val());
      const remaining = totalAmount - paid;

      $('#remaining').val(remaining.toFixed(2));
    });
  });
</script>
@endsection
