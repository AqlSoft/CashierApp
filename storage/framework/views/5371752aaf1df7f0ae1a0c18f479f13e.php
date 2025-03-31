

<?php $__env->startSection('contents'); ?>

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">General Setting</h1>
    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      
      <div class="row">
        <div class="col col-3">Company Name:</div>
        <div class="col col-9">
          <input type="text" name="company_name" value="<?php echo e(old('company_name', $setting->company_name)); ?>" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <form method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      
      <div class="row">
        <div class="col col-3">Tax Number:</div>
        <div class="col col-9">
          <input type="text" name="tax_number" value="<?php echo e(old('tax_number', $setting->tax_number)); ?>" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <form method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      
      <div class="row">
        <div class="col col-3">Commercial Registration:</div>
        <div class="col col-9">
          <input type="text" name="commercial_registration" value="<?php echo e(old('commercial_registration', $setting->commercial_registration)); ?>" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <form method="POST" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      
      <div class="row">
        <div class="col col-3">Phone:</div>
        <div class="col col-9">
          <input type="text" name="phone" value="<?php echo e(old('phone', $setting->phone)); ?>" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col col-3">Logo:</div>
      <div class="col col-9">
        <img src="<?php echo e(asset('assets/admin/uploads/images/' . $setting->logo)); ?>">
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>