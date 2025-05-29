<?php $__env->startSection('title', 'إضافة ضريبة جديدة'); ?>

<?php $__env->startSection('contents'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة ضريبة جديدة</h3>
                </div>
                <!-- /.card-header -->
                <form action="<?php echo e(route('taxes.store')); ?>" method="POST" id="tax-form">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_code">كود الضريبة <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['tax_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="tax_code" name="tax_code" value="<?php echo e(old('tax_code')); ?>" required>
                                    <?php $__errorArgs = ['tax_code'];
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
                                    <label for="tax_type">نوع الضريبة <span class="text-danger">*</span></label>
                                    <select class="form-control <?php $__errorArgs = ['tax_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="tax_type" name="tax_type" required>
                                        <option value="">اختر نوع الضريبة</option>
                                        <option value="PERCENTAGE" <?php echo e(old('tax_type') == 'PERCENTAGE' ? 'selected' : ''); ?>>نسبة مئوية</option>
                                        <option value="FIXED_AMOUNT" <?php echo e(old('tax_type') == 'FIXED_AMOUNT' ? 'selected' : ''); ?>>قيمة ثابتة</option>
                                    </select>
                                    <?php $__errorArgs = ['tax_type'];
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_name_ar">اسم الضريبة (عربي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['tax_name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="tax_name_ar" name="tax_name_ar" value="<?php echo e(old('tax_name_ar')); ?>" required>
                                    <?php $__errorArgs = ['tax_name_ar'];
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
                                    <label for="tax_name_en">اسم الضريبة (إنجليزي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['tax_name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="tax_name_en" name="tax_name_en" value="<?php echo e(old('tax_name_en')); ?>" required>
                                    <?php $__errorArgs = ['tax_name_en'];
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_rate">قيمة الضريبة <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" min="0" 
                                               class="form-control <?php $__errorArgs = ['tax_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="tax_rate" name="tax_rate" value="<?php echo e(old('tax_rate')); ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="rate_suffix">%</span>
                                        </div>
                                        <?php $__errorArgs = ['tax_rate'];
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gl_account_code">كود حساب دفتر الأستاذ</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['gl_account_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="gl_account_code" name="gl_account_code" value="<?php echo e(old('gl_account_code')); ?>">
                                    <?php $__errorArgs = ['gl_account_code'];
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="effective_from">تاريخ السريان من <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control <?php $__errorArgs = ['effective_from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="effective_from" name="effective_from" 
                                           value="<?php echo e(old('effective_from', now()->format('Y-m-d'))); ?>" required>
                                    <?php $__errorArgs = ['effective_from'];
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
                                    <label for="effective_to">تاريخ السريان إلى</label>
                                    <input type="date" class="form-control <?php $__errorArgs = ['effective_to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="effective_to" name="effective_to" value="<?php echo e(old('effective_to')); ?>">
                                    <small class="form-text text-muted">اتركه فارغًا إذا كانت الضريبة دائمة</small>
                                    <?php $__errorArgs = ['effective_to'];
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" 
                                               name="is_active" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="is_active">الحالة (نشط/غير نشط)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_inclusive" 
                                               name="is_inclusive" value="1" <?php echo e(old('is_inclusive') ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="is_inclusive">ضريبة شاملة للسعر</label>
                                        <small class="form-text text-muted d-block">
                                            إذا تم التفعيل، ستكون الضريبة مضمنة في سعر المنتج.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>مجموعات الضرائب</label>
                            <select class="select2 form-control <?php $__errorArgs = ['tax_groups'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    name="tax_groups[]" multiple="multiple" data-placeholder="اختر مجموعات الضرائب" 
                                    style="width: 100%;">
                                <?php $__currentLoopData = $taxGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($group->id); ?>" <?php echo e(in_array($group->id, old('tax_groups', [])) ? 'selected' : ''); ?>>
                                        <?php echo e($group->group_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['tax_groups'];
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
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ
                        </button>
                        <a href="<?php echo e(route('taxes.index')); ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-right"></i> رجوع
                        </a>
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
            dir: 'rtl'
        });

        // Change rate suffix based on tax type
        $('#tax_type').on('change', function() {
            const type = $(this).val();
            if (type === 'PERCENTAGE') {
                $('#rate_suffix').text('%');
                $('#tax_rate').attr('step', '0.01').attr('max', '100');
            } else if (type === 'FIXED_AMOUNT') {
                $('#rate_suffix').text('<?php echo e(config('settings.currency_symbol', 'ر.س')); ?>');
                $('#tax_rate').removeAttr('max');
            }
        });

        // Trigger change on page load if there's a value
        if ($('#tax_type').val()) {
            $('#tax_type').trigger('change');
        }

        // Form validation
        $('#tax-form').validate({
            rules: {
                tax_code: {
                    required: true,
                    maxlength: 20
                },
                tax_name_ar: {
                    required: true,
                    maxlength: 100
                },
                tax_name_en: {
                    required: true,
                    maxlength: 100
                },
                tax_rate: {
                    required: true,
                    min: 0
                },
                effective_from: {
                    required: true,
                    date: true
                },
                effective_to: {
                    date: true,
                    greaterThan: '#effective_from'
                }
            },
            messages: {
                tax_code: {
                    required: 'يرجى إدخال كود الضريبة',
                    maxlength: 'يجب ألا يزيد كود الضريبة عن 20 حرفًا'
                },
                tax_name_ar: {
                    required: 'يرجى إدخال اسم الضريبة بالعربية',
                    maxlength: 'يجب ألا يزيد اسم الضريبة عن 100 حرف'
                },
                tax_name_en: {
                    required: 'يرجى إدخال اسم الضريبة بالإنجليزية',
                    maxlength: 'يجب ألا يزيد اسم الضريبة عن 100 حرف'
                },
                tax_rate: {
                    required: 'يرجى إدخال قيمة الضريبة',
                    min: 'يجب أن تكون قيمة الضريبة أكبر من أو تساوي صفر'
                },
                effective_from: {
                    required: 'يرجى تحديد تاريخ بدء السريان',
                    date: 'تاريخ غير صالح'
                },
                effective_to: {
                    date: 'تاريخ غير صالح',
                    greaterThan: 'يجب أن يكون تاريخ الانتهاء بعد تاريخ البداية'
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

        // Custom validation method for date comparison
        $.validator.addMethod("greaterThan", 
            function(value, element, params) {
                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) > new Date($(params).val());
                }
                return isNaN(value) && isNaN($(params).val()) 
                    || (Number(value) > Number($(params).val())); 
            },
            'يجب أن يكون التاريخ أكبر من تاريخ البداية'
        );
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/taxes/create.blade.php ENDPATH**/ ?>