@extends('layouts.admin')

@section('title', 'تفاصيل مجموعة الضرائب: ' . $taxGroup->group_name_ar)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تفاصيل مجموعة الضرائب: {{ $taxGroup->group_name_ar }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tax-groups.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-right"></i> رجوع للقائمة
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">كود المجموعة:</th>
                                    <td>{{ $taxGroup->group_code }}</td>
                                </tr>
                                <tr>
                                    <th>الاسم (عربي):</th>
                                    <td>{{ $taxGroup->group_name_ar }}</td>
                                </tr>
                                <tr>
                                    <th>الاسم (إنجليزي):</th>
                                    <td>{{ $taxGroup->group_name_en }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">الحالة:</th>
                                    <td>
                                        @if($taxGroup->is_active)
                                            <span class="badge bg-success">نشط</span>
                                        @else
                                            <span class="badge bg-danger">غير نشط</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>تاريخ الإنشاء:</th>
                                    <td>{{ $taxGroup->created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <th>آخر تحديث:</th>
                                    <td>{{ $taxGroup->updated_at->format('Y-m-d') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($taxGroup->description)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">الوصف</h3>
                                </div>
                                <div class="card-body">
                                    {!! nl2br(e($taxGroup->description)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">الضرائب المدرجة في المجموعة</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>كود الضريبة</th>
                                                <th>اسم الضريبة</th>
                                                <th>نسبة الضريبة</th>
                                                <th>النوع</th>
                                                <th>الحالة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($taxGroup->taxes as $index => $tax)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $tax->tax_code }}</td>
                                                    <td>{{ $tax->tax_name_ar }}</td>
                                                    <td>{{ $tax->tax_rate }}%</td>
                                                    <td>
                                                        @if($tax->is_inclusive)
                                                            <span class="badge bg-info">شاملة</span>
                                                        @else
                                                            <span class="badge bg-primary">مضافة</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($tax->is_active)
                                                            <span class="badge bg-success">نشط</span>
                                                        @else
                                                            <span class="badge bg-danger">غير نشط</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">لا توجد ضرائب مضافة لهذه المجموعة</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('admin.tax-groups.edit', $taxGroup->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> تعديل
                    </a>
                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $taxGroup->id }}">
                        <i class="fas fa-trash"></i> حذف
                    </button>
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
                <p>هل أنت متأكد من رغبتك في حذف مجموعة الضرائب هذه؟</p>
                <p class="text-danger">
                    <i class="fas fa-exclamation-triangle"></i> تحذير: سيتم إزالة جميع العلاقات المرتبطة بهذه المجموعة.
                </p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
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
    .badge {
        font-size: 0.875em;
        padding: 0.4em 0.6em;
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>
@endpush

@push('scripts')
<script>
    $(function () {
        // Handle delete button click
        $('.delete-btn').on('click', function() {
            var id = $(this).data('id');
            var url = '{{ route("admin.tax-groups.destroy", ":id") }}';
            url = url.replace(':id', id);
            
            $('#deleteForm').attr('action', url);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endpush
