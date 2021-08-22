

<?php $__env->startSection('title'); ?>
    Variant Service
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Create Variant Service</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            
            <form action="<?php echo e(route('variant.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Variant</label>
                    <input type="text" name="variant" placeholder="" value="<?php echo e(old('variant')); ?>" class="form-control">
                    <?php $__errorArgs = ['variant'];
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
                <div class="form-group text-right">
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <a href="<?php echo e(route('variant.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\example-appcompany-profile\resources\views/dashboard-admin/variant/create.blade.php ENDPATH**/ ?>