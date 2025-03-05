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
<h1 class="mt-3 pb-2 " style="border-bottom: 2px solid #dedede">Create Invoices
</h1>

<fieldset class="table mt-3">
  <form action="{{ route('save-invoices-orderitem-info') }}" method="post" class="bg-transparent">
    @csrf
    <input type="hidden" name="order" value="{{ $order->id }}">
    <div class="row mt-3 ">
      <div class="col col-2 text-end fw-bold bg-transparent">Serial Number:</div>
      <div class="col col-4 bg-transparent"> <input  value="{{ $order->serial_number  ?? 'N/A' }}" name="serial_number" style="width: 160px;border:none;border-bottom: 2px solid #dedede" disabled> </div>
      <div class="col col-2 text-end fw-bold bg-transparent">Order Date:</div>
      <div class="col col-4 bg-transparent"><input  value="{{  $order->order_date  ?? 'N/A' }}" name="order_date" style="width: 160px;border:none;border-bottom: 2px solid #dedede" disabled></div>
      <div class="col col-2 text-end fw-bold bg-transparent"> Invoice Number :</div>
      <div class="col col-4 bg-transparent"><input name="invoice_number" class="bg-transparent " style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
      <div class="col col-2 text-end fw-bold bg-transparent">Invoice Date:</div>
      <div class="col col-4 bg-transparent"><input name="invoice_date" value="{{ date('Y-m-d') }}"  placeholder="YYYY-MM-DD"  class="bg-transparent " style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
      <div class="col col-2 text-end fw-bold bg-transparent ">Vat Number:</div>
      <div class="col col-4 bg-transparent"><input name="vat_number" class="bg-transparent " style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
      <div class="col col-2 text-end fw-bold bg-transparent">Client Name:</div>
      <div class="col col-4 bg-transparent"><input  name="" value="{{$order->customer->name     ?? 'N/A' }}"  style="width: 160px;border:none;border-bottom: 2px solid #dedede" disabled>
      <input type="hidden" name="client_id" id="client_id" value="{{$order->customer->id}}">
      </div>
      <div class="col col-2 text-end fw-bold bg-transparent"> Order Status :</div>
      <div class="col col-4 bg-transparent">
        @if($order->status == 1)
        <span class="bg-transparent text-primary"><input value="{{$status[$order->status]     ?? 'N/A' }}" name="status" style="width: 160px;border:none;border-bottom: 2px solid #dedede" disabled></span>
        @endif
      </div>
      <div class="col col-2 text-end fw-bold bg-transparent">Due Date:</div>
      <div class="col col-4 bg-transparent"><input name="due_date" value="{{ date('Y-m-d') }}" class="bg-transparent " placeholder="YYYY-MM-DD"  style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
      <div class="col col-2 text-end fw-bold bg-transparent ">Payment Date:</div>
      <div class="col col-4 bg-transparent "><input name="payment_date" value="{{ date('Y-m-d') }}" class="bg-transparent " placeholder="YYYY-MM-DD"  style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
      <div class="col col-2 text-end fw-bold bg-transparent ">Invoice Type:</div>
      <div class="col col-4 bg-transparent "><input name="type" value="sales" class="bg-transparent " style="width: 160px;border:none;border-bottom: 2px solid #dedede"></div>
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
        @if (count($orderItems))
        @foreach ($orderItems as $orderItem)
        <tr>
          <td>{{ ++$counter }}</td>
          <td>{{ $orderItem->category->cat_name }}</td> <!-- عرض اسم الفئة -->
          <td>{{ $orderItem->product->name }}</td> <!-- عرض اسم المنتج -->
          <td>{{ $orderItem->price }}</td>
          <td>{{ $orderItem->unit->name }}</td> <!-- عرض اسم الوحدة -->
          <td>{{ $orderItem->quantity }}</td>
          <td>{{ $orderItem->notes }}</td>
        </tr>

        @endforeach
        @else
        <tr>
          <td colspan="7">No order Item has been added yet, Add your .</td>
        </tr>
        @endif
      </tbody>
      <tfoot class="bg-transparent mt-3">
    <tr>
        <td colspan="6" class="fw-bold text-end text-primary ">Invoice Total :</td>
        <td class="text-primary">
            <input id="invoice_total" name="invoice_total" class="bg-transparent" style="border:none;border-bottom: 2px solid #dedede" readonly>
        </td>
    </tr>
    <tr>
        <td colspan="6" class="fw-bold text-end text-primary ">Vat Amount :</td>
        <td class="text-primary">
            <input id="vat_amount" name="vat_amount" class="bg-transparent" style="border:none;border-bottom: 2px solid #dedede" >
        </td>
    </tr>
    <tr>
        <td colspan="6" class="fw-bold text-end text-primary ">Amount :</td>
        <td class="text-primary">
            <input id="amount" name="amount" class="bg-transparent" style="border:none;border-bottom: 2px solid #dedede">
        </td>
    </tr>
    <tr>
        <td colspan="6" class="fw-bold text-end text-primary ">Total Amount :</td>
        <td class="text-primary">
            <input id="total_amount" name="total_amount" class="bg-transparent" style="border:none;border-bottom: 2px solid #dedede" readonly>
        </td>
    </tr>
</tfoot>
    </table>

    <div class="input-group pt-2 px-3 justify-content-end">
      <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Create Invoice">
        Create Invoice
      </button>
      <button class="btn px-3 py-1 btn-outline-secondary btn-sm" title="Cancel Invoice">
        Cancel Invoice
      </button>
    </div>
  </form>
</fieldset>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // العناصر التي سنتعامل معها
    const invoiceTotalInput = document.getElementById('invoice_total');
    const vatAmountInput = document.getElementById('vat_amount');
    const amountInput = document.getElementById('amount');
    const totalAmountInput = document.getElementById('total_amount');

    // بيانات الطلب (يمكن جلبها من الخادم)
    const orderItems = {!! json_encode($orderItems) !!}; // تحويل بيانات الطلب إلى JSON

    // حساب إجمالي الفاتورة
    function calculateInvoiceTotal() {
      let total = 0;
      orderItems.forEach(item => {
        total += item.quantity * item.price;
      });
      return total;
    }

    // حساب قيمة الضريبة (افترض أن الضريبة 15%)
    function calculateVatAmount(invoiceTotal) {
      return invoiceTotal * 0.15;
    }

    // تحديث القيم عند تغيير المبلغ المدفوع
    amountInput.addEventListener('input', function () {
      const invoiceTotal = calculateInvoiceTotal();
      const vatAmount = calculateVatAmount(invoiceTotal);
      const amountPaid = parseFloat(amountInput.value) || 0;

      // تحديث القيم في الحقول
      invoiceTotalInput.value = invoiceTotal.toFixed(2);
      vatAmountInput.value = vatAmount.toFixed(2);
      totalAmountInput.value = (invoiceTotal + vatAmount).toFixed(2);
    });

    // حساب القيم عند تحميل الصفحة
    const invoiceTotal = calculateInvoiceTotal();
    const vatAmount = calculateVatAmount(invoiceTotal);

    invoiceTotalInput.value = invoiceTotal.toFixed(2);
    vatAmountInput.value = vatAmount.toFixed(2);
    totalAmountInput.value = (invoiceTotal + vatAmount).toFixed(2);
  });
</script>

@endsection