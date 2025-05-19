@extends('admin.layouts.master')

@section('title', 'تفاصيل المورد')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تفاصيل المورد: {{ $supplier->name }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.suppliers.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-right"></i> رجوع
                        </a>
                        <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px">اسم المورد</th>
                                    <td>{{ $supplier->name }}</td>
                                </tr>
                                <tr>
                                    <th>اسم الشركة</th>
                                    <td>{{ $supplier->company_name ?: 'غير محدد' }}</td>
                                </tr>
                                <tr>
                                    <th>رقم الهاتف</th>
                                    <td>{{ $supplier->phone }}</td>
                                </tr>
                                <tr>
                                    <th>البريد الإلكتروني</th>
                                    <td>{{ $supplier->email ?: 'غير محدد' }}</td>
                                </tr>
                                <tr>
                                    <th>العنوان</th>
                                    <td>{{ $supplier->address ?: 'غير محدد' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px">الرقم الضريبي</th>
                                    <td>{{ $supplier->tax_number ?: 'غير محدد' }}</td>
                                </tr>
                                <tr>
                                    <th>السجل التجاري</th>
                                    <td>{{ $supplier->commercial_record ?: 'غير محدد' }}</td>
                                </tr>
                                <tr>
                                    <th>الرصيد</th>
                                    <td>{{ number_format($supplier->balance, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>الحالة</th>
                                    <td>
                                        <span class="badge badge-{{ $supplier->status === 'active' ? 'success' : 'danger' }}">
                                            {{ $supplier->status === 'active' ? 'نشط' : 'غير نشط' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ملاحظات</th>
                                    <td>{{ $supplier->notes ?: 'لا توجد ملاحظات' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- طلبات الشراء -->
                    <div class="mt-4">
                        <h4>طلبات الشراء</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الطلب</th>
                                        <th>التاريخ</th>
                                        <th>تاريخ التسليم المتوقع</th>
                                        <th>المبلغ الإجمالي</th>
                                        <th>الحالة</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($supplier->purchaseOrders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->po_number }}</td>
                                        <td>{{ $order->order_date->format('Y-m-d') }}</td>
                                        <td>{{ $order->expected_delivery_date?->format('Y-m-d') ?: 'غير محدد' }}</td>
                                        <td>{{ number_format($order->final_amount, 2) }}</td>
                                        <td>
                                            @switch($order->status)
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
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">لا توجد طلبات شراء</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
