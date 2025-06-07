
  <div class="row">
    <div class="col-md-12">
      <div id="units-container">
        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('units.units-list')); ?>

          <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createUnitModal" aria-expanded="false"
            aria-controls="addUnitForm">
            <i data-bs-toggle="tooltip" title="Add New Unit" class="fa fa-plus"></i>
          </a>
        </h1>
        <!-- Modals -->
        <!-- Create Modal -->
        <div class="modal fade" id="createUnitModal" aria-hidden="true" aria-labelledby="createUnitModalLabel"
          tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="createUnitModalLabel"><?php echo e(__('units.new-unit-modal-title')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="p-3" method="POST" action="<?php echo e(route('store-new-unit')); ?>">
                <?php echo csrf_field(); ?>

                <div class="mb-2 input-group sm">
                  <label class="input-group-text"><?php echo e(__('units.name')); ?></label>
                  <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                </div>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="mb-2 input-group sm">
                  <label class="input-group-text"><?php echo e(__('units.brief')); ?></label>
                  <input type="text" name="brief" class="form-control" value="<?php echo e(old('brief')); ?>">
                </div>
                <?php $__errorArgs = ['brief'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="mb-2 input-group sm">
                  <label class="input-group-text"><?php echo e(__('units.status')); ?></label>
                  <select name="status" class="form-select" required>
                    <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>><?php echo e(__('units.active')); ?></option>
                    <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>><?php echo e(__('units.inactive')); ?></option>
                  </select>
                </div>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-outline-primary py-1"><?php echo e(__('units.save-unit')); ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Edit Modal -->
        <?php if(isset($unitToEdit)): ?>
        <div class="modal fade show" id="editUnitModal" tabindex="-1" aria-labelledby="editUnitModalLabel" style="display:block;" aria-modal="true" role="dialog">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="editUnitModalLabel"><?php echo e(__('units.edit-unit-modal-title')); ?></h1>
                <a href="<?php echo e(route('display-units-all')); ?>" class="btn-close"></a>
              </div>
              <form class="p-3" method="POST" action="<?php echo e(route('update-unit-info', $unitToEdit->id)); ?>">
                <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>

                <div class="mb-2 input-group sm">
                  <label class="input-group-text"><?php echo e(__('units.name')); ?></label>
                  <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $unitToEdit->name)); ?>" required>
                </div>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="mb-2 input-group sm">
                  <label class="input-group-text"><?php echo e(__('units.brief')); ?></label>
                  <input type="text" name="brief" class="form-control" value="<?php echo e(old('brief', $unitToEdit->brief)); ?>">
                </div>
                <?php $__errorArgs = ['brief'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="mb-2 input-group sm">
                  <label class="input-group-text"><?php echo e(__('units.status')); ?></label>
                  <select name="status" class="form-select" required>
                    <option value="1" <?php echo e(old('status', $unitToEdit->status) == '1' ? 'selected' : ''); ?>><?php echo e(__('units.active')); ?></option>
                    <option value="0" <?php echo e(old('status', $unitToEdit->status) == '0' ? 'selected' : ''); ?>><?php echo e(__('units.inactive')); ?></option>
                  </select>
                </div>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-outline-primary py-1"><?php echo e(__('units.save-unit')); ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <table class="table table-striped mt-2 w-100">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo e(__('units.name')); ?></th>
              <th><?php echo e(__('units.brief')); ?></th>
              <th><?php echo e(__('units.status')); ?></th>
              <th><?php echo e(__('units.control')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($index + 1); ?></td>
              <td><?php echo e($unit->name); ?></td>
              <td><?php echo e($unit->brief); ?></td>
              <td>
                <?php if($unit->status): ?>
                <span class="badge bg-success"><?php echo e(__('units.active')); ?></span>
                <?php else: ?>
                <span class="badge bg-secondary"><?php echo e(__('units.inactive')); ?></span>
                <?php endif; ?>
              </td>
              <td>
                
                  <a href="<?php echo e(route('edit-unit-info', $unit->id)); ?>" class="btn btn-sm btn-outline-primary" title="Edit unit"> <i class="fas fa-edit"></i></a>
              <a href="<?php echo e(route('destroy-unit-info', $unit->id)); ?>"  onclick="return confirm('<?php echo e(__('units.delete-confirm')); ?>')"title="Delete unit" class="btn btn-outline-danger btn-sm">
                <i class="fa fa-trash"></i>
              </a>
              
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($units->isEmpty()): ?>
            <tr>
              <td colspan="6" class="text-center"><?php echo e(__('units.no-units-found')); ?></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/units/index.blade.php ENDPATH**/ ?>