

<?php $__env->startSection('title'); ?>
    outlet 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Update outlet </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            
            <form action="<?php echo e(route('outlet.update',$outlet->id)); ?>" method="post">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Name Outlet</label>
                    <input type="text" name="name" placeholder="" value="<?php echo e($outlet->name); ?>" class="form-control">
                    <?php $__errorArgs = ['name'];
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
                    <label >Origin </label>
                    <select class="form-control selectpicker " data-live-search="true" name="origin_id" >
                        <?php if($outlet->origin): ?>
                        <option value="<?php echo e($outlet->origin_id); ?>"><?php echo e($outlet->origin->province.", ". $outlet->origin->city.", ".$outlet->origin->subdistrict); ?></option>
                        <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($origin->id); ?>"><?php echo e($origin->province.", ". $origin->city.", ".$origin->subdistrict); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($origin->id); ?>"><?php echo e($origin->province.", ". $origin->city.", ".$origin->subdistrict); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Spesific Address</label>
                    <input type="text" name="address" placeholder="" value="<?php echo e($outlet->address); ?>" class="form-control">
                    <?php $__errorArgs = ['address'];
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
                    <a href="<?php echo e(route('outlet.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/outlet/edit.blade.php ENDPATH**/ ?>