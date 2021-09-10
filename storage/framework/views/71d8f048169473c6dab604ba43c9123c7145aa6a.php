

<?php $__env->startSection('title'); ?>
    Transactions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Tracking</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success mx-4 my-4">
        <p><?php echo e($message); ?></p>
    </div>
    <?php elseif($message = session::get('deleted')): ?>
    <div class="alert alert-danger mx-4 my-4">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
          <div class="card-body">

            
            <form action="<?php echo e(route('tracking.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="text" value="<?php echo e($idtr); ?>" name="id_tr" hidden>
                <div class="form-group">
                    <label >Status</label>
                    <br>
                    <select class="form-control selectric" name="status">
                        <option value="Barang sudah berada di kantor KMJ TRANS & LOGISTICS">Barang sudah berada di kantor KMJ TRANS & LOGISTICS</option>
                        <option value="Barang Dalam Proses Pengiriman">Barang Dalam Proses Pengiriman</option>
                        <option value="Barang Sudah Diterima">Barang Sudah Diterima</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" value="<?php echo e(old('location')); ?>" class="form-control">
                    <?php $__errorArgs = ['location'];
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
                    <a href="<?php echo e(route('transaction.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/transaction/addtracking.blade.php ENDPATH**/ ?>