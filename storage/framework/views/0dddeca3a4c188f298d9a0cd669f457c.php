<?php $__env->startSection('toast-title-success'); ?>
  <i class="icon fas fa-check"></i> تم بنجاح! 
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('toast-title-error'); ?>
    <i class="icon fas fa-ban"></i> خطأ!
  <?php $__env->stopSection(); ?>
<div class="row">
  <div class="col-md-12">
    <div id="units-container">
      <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('categories.categories-list')); ?>

        <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createPosModal" aria-expanded="false"
          aria-controls="addProductForm">
          <i data-bs-toggle="tooltip" title="Add New pos" class="fa fa-plus"></i>
        </a>
      </h1>
      <!-- Modals -->
      <!-- Create Modal -->
      <div class="modal fade" id="createPosModal" aria-hidden="true" aria-labelledby="createPosModalLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
              <h1 class="modal-title fs-5" id="createPosModalLabel"><?php echo e(__('categories.new-category-modal-title')); ?></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="p-3" method="POST" action="<?php echo e(route('store-new-category')); ?>">
              <?php echo csrf_field(); ?>

              <div class="mb-2 input-group sm">
                <label class="input-group-text"><?php echo e(__('categories.name')); ?></label>
                <input type="text" name="cat_name" class="form-control" value="<?php echo e(old('cat_name')); ?>" required>
              </div>
              <?php $__errorArgs = ['cat_name'];
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
                <label class="input-group-text"><?php echo e(__('categories.brief')); ?></label>
                <input type="text" name="cat_brief" class="form-control" value="<?php echo e(old('cat_brief')); ?>">
              </div>
              <?php $__errorArgs = ['cat_brief'];
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
                <label class="input-group-text"><?php echo e(__('categories.status')); ?></label>
                <select name="status" class="form-select" required>
                  <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>><?php echo e(__('categories.active')); ?></option>
                  <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>><?php echo e(__('categories.inactive')); ?></option>
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
                <button type="submit" class="btn btn-outline-primary py-1"><?php echo e(__('categories.save-category')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Edit Modal -->
      <?php if(isset($categoryToEdit)): ?>
      <div class="modal fade show" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" style="display:block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
              <h1 class="modal-title fs-5" id="editCategoryModalLabel"><?php echo e(__('categories.edit-category-modal-title')); ?></h1>
              <a href="<?php echo e(route('display-categories-all')); ?>" class="btn-close"></a>
            </div>
            <form class="p-3" method="POST" action="<?php echo e(route('update-category-info', $categoryToEdit->id)); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>

              <div class="mb-2 input-group sm">
                <label class="input-group-text"><?php echo e(__('categories.name')); ?></label>
                <input type="text" name="cat_name" class="form-control" value="<?php echo e(old('cat_name', $categoryToEdit->cat_name)); ?>" required>
              </div>
              <?php $__errorArgs = ['cat_name'];
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
                <label class="input-group-text"><?php echo e(__('categories.cat_brief')); ?></label>
                <input type="text" name="cat_brief" class="form-control" value="<?php echo e(old('cat_brief', $categoryToEdit->cat_brief)); ?>">
              </div>
              <?php $__errorArgs = ['cat_brief'];
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
                <label class="input-group-text"><?php echo e(__('categories.status')); ?></label>
                <select name="status" class="form-select" required>
                  <option value="1" <?php echo e(old('status', $categoryToEdit->status) == '1' ? 'selected' : ''); ?>><?php echo e(__('categories.active')); ?></option>
                  <option value="0" <?php echo e(old('status', $categoryToEdit->status) == '0' ? 'selected' : ''); ?>><?php echo e(__('categories.inactive')); ?></option>
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
                <button type="submit" class="btn btn-outline-primary py-1"><?php echo e(__('categories.update-category')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <table class="table table-striped mt-2 table-sm w-100">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Brief</th>
            <th>Status</th>
            <th>Control</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($index + 1); ?></td>
            <td><?php echo e($category->cat_name); ?></td>
            <td><?php echo e($category->cat_brief); ?></td>

            <td>
              <?php if($category->status): ?>
              <span class="badge bg-success">Active</span>
              <?php else: ?>
              <span class="badge bg-secondary">Inactive</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="<?php echo e(route('edit-category-info', $category->id)); ?>" class="btn btn-sm btn-outline-primary" title="Edit category"> <i class="fas fa-edit"></i></a>
              <a href="<?php echo e(route('destroy-category-info', $category->id)); ?>" onclick="return confirm('Delete this category?')" title="Delete category" class="btn btn-outline-danger btn-sm">
                <i class="fa fa-trash"></i>
              </a>

            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($categories->isEmpty()): ?>
          <tr>
            <td colspan="6" class="text-center">No categories found.</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/categroies/index.blade.php ENDPATH**/ ?>