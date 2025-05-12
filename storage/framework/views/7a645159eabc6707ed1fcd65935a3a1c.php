<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form class="" method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="input-group sm mb-2">
        <label class="input-group-text" for="timezone"><?php echo e(__('الإعدادات المنطقة الزمنية')); ?></label>
        <select class="form-select" name="timezone" id="timezone" onchange="this.form.submit()">
            <option value=""><?php echo e(__('اختر المنطقة الزمنية')); ?></option>
            <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $tzs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <optgroup label="<?php echo e($group); ?>">
                    <?php $__currentLoopData = $tzs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tz->tz_value); ?>" <?php echo e(old('timezone', $setting->timezone) == $tz->tz_value ? 'selected' : ''); ?>>
                            <?php echo e(app()->getLocale() == 'ar' ? $tz->name_ar : $tz->name_en); ?> (<?php echo e($tz->tz_value); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</form>
<form class="" method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="company_name">Company Name:</label>
        <input class="form-control" id="company_name" type="text" name="company_name" value="<?php echo e(old('company_name', $setting->company_name)); ?>"
            onchange="this.form.submit()">
    </div>
</form>

<form class="" method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="tax_number">Tax Number:</label>
        <input class="form-control" type="text" name="tax_number" value="<?php echo e(old('tax_number', $setting->tax_number)); ?>"
            onchange="this.form.submit()">
    </div>
</form>

<form class="" method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="commercial_registration">Commercial Registration:</label>
        <input class="form-control" type="text" name="commercial_registration" value="<?php echo e(old('commercial_registration', $setting->commercial_registration)); ?>"
            onchange="this.form.submit()">
    </div>
</form>

<form class="" method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="phone">Phone:</label>
        <input class="form-control" type="text" name="phone" value="<?php echo e(old('phone', $setting->phone)); ?>"
            onchange="this.form.submit()">
    </div>
    <div class="input-group sm">
        <label class="input-group-text" for="logo">Logo:</label>
        <img src="<?php echo e(asset('assets/admin/uploads/images/' . $setting->logo)); ?>">
    </div>
</form>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\CashierApp\resources\views/admin/setting/partials/general.blade.php ENDPATH**/ ?>