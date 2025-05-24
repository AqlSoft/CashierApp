@extends('admin.layouts.master')

@section('title', 'تعديل طلب الشراء')

@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل طلب الشراء: {{ $purchaseOrder->po_number }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.purchase-orders.show', $purchaseOrder) }}" class="btn btn-default">
                            <i class="fas fa-arrow-right"></i> رجوع
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.purchase-orders.update', $purchaseOrder) }}" method="POST" id="purchase-order-form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier_id">المورد <span class="text-danger">*</span></label>
                                    <select name="supplier_id" 
                                            id="supplier_id" 
                                            class="form-control select2 @error('supplier_id') is-invalid @enderror" 
                                            required>
                                        <option value="">اختر المورد</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" 
                                                {{ old('supplier_id', $purchaseOrder->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->name }} - {{ $supplier->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="order_date">تاريخ الطلب <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           name="order_date" 
                                           id="order_date" 
                                           class="form-control @error('order_date') is-invalid @enderror" 
                                           value="{{ old('order_date', $purchaseOrder->order_date->format('Y-m-d')) }}" 
                                           required>
                                    @error('order_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="expected_delivery_date">تاريخ التسليم المتوقع</label>
                                    <input type="date" 
                                           name="expected_delivery_date" 
                                           id="expected_delivery_date" 
                                           class="form-control @error('expected_delivery_date') is-invalid @enderror" 
                                           value="{{ old('expected_delivery_date', $purchaseOrder->expected_delivery_date?->format('Y-m-d')) }}">
                                    @error('expected_delivery_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4>المنتجات</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="products-table">
                                    <thead>
                                        <tr>
                                            <th>المنتج</th>
                                            <th>الكمية</th>
                                            <th>سعر الوحدة</th>
                                            <th>نسبة الضريبة %</th>
                                            <th>قيمة الخصم</th>
                                            <th>الإجمالي</th>
                                            <th>ملاحظات</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchaseOrder->items as $index => $item)
                                        <tr class="product-row">
                                            <td>
                                                <select name="items[{{ $index }}][product_id]" 
                                                        class="form-control select2 product-select" 
                                                        required>
                                                    <option value="">اختر المنتج</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}" 
                                                            {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       name="items[{{ $index }}][quantity]" 
                                                       class="form-control quantity" 
                                                       min="1" 
                                                       value="{{ $item->quantity }}" 
                                                       required>
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       name="items[{{ $index }}][unit_price]" 
                                                       class="form-control unit-price" 
                                                       step="0.01" 
                                                       min="0" 
                                                       value="{{ $item->unit_price }}" 
                                                       required>
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       name="items[{{ $index }}][tax_percentage]" 
                                                       class="form-control tax-percentage" 
                                                       step="0.01" 
                                                       min="0" 
                                                       value="{{ $item->tax_percentage }}">
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       name="items[{{ $index }}][discount_amount]" 
                                                       class="form-control discount-amount" 
                                                       step="0.01" 
                                                       min="0" 
                                                       value="{{ $item->discount_amount }}">
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       class="form-control total-price" 
                                                       value="{{ $item->total_price }}" 
                                                       readonly>
                                            </td>
                                            <td>
                                                <input type="text" 
                                                       name="items[{{ $index }}][notes]" 
                                                       class="form-control" 
                                                       value="{{ $item->notes }}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8">
                                                <button type="button" class="btn btn-success" id="add-product">
                                                    <i class="fas fa-plus"></i> إضافة منتج
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="notes">ملاحظات</label>
                                    <textarea name="notes" 
                                              id="notes" 
                                              class="form-control @error('notes') is-invalid @enderror" 
                                              rows="3">{{ old('notes', $purchaseOrder->notes) }}</textarea>
                                    @error('notes')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>إجمالي المنتجات</th>
                                        <td>
                                            <input type="number" 
                                                   id="total-amount" 
                                                   class="form-control" 
                                                   value="{{ $purchaseOrder->total_amount }}" 
                                                   readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>إجمالي الضريبة</th>
                                        <td>
                                            <input type="number" 
                                                   id="tax-amount" 
                                                   class="form-control" 
                                                   value="{{ $purchaseOrder->tax_amount }}" 
                                                   readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>إجمالي الخصم</th>
                                        <td>
                                            <input type="number" 
                                                   id="discount-amount" 
                                                   class="form-control" 
                                                   value="{{ $purchaseOrder->discount_amount }}" 
                                                   readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>المبلغ النهائي</th>
                                        <td>
                                            <input type="number" 
                                                   id="final-amount" 
                                                   class="form-control" 
                                                   value="{{ $purchaseOrder->final_amount }}" 
                                                   readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ التعديلات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
$(function () {
    $('.select2').select2();

    function updateRowNumbers() {
        $('.product-row').each(function(index) {
            $(this).find('select, input').each(function() {
                var name = $(this).attr('name');
                if (name) {
                    $(this).attr('name', name.replace(/\d+/, index));
                }
            });
        });
    }

    function calculateTotals() {
        var totalAmount = 0;
        var taxAmount = 0;
        var discountAmount = 0;

        $('.product-row').each(function() {
            var quantity = parseFloat($(this).find('.quantity').val()) || 0;
            var unitPrice = parseFloat($(this).find('.unit-price').val()) || 0;
            var taxPercentage = parseFloat($(this).find('.tax-percentage').val()) || 0;
            var discount = parseFloat($(this).find('.discount-amount').val()) || 0;

            var rowTotal = quantity * unitPrice;
            var rowTax = (rowTotal * taxPercentage) / 100;

            totalAmount += rowTotal;
            taxAmount += rowTax;
            discountAmount += discount;

            $(this).find('.total-price').val(rowTotal.toFixed(2));
        });

        $('#total-amount').val(totalAmount.toFixed(2));
        $('#tax-amount').val(taxAmount.toFixed(2));
        $('#discount-amount').val(discountAmount.toFixed(2));
        $('#final-amount').val((totalAmount + taxAmount - discountAmount).toFixed(2));
    }

    $('#add-product').click(function() {
        var newRow = $('.product-row:first').clone();
        newRow.find('input').val('');
        newRow.find('select').val('');
        newRow.find('.quantity').val(1);
        newRow.find('.select2').remove();
        newRow.find('select').select2();
        $('#products-table tbody').append(newRow);
        updateRowNumbers();
    });

    $(document).on('click', '.remove-row', function() {
        if ($('.product-row').length > 1) {
            $(this).closest('tr').remove();
            updateRowNumbers();
            calculateTotals();
        }
    });

    $(document).on('change', '.quantity, .unit-price, .tax-percentage, .discount-amount', function() {
        calculateTotals();
    });

    $('#purchase-order-form').submit(function() {
        if ($('.product-row').length === 0) {
            alert('يجب إضافة منتج واحد على الأقل');
            return false;
        }
        return true;
    });

    // Calculate totals on page load
    calculateTotals();
});
</script>
@endsection
