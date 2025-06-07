

<?php $__env->startSection('title', 'إدارة مجموعات الضرائب'); ?>



    <div class="row">
        <div class="col-12">
            <div class=" w-100">
                          <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('tax-groups.tax-groups-list')); ?>

        <a class="ms-3 add-icon" href="<?php echo e(route('admin.tax-groups.create')); ?>">
          <i data-bs-toggle="tooltip" title="Add New tax-groups" class="fa fa-plus"></i>
        </a>
      </h1>
                
                <!-- /.card-header -->
                <div class="">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> تم بنجاح!</h5>
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> خطأ!</h5>
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="table-responsive ">
                        <table class="table table-striped mt-2 table-sm w-100" id="tax-groups-table">
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
                                <?php $__empty_1 = true; $__currentLoopData = $taxGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($group->group_code); ?></td>
                                        <td><?php echo e($group->group_name_ar); ?></td>
                                        <td><?php echo e($group->group_name_en); ?></td>
                                        <td>
                                            <span class="badge bg-info">
                                                <?php echo e($group->taxes_count ?? 0); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php if($group->is_active): ?>
                                                <span class="badge bg-success">نشط</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">غير نشط</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($group->created_at->format('Y-m-d')); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo e(route('admin.tax-groups.show', $group->id)); ?>" 
                                                   class="btn btn-sm btn-info" title="عرض">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?php echo e(route('admin.tax-groups.edit', $group->id)); ?>" 
                                                   class="btn btn-sm btn-primary" title="تعديل">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                                        data-id="<?php echo e($group->id); ?>" title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center">لا توجد مجموعات ضرائب متاحة</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <?php echo e($taxGroups->links()); ?>

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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> حذف
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('styles'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>

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
                "url": "<?php echo e(asset('adminlte/plugins/datatables/arabic.json')); ?>"
            },
            "order": [[0, 'asc']]
        });

        // Handle delete button click
        $('.delete-btn').on('click', function() {
            var id = $(this).data('id');
            var url = '<?php echo e(route("admin.tax-groups.destroy", ":id")); ?>';
            url = url.replace(':id', id);
            
            $('#deleteForm').attr('action', url);
            $('#deleteModal').modal('show');
        });

        // Show success/error messages
        <?php if(session('success') || session('error')): ?>
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        <?php endif; ?>
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/tax-groups/index.blade.php ENDPATH**/ ?>