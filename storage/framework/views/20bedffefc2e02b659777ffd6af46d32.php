<?php $__env->startSection('title', 'إدارة الضرائب'); ?>

<?php $__env->startSection('contents'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">قائمة الضرائب</h3>
                    <a href="<?php echo e(route('taxes.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> إضافة ضريبة جديدة
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="taxes-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>كود الضريبة</th>
                                <th>اسم الضريبة</th>
                                <th>النوع</th>
                                <th>القيمة</th>
                                <th>الحالة</th>
                                <th>تاريخ السريان</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($tax->tax_code); ?></td>
                                <td><?php echo e($tax->tax_name); ?></td>
                                <td>
                                    <?php if($tax->tax_type === 'PERCENTAGE'): ?>
                                        <span class="badge bg-info">نسبة مئوية</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">قيمة ثابتة</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($tax->formatted_tax_rate); ?></td>
                                <td>
                                    <?php if($tax->is_active): ?>
                                        <span class="badge bg-success">نشط</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">غير نشط</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($tax->effective_from->format('Y-m-d')); ?>

                                    <?php if($tax->effective_to): ?>
                                        <br>إلى <?php echo e($tax->effective_to->format('Y-m-d')); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.taxes.show', $tax)); ?>" class="btn btn-sm btn-info" title="عرض">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.taxes.edit', $tax)); ?>" class="btn btn-sm btn-primary" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger delete-tax" data-id="<?php echo e($tax->id); ?>" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($taxes->links()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!-- Delete Confirmation Modal -->
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
                <p class="text-danger">هذا الإجراء لا يمكن التراجع عنه.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#taxes-table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "<?php echo e(asset('adminlte/plugins/datatables/arabic.json')); ?>"
            }
        });

        // Delete button click handler
        $('.delete-tax').on('click', function() {
            const taxId = $(this).data('id');
            const form = $('#deleteForm');
            form.attr('action', `/admin/taxes/${taxId}`);
            $('#deleteModal').modal('show');
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/taxes/index.blade.php ENDPATH**/ ?>