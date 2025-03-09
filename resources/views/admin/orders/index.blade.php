@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Order List
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addOrderForm" aria-expanded="false"
            aria-controls="addOrderForm">
            <i data-bs-toggle="tooltip" title="Add New order" class="fa fa-plus"></i>
          </a>
        </h1>
        <!-- add Client modal -->
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
          tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-sm ">
            <form action="/admin/clients/store" method="POST">
              @csrf
              <div class="modal-content">
                <h1 class="modal-title fs-5 mt-2  ps-3" id="exampleModalToggleLabel"
                  style="border-bottom: 1px solid #dedede">Add New Client </h1>
                <div class="modal-body">
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="name">Clent name</label>
                    <input type="text" class="form-control sm" name="name" id="name">
                  </div>
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="phone">Phone Number</label>
                    <input type="number" class=" form-control sm " name="phone" id="phone">
                  </div>
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="address">Address</label>
                    <input type="text" class="form-control sm" name="address" id="address">
                  </div>
                  <div class="input-group pt-2 px-3 mt-2 justify-content-end "
                    style="border-top: 1px solid #dedede">
                    <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
                      data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">Save Client</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div> 
        <!-- هنا سيتم اضافة الطلبات -->
        <div class="row">
          <div class="col col-12 collapse  pt-3" id="addOrderForm">
            <div class="row">
              <div
                class="col ">
                <div class="card card-body">
                  <form action="/admin/orders/store" method="POST">
                    @csrf
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="serial_number">Serial Number</label>
                      <input type="number" class="form-control sm" name="serial_number" id="serial_number">
                      <label class="input-group-text" for="customer_id"> Client</label>
                      <select class="form-select  form-control sm py-0" name="customer_id" id="customer_id">
                        <option readonly>All Client</option>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                      </select>
                      <label class="input-group-text" for="customer_id">
                        <a class="btn btn-sm py-0" href="#" data-bs-target="#exampleModalToggle"
                          data-bs-toggle="modal">
                          <i class="fa-solid fa-user-plus" title="View Details"></i></a>
                      </label>
                      <label class="input-group-text" for="order_date">Order Date</label>
                      <input type="text" value="{{ date('Y-m-d') }}" placeholder="YYYY-MM-DD" class="fc-datepicker form-control sm " name="order_date" id="order_date">
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="notes">Notes</label>
                      <input type="text" class="form-control sm" name="notes" id="notes">
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                          aria-label="Checkbox for following text input">
                      </div>
                      <button type="button" class="input-group-text text-start">Active</button>
                    </div>
                    <div class="input-group d-flex sm mt-2 justify-content-end" style="border-top: 1px solid #aaa">
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2">Save Order</button>
                      <button type="reset" class="py-0 btn btn-secondary p-3 mt-2" id="add-item">reset</button>
                    </div>
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
              <th>Serial Number</th>
              <th>Client Name</th>
              <th>Order Date</th>
              <th>Status</th>
              <th>Control</th>
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
              <td>{{ $order->serial_number}}</td>
              <td>{{ @$order->customer->name }}</td> <!-- اسم العميل -->
              <td>{{ $order->order_date }}</td>
              <td>
                @if($order->status == 1)
                <span class="badge bg-primary">New</span>
                @elseif($order->status == 2)
                <span class="badge bg-warning">In Progress</span>
                @else
                <span class="badge bg-success">Completed</span>
                @endif
              </td>

              <td>
                @if($order->status == 1 || $order->status == 2)
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Add order item"
                  href="{{ route('add-orderitem-input-entry', [$order->id]) }}"><i
                    class="fa fa-square-plus text-success"></i></a>
                @endif
                <a class="btn btn-sm py-0" href="{{ route('view-order-info', $order->id) }}"><i
                    class="fas fa-eye text-success" title="View Details"></i></a>
                <a class="btn btn-sm py-0" href="{{ route('edit-order-info', $order->id) }}"><i
                    class="fa fa-edit text-primary"></i></a>
                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print order"
                  href="#"><i class="fa fa-print text-secondary"></i></a>
                <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a order, are you sure!?.')){return false}"
                  title="Delete order and related Information" href="{{ route('destroy-order-info', $order->id) }}"><i
                    class="fa fa-trash text-danger"></i></a>

              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7">No order has been added yet, Add your .</td>
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