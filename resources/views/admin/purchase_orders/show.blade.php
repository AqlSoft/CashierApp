@extends('admin.layouts.master')

@section('title', 'تفاصيل طلب الشراء')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تفاصيل طلب الشراء: {{ $purchaseOrder->po_number }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.purchase-orders.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-right"></i> رجوع
                        </a>
                        @if(in_array($purchaseOrder->status, ['draft', 'pending']))
                        <a href="{{ route('admin.purchase-orders.edit', $purchaseOrder) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>معلومات الطلب</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px">رقم الطلب</th>
                                    <td>{{ $purchaseOrder->po_number }}</td>
                                </tr>
                                <tr>
                                    <th>المورد</th>
                                    <td>
                                        <a href="{{ route('admin.suppliers.show', $purchaseOrder->supplier) }}">
                                            {{ $purchaseOrder->supplier->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>تاريخ الطلب</th>
                                    <td>{{ $purchaseOrder->order_date->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <th>تاريخ التسليم المتوقع</th>
                                    <td>{{ $purchaseOrder->expected_delivery_date?->format('Y-m-d') ?: 'غير محدد' }}</td>
                                </tr>
                                <tr>
                                    <th>الحالة</th>
                                    <td>
                                        @switch($purchaseOrder->status)
                                            @case('draft')
                                                <span class="badge badge-secondary">مسودة</span>
                                                @break
                                            @case('pending')
                                                <span class="badge badge-warning">قيد الانتظار</span>
                                                @break
                                            @case('approved')
                                                <span class="badge badge-info">معتمد</span>
                                                @break
                                            @case('received')
                                                <span class="badge badge-success">تم الاستلام</span>
                                                @break
                                            @case('cancelled')
                                                <span class="badge badge-danger">ملغي</span>
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>معلومات إضافية</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px">تم الإنشاء بواسطة</th>
                                    <td>{{ $purchaseOrder->createdBy->name }}</td>
                                </tr>
                                <tr>
                                    <th>تاريخ الإنشاء</th>
                                    <td>{{ $purchaseOrder->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                                @if($purchaseOrder->approved_by)
                                <tr>
                                    <th>تم الاعتماد بواسطة</th>
                                    <td>{{ $purchaseOrder->approvedBy->name }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>ملاحظات</th>
                                    <td>{{ $purchaseOrder->notes ?: 'لا توجد ملاحظات' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>المنتجات</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المنتج</th>
                                        <th>الكمية</th>
                                        <th>سعر الوحدة</th>
                                        <th>الإجمالي</th>
                                        <th>نسبة الضريبة</th>
                                        <th>قيمة الضريبة</th>
                                        <th>قيمة الخصم</th>
                                        <th>السعر النهائي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchaseOrder->items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->unit_price, 2) }}</td>
                                        <td>{{ number_format($item->total_price, 2) }}</td>
                                        <td>{{ $item->tax_percentage }}%</td>
                                        <td>{{ number_format($item->tax_amount, 2) }}</td>
                                        <td>{{ number_format($item->discount_amount, 2) }}</td>
                                        <td>{{ number_format($item->final_price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">الإجمالي</th>
                                        <td>{{ number_format($purchaseOrder->total_amount, 2) }}</td>
                                        <th colspan="2">إجمالي الضريبة</th>
                                        <td>{{ number_format($purchaseOrder->tax_amount, 2) }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="7">إجمالي الخصم</th>
                                        <td>{{ number_format($purchaseOrder->discount_amount, 2) }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="8">المبلغ النهائي</th>
                                        <td>{{ number_format($purchaseOrder->final_amount, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    @if(!in_array($purchaseOrder->status, ['received', 'cancelled']))
                    <div class="mt-4">
                        <div class="btn-group">
                            @if($purchaseOrder->status === 'pending')
                            <form action="{{ route('admin.purchase-orders.approve', $purchaseOrder) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success" onclick="return confirm('هل أنت متأكد من اعتماد الطلب؟')">
                                    <i class="fas fa-check"></i> اعتماد الطلب
                                </button>
                            </form>
                            @endif

                            @if($purchaseOrder->status === 'approved')
                            <form action="{{ route('admin.purchase-orders.receive', $purchaseOrder) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary" onclick="return confirm('هل أنت متأكد من استلام الطلب؟')">
                                    <i class="fas fa-truck"></i> استلام الطلب
                                </button>
                            </form>
                            @endif

                            @if(in_array($purchaseOrder->status, ['draft', 'pending', 'approved']))
                            <form action="{{ route('admin.purchase-orders.cancel', $purchaseOrder) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من إلغاء الطلب؟')">
                                    <i class="fas fa-times"></i> إلغاء الطلب
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
