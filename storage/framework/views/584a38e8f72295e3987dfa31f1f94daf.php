<?php $__env->startSection('title', 'إضافة مجموعة ضرائب جديدة'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة مجموعة ضرائب جديدة</h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('admin.tax-groups.index')); ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-right"></i> رجوع للقائمة
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="<?php echo e(route('admin.tax-groups.store')); ?>" method="POST" id="tax-group-form">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group_code">كود المجموعة <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['group_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="group_code" name="group_code" value="<?php echo e(old('group_code')); ?>" required>
                                    <?php $__errorArgs = ['group_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mt-4 pt-2">
                                        <input type="checkbox" class="custom-control-input" id="is_active" 
                                               name="is_active" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="is_active">تفعيل المجموعة</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group_name_ar">اسم المجموعة (عربي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['group_name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="group_name_ar" name="group_name_ar" value="<?php echo e(old('group_name_ar')); ?>" required>
                                    <?php $__errorArgs = ['group_name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group_name_en">اسم المجموعة (إنجليزي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['group_name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="group_name_en" name="group_name_en" value="<?php echo e(old('group_name_en')); ?>" required>
                                    <?php $__errorArgs = ['group_name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="description" name="description" rows="3"><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label>الضرائب المدرجة <span class="text-danger">*</span></label>
                            <div class="select2-primary">
                                <select class="select2 form-control <?php $__errorArgs = ['taxes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        name="taxes[]" multiple="multiple" data-placeholder="اختر الضرائب" 
                                        style="width: 100%;" required>
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tax->id); ?>" <?php echo e(in_array($tax->id, old('taxes', [])) ? 'selected' : ''); ?>>
                                            <?php echo e($tax->tax_name_ar); ?> (<?php echo e($tax->tax_rate); ?>%)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['taxes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-undo"></i> إعادة تعيين
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border-color: #006fe6;
        color: #fff;
        padding: 0 10px;
        margin-top: 0.31rem;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: rgba(255, 255, 255, 0.7);
        margin-right: 5px;
        border-right: 1px solid rgba(255, 255, 255, 0.3);
        padding-right: 5px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: #fff;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Select2 -->
<script src="<?php echo e(asset('adminlte/plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- jquery-validation -->
<script src="<?php echo e(asset('adminlte/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/jquery-validation/additional-methods.min.js')); ?>"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            theme: 'bootstrap4',
            dir: 'rtl',
            width: '100%',
            placeholder: 'اختر الضرائب',
            allowClear: true
        });

        // Form validation
        $('#tax-group-form').validate({
            rules: {
                group_code: {
                    required: true,
                    maxlength: 20,
                    remote: {
                        url: '<?php echo e(route("admin.tax-groups.check-code")); ?>',
                        type: 'post',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>',
                            group_code: function() {
                                return $('#group_code').val();
                            }
                        }
                    }
                },
                group_name_ar: {
                    required: true,
                    maxlength: 100
                },
                group_name_en: {
                    required: true,
                    maxlength: 100
                },
                'taxes[]': {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                group_code: {
                    required: 'يرجى إدخال كود المجموعة',
                    maxlength: 'يجب ألا يزيد كود المجموعة عن 20 حرفًا',
                    remote: 'كود المجموعة مستخدم مسبقًا'
                },
                group_name_ar: {
                    required: 'يرجى إدخال اسم المجموعة بالعربية',
                    maxlength: 'يجب ألا يزيد اسم المجموعة عن 100 حرف'
                },
                group_name_en: {
                    required: 'يرجى إدخال اسم المجموعة بالإنجليزية',
                    maxlength: 'يجب ألا يزيد اسم المجموعة عن 100 حرف'
                },
                'taxes[]': {
                    required: 'يجب اختيار ضريبة واحدة على الأقل',
                    minlength: 'يجب اختيار ضريبة واحدة على الأقل'
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/tax-groups/create.blade.php ENDPATH**/ ?>