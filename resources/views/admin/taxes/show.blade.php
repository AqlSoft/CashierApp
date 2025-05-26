@extends('layouts.admin')

@section('title', 'عرض الضريبة: ' . $tax->tax_name_ar)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تفاصيل الضريبة: {{ $tax->tax_name_ar }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.taxes.edit', $tax->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                            <i class="fas fa-trash"></i> حذف
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 30%;">كود الضريبة</th>
                                    <td>{{ $tax->tax_code }}</td>
                                </tr>
                                <tr>
                                    <th>الاسم (عربي)</th>
                                    <td>{{ $tax->tax_name_ar }}</td>
                                </tr>
                                <tr>
                                    <th>الاسم (إنجليزي)</th>
                                    <td>{{ $tax->tax_name_en }}</td>
                                </tr>
                                <tr>
                                    <th>نوع الضريبة</th>
                                    <td>
                                        @if($tax->tax_type == 'PERCENTAGE')
                                            نسبة مئوية
                                        @else
                                            قيمة ثابتة
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>قيمة الضريبة</th>
                                    <td>
                                        {{ number_format($tax->tax_rate, 2) }}
                                        {{ $tax->tax_type == 'PERCENTAGE' ? '%' : config('settings.currency_symbol', 'ر.س') }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 30%;">كود الحساب</th>
                                    <td>{{ $tax->gl_account_code ?? 'غير محدد' }}</td>
                                </tr>
                                <tr>
                                    <th>تاريخ البداية</th>
                                    <td>
                                        {{ $tax->effective_from ? $tax->effective_from->format('Y-m-d') : 'غير محدد' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>تاريخ النهاية</th>
                                    <td>
                                        {{ $tax->effective_to ? $tax->effective_to->format('Y-m-d') : 'غير محدد' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>الحالة</th>
                                    <td>
                                        @if($tax->is_active)
                                            <span class="badge badge-success">نشط</span>
                                        @else
                                            <span class="badge badge-danger">غير نشط</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>نوع الضريبة</th>
                                    <td>
                                        @if($tax->is_inclusive)
                                            <span class="badge badge-info">شاملة في السعر</span>
                                        @else
                                            <span class="badge badge-secondary">مضافة للسعر</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($tax->taxGroups->count() > 0)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>مجموعات الضرائب المرتبطة</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم المجموعة</th>
                                            <th>الوصف</th>
                                            <th>عدد الضرائب</th>
                                            <th>الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tax->taxGroups as $index => $group)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <a href="{{ route('admin.tax-groups.show', $group->id) }}">
                                                        {{ $group->group_name }}
                                                    </a>
                                                </td>
                                                <td>{{ $group->description ?? 'لا يوجد وصف' }}</td>
                                                <td>{{ $group->taxes_count ?? $group->taxes->count() }}</td>
                                                <td>
                                                    @if($group->is_active)
                                                        <span class="badge badge-success">نشط</span>
                                                    @else
                                                        <span class="badge badge-danger">غير نشط</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">سجل التعديلات</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="far fa-calendar-plus text-primary mr-1"></i>
                                            <strong>تاريخ الإنشاء:</strong>
                                            {{ $tax->created_at->format('Y-m-d H:i') }}
                                        </li>
                                        @if($tax->created_by)
                                            <li>
                                                <i class="far fa-user text-primary mr-1"></i>
                                                <strong>تم إنشاؤها بواسطة:</strong>
                                                {{ $tax->creator->name ?? 'مستخدم غير معروف' }}
                                            </li>
                                        @endif
                                        @if($tax->updated_at != $tax->created_at)
                                            <li>
                                                <i class="far fa-edit text-warning mr-1"></i>
                                                <strong>آخر تحديث:</strong>
                                                {{ $tax->updated_at->format('Y-m-d H:i') }}
                                            </li>
                                        @endif
                                        @if($tax->updated_by && $tax->updated_by != $tax->created_by)
                                            <li>
                                                <i class="far fa-user text-warning mr-1"></i>
                                                <strong>تم التحديث بواسطة:</strong>
                                                {{ $tax->editor->name ?? 'مستخدم غير معروف' }}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">معلومات إضافية</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>الوصف</label>
                                        <p class="text-muted">
                                            {{ $tax->description ?? 'لا يوجد وصف' }}
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>ملاحظات</label>
                                        <p class="text-muted">
                                            {{ $tax->notes ?? 'لا توجد ملاحظات' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('admin.taxes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-right"></i> رجوع للقائمة
                    </a>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من رغبتك في حذف هذه الضريبة؟</p>
                <p class="text-danger">
                    <i class="fas fa-exclamation-triangle"></i> تحذير: لا يمكن التراجع عن هذه العملية.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <form action="{{ route('admin.taxes.destroy', $tax->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> حذف
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th {
        background-color: #f8f9fa;
    }
    .badge {
        font-size: 0.875em;
    }
</style>
@endpush
