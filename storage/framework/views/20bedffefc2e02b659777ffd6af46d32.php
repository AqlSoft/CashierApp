


<?php $__env->startSection('title', __('taxes.tax-management')); ?>

<div class="row">
    <div class="col-12">
        <div class="w-100">
            <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                <?php echo e(__('taxes.tax-list')); ?>

                <a class="ms-3 add-icon" href="<?php echo e(route('taxes.create')); ?>">
                    <i data-bs-toggle="tooltip" title="<?php echo e(__('taxes.add-tax')); ?>" class="fa fa-plus"></i>
                </a>
            </h1>
            <div>
                <table id="taxes-table" class="table table-striped mt-2 table-sm w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('taxes.tax-code')); ?></th>
                            <th><?php echo e(__('taxes.tax-name')); ?></th>
                            <th><?php echo e(__('taxes.tax-type')); ?></th>
                            <th><?php echo e(__('taxes.tax-rate')); ?></th>
                            <th><?php echo e(__('taxes.status')); ?></th>
                            <th><?php echo e(__('taxes.effective-date')); ?></th>
                            <th><?php echo e(__('taxes.actions')); ?></th>
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
                                    <span class="badge bg-info"><?php echo e(__('taxes.percentage')); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-secondary"><?php echo e(__('taxes.fixed')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($tax->formatted_tax_rate); ?></td>
                            <td>
                                <?php if($tax->is_active): ?>
                                    <span class="badge bg-success"><?php echo e(__('taxes.active')); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-danger"><?php echo e(__('taxes.inactive')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($tax->effective_from->format('Y-m-d')); ?>

                                <?php if($tax->effective_to): ?>
                                    <br><?php echo e(__('taxes.to')); ?> <?php echo e($tax->effective_to->format('Y-m-d')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo e(route('admin.taxes.show', $tax)); ?>" class="btn btn-sm btn-info" title="<?php echo e(__('taxes.show')); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.taxes.edit', $tax)); ?>" class="btn btn-sm btn-primary" title="<?php echo e(__('taxes.edit')); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger delete-tax" data-id="<?php echo e($tax->id); ?>" title="<?php echo e(__('taxes.delete')); ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <?php echo e($taxes->links()); ?>

            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><?php echo e(__('taxes.delete')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('taxes.cancel')); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('taxes.delete_confirm')); ?></p>
                <p class="text-danger"><?php echo e(__('taxes.delete_warning')); ?></p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('taxes.cancel')); ?></button>
                    <button type="submit" class="btn btn-danger"><?php echo e(__('taxes.delete')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

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
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/taxes/index.blade.php ENDPATH**/ ?>