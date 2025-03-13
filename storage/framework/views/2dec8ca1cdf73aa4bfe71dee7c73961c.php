

<?php $__env->startSection('contents'); ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Client List
        </h1>
        <!-- هنا سيتم اضافة العملاء -->
        <div class="row">
        <div class="col col col-12 pt-3">
                <div class="card card-body">
                  <form action="/admin/clients/store" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="vat_number">Vat Number</label>
                      <input type="number" class="form-control sm" name="vat_number" id="vat_number" >
                      <label class="input-group-text" for="name">Client name</label>
                      <input type="text" class="form-control sm" name="name" id="name">
                      <label class="input-group-text" for="phone">Phone Number</label>
                      <input  type="number"   class=" form-control sm " name="phone" id="phone">
                      <label class="input-group-text" for="address">Address</label>
                      <input type="text" class="form-control sm" name="address" id="address">
                      <button type="submit" class="py-0 btn btn-primary" >Save Client</button>
                      <button type="reset" class="py-0 btn btn-secondary" id="add-item" >reset</button>
                    </div>
                  
                    <div class="input-group d-flex sm mt-2 justify-content-end" >
                    
                    </div>
                  </form>
                </div>
              </div>
            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
      
        </div>
        <!-- هنا سيتم عرض العملاء -->
        <table class="table table-striped  mt-2">
          <thead>
            <tr>
              <th> #</th>
              <th>Vat Number</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Control</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            ?>
            <?php if(count($clients)): ?>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e(++$counter); ?></td>
              <td><?php echo e($client->vat_number); ?></td>
              <td><?php echo e($client->name); ?></td>
              <td><?php echo e($client->phone); ?></td> 
              <td><?php echo e($client->address); ?></td>
              <td>
                <a class="btn btn-sm py-0" href="<?php echo e(route('view-client-info', $client->id)); ?>"><i
                    class="fas fa-eye text-success" title="View Details"></i></a>
                <a class="btn btn-sm py-0" href="<?php echo e(route('edit-client-info', $client->id)); ?>"><i
                    class="fa fa-edit text-primary"></i></a>
                <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a order, are you sure!?.')){return false}"
                  title="Delete order and related Information" href="<?php echo e(route('destroy-client-info', $client->id)); ?>"><i
                    class="fa fa-trash text-danger"></i></a>

              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
              <td colspan="7">No client has been added yet, Add your .</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\kashear_project\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>