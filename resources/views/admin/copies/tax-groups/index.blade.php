

@section('title', 'إدارة مجموعات الضرائب')



    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-header">
                    <h3 class="card-title">قائمة مجموعات الضرائب</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tax-groups.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> إضافة مجموعة جديدة
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> تم بنجاح!</h5>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> خطأ!</h5>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive ">
                        <table class="table table-bordered table-hover w-100" id="tax-groups-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>كود المجموعة</th>
                                    <th>الاسم (عربي)</th>
                                    <th>الاسم (إنجليزي)</th>
                                    <th>عدد الضرائب</th>
                                    <th>الحالة</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($taxGroups as $index => $group)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $group->group_code }}</td>
                                        <td>{{ $group->group_name_ar }}</td>
                                        <td>{{ $group->group_name_en }}</td>
                                        <td>
                                            <span class="badge bg-info">
                                                {{ $group->taxes_count ?? 0 }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($group->is_active)
                                                <span class="badge bg-success">نشط</span>
                                            @else
                                                <span class="badge bg-danger">غير نشط</span>
                                            @endif
                                        </td>
                                        <td>{{ $group->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.tax-groups.show', $group->id) }}" 
                                                   class="btn btn-sm btn-info" title="عرض">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.tax-groups.edit', $group->id) }}" 
                                                   class="btn btn-sm btn-primary" title="تعديل">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                                        data-id="{{ $group->id }}" title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">لا توجد مجموعات ضرائب متاحة</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $taxGroups->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

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


@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
    .btn-group {
        display: flex;
        gap: 5px;
    }
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }
    .table td, .table th {
        vertical-align: middle;
        text-align: center;
    }
    .badge {
        font-size: 0.875em;
        padding: 0.4em 0.6em;
    }
</style>
@endpush

@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function () {
        // Initialize DataTable with Arabic language
        $('#tax-groups-table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "{{ asset('adminlte/plugins/datatables/arabic.json') }}"
            },
            "order": [[0, 'asc']]
        });

        // Handle delete button click
        $('.delete-btn').on('click', function() {
            var id = $(this).data('id');
            var url = '{{ route("admin.tax-groups.destroy", ":id") }}';
            url = url.replace(':id', id);
            
            $('#deleteForm').attr('action', url);
            $('#deleteModal').modal('show');
        });

        // Show success/error messages
        @if(session('success') || session('error'))
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        @endif
    });
</script>
@endpush
