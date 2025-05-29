<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">
                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"><?php echo e(__('contact.contacts-list')); ?>

                    <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createPosModal" aria-expanded="false"
                        aria-controls="addProductForm">
                        <i data-bs-toggle="tooltip" title="Add New pos" class="fa fa-plus"></i>
                    </a>
                </h1>
                <!-- هنا سيتم اضافة المنتجات -->
                <div class="row items-list mt-3">
                    <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col col-md-6 col-lg-4 mb-2">
                        <div class="card mb-3 w-100">
                            <div class="row g-0">
                                <div class="text-center" style="width: 100px">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <i class="<?php echo e($contact->parseIcon()); ?> fa-4x"></i>
                                    </div>
                                </div>
                                <div class="" style="width: calc(100% - 100px)">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title"><?php echo e($contact->name); ?></h5>
                                        <p class="card-text mt-0 mb-1"><?php echo e($contact->contact); ?> </p>
                                        <p class="card-text mt-0 mb-1"><?php echo e($contact->person->profile->full_name()); ?></p>


                                        <p class="card-text py-0 my-0"><small class="text-body-secondary"><?php echo e($contact->updated_at->diffForHumans()); ?></small></p>
                                        <div class="actions position-absolute top-0">
                                            <a href="<?php echo e(route('view-pos-info', $contact->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-display"></i></a>
                                            <a href="<?php echo e(route('destroy-pos-info', $contact->id)); ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 mb-2">
                        <p><?php echo e(__('contact.no-contacts-found')); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="createPosModal" aria-hidden="true" aria-labelledby="createPosModalLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="createPosModalLabel"><?php echo e(__('pos.new-pos-modal-title')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="p-3" method="POST" action="<?php echo e(route('store-contact-info')); ?>">
                <?php echo csrf_field(); ?>

                <div class="mb-2 input-group sm">
                    <label class="input-group-text"><?php echo e(__('contact.name')); ?></label>
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
                    <label class="input-group-text"><?php echo e(__('contact.contact')); ?></label>
                    <input type="text" name="contact" class="form-control" value="<?php echo e(old('contact')); ?>" required>
                </div>
                <?php $__errorArgs = ['contact'];
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
                    <label class="input-group-text"><?php echo e(__('contact.category')); ?></label>
                    <select name="category_name" class="form-select" required>
                        <option <?php echo e(old('category_name') == 'phone'      ? 'selected' : ''); ?> value="phone"><?php echo e(__('contact.phone')); ?></option>
                        <option <?php echo e(old('category_name') == 'email'      ? 'selected' : ''); ?> value="email"><?php echo e(__('contact.email')); ?></option>
                        <option <?php echo e(old('category_name') == 'whatsapp'   ? 'selected' : ''); ?> value="whatsapp"><?php echo e(__('contact.whatsapp')); ?></option>
                        <option <?php echo e(old('category_name') == 'mobile'     ? 'selected' : ''); ?> value="mobile"><?php echo e(__('contact.mobile')); ?></option>
                        <option <?php echo e(old('category_name') == 'fax'        ? 'selected' : ''); ?> value="fax"><?php echo e(__('contact.fax')); ?></option>
                    </select>
                </div>
                <?php $__errorArgs = ['category_name'];
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
                    <label class="input-group-text"><?php echo e(__('contact.person-id')); ?></label>
                    <select name="person_id" class="form-select" required>
                        <option value=""><?php echo e(__('contact.select-person')); ?></option>
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($admin->id); ?>"><?php echo e($admin->profile->full_name()); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php $__errorArgs = ['person_id'];
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
                    <button type="submit" class="btn btn-outline-primary py-1"><?php echo e(__('contact.save-contact')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/contacts/index.blade.php ENDPATH**/ ?>