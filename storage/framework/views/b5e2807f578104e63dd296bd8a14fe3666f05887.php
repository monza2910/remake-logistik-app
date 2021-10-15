

<?php $__env->startSection('title'); ?>
    Transactions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title-page'); ?>
    <h1>Edit Transaction</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
          <div class="card-body">

            
            <form action="<?php echo e(route('transactiontravel.update',$transaction->id)); ?>" method="post">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Total Yang Harus Dibayar</label>
                    <input type="text" readonly value="<?php echo e($transaction->total); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Dibayar</label>
                    <input type="text" name="total_bayar" <?php if($transaction->status != "debit"): ?>
                    readonly 
                    <?php endif; ?> value="<?php echo e($transaction->dibayar); ?>" class="form-control">
                    <?php $__errorArgs = ['total_bayar'];
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
                    <label for="">Status</label>
                    <select name="status" <?php if($transaction->status != "debit"): ?>
                       readonly 
                       <?php endif; ?> class="form-control" >
                        <?php if($transaction->status == "paid"): ?>
                        <option value="paid" selected>Paid</option>
                        <option value="debit">debit</option>
                        <?php else: ?>
                        <option value="debit" selected>debit</option>
                        <option value="paid" >Paid</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group text-right">
                    <?php if($transaction->status == "debit"): ?>
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                    <?php endif; ?>
                    <a href="<?php echo e(route('transactiontravel.index')); ?>" class="btn btn-info  mb-2"> Back</a>
                </div>
            </form>
          </div>
    </div>
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/travel_transaction/edit.blade.php ENDPATH**/ ?>