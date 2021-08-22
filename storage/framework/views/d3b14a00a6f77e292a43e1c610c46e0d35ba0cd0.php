

<?php $__env->startSection('title'); ?>
    Shipping Rate
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Update Rate</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            
            <form action="<?php echo e(route('rate.update',$rate->id)); ?>" method="post">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label >Buton</label>
                    <select class="form-control selectric" name="origin_id">

                        <option value="<?php echo e($rate->origin_id); ?>"><?php echo e($rate->origin->province.', '.$rate->origin->city.', '.$rate->origin->subdistrict); ?></option>
                        <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($origin->id); ?>"><?php echo e($origin->province.', '.$origin->city.', '.$origin->subdistrict); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group select-box">
                    <label >Buton</label>
                    <select class="form-control selectric " name="destination_id" data-lice-search="true">
                        <option value="<?php echo e($rate->origin_id); ?>"><?php echo e($rate->destination->province.', '.$rate->destination->city.', '.$rate->destination->subdistrict); ?></option>
                        <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($destination->id); ?>"><?php echo e($destination->province.', '.$destination->city.', '.$destination->subdistrict); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Under Terms Price(<50kg) </label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="<?php echo e($rate->under_terms); ?>" name="under_terms" id="inlineFormInputGroup" >
                    </div>
                    <?php $__errorArgs = ['under_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label>Above Terms Price(>50kg)</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" min="0" value="<?php echo e($rate->above_terms); ?>" name="above_terms" id="inlineFormInputGroup">
                    </div>
                    <?php $__errorArgs = ['above_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label>Estimated arrived (Days)</label>
                    <input type="text" name="est_arrived" placeholder="" value="<?php echo e($rate->est_arrived); ?>" class="form-control">
                    <?php $__errorArgs = ['est_arrived'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group select-box">
                    <label >destination</label>
                    <select class="form-control selectpicker " data-live-search="true" name="variant_id" >
                        <option value="<?php echo e($rate->variantservice_id); ?>"><?php echo e($rate->variantservice->variant_service); ?></option>
                        <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($variant->id); ?>"><?php echo e($variant->variant_service); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="<?php echo e(route('rate.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\example-appcompany-profile\resources\views/dashboard-admin/shippingrate/edit.blade.php ENDPATH**/ ?>